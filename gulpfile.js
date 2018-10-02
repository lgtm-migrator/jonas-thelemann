'use strict';

const exec = require('child_process').exec;
const fs = require('fs');
const path = require('path');

const gAutoprefixer = require('gulp-autoprefixer');
const gBabelMinify = require('gulp-babel-minify');
const gBrowserify = require('browserify');
const gBuffer = require('gulp-buffer');
const gCached = require('gulp-cached');
const gComposer = require('gulp-composer');
const gDateDiff = require('date-diff');
const gDel = require('del');
const gEslint = require('gulp-eslint');
const gGulp = require('gulp');
const gJsdoc2md = require('gulp-jsdoc-to-markdown');
const gMergeStream = require('merge-stream');
const gPhplint = require('gulp-phplint');
const gPluginError = require('plugin-error');
const gRename = require('gulp-rename');
const gSass = require('gulp-sass');
const gSourcemaps = require('gulp-sourcemaps');
const gTap = require('gulp-tap');
const gThrough = require('through2');
const gVfs = require('vinyl-fs');
const gYarn = require('gulp-yarn');
const gZip = require('gulp-zip');

// const debug = require('gulp-debug');
// .pipe(debug())

let pkg = JSON.parse(fs.readFileSync('./package.json'));

const distFolder = 'dist/' + pkg.name + '/';
const credentialsFolder = distFolder + 'credentials/';
const serverFolder = distFolder + 'server/';
const resFolder = serverFolder + 'resources/';
const baseFolder = resFolder + 'dargmuesli/base/';
const depComposerFolder = resFolder + 'packages/composer/';
const depYarnFolder = resFolder + 'packages/yarn/';
const productionFolder = 'production/';
const srcFolder = 'src/';
const staticFolder = srcFolder + 'static/';
const funcFolder = srcFolder + 'js/';
const styleFolder = srcFolder + 'css/sass/style/';
const sassFile = srcFolder + 'css/sass/style/style.scss';

const credentialsSrcGlob = productionFolder + pkg.name + '/credentials/**';
const staticGlob = staticFolder + '**';
const composerSrcGlob = 'vendor/**';
const zipSrcGlob = distFolder + '**';

let buildInProgress = false;

gGulp.src = gVfs.src;
gGulp.dest = gVfs.dest;

function dist_clean() {
    // Delete all files from dist folder
    return gDel([distFolder + '**', '!' + distFolder.replace(/\/$/, ''), path.dirname(distFolder) + '/' + pkg.name + '.zip']);
}

exports.dist_clean = dist_clean;

function credentials() {
    // Copy credentials to dist folder
    return gGulp.src(credentialsSrcGlob, { dot: true })
        .pipe(gCached('credentials'))
        .pipe(gGulp.dest(credentialsFolder));
}

exports.credentials = credentials;

function credentials_watch() {
    // Watch for any changes in credential files to copy changes
    // Does currently not work as dotfiles cannot be watched with chokidar
    gGulp.watch(credentialsSrcGlob)
        .on('all', function () {
            credentials();
        });
}

exports.credentials_watch = credentials_watch;

function staticSrc() {
    // Copy static files to dist folder
    buildInProgress = true;

    return new Promise(function (resolve, reject) {
        gGulp.src(staticGlob, { dot: true })
            .pipe(gCached('staticSrc'))
            .on('error', reject)
            .pipe(gGulp.dest(serverFolder))
            .on('end', resolve);
    }).then(function () {
        buildInProgress = false;
    });
}

exports.staticSrc = staticSrc;

function staticSrc_watch() {
    // Watch for any changes in source files to copy changes
    gGulp.watch(staticGlob)
        .on('all', function () {
            staticSrc();
        });
}

function getChangeFreq(lastModification) {
    let interval = new gDateDiff(new Date(), new Date(lastModification));

    if (interval.years() < 5) {
        if (interval.years() < 1) {
            if (interval.months() < 1) {
                if (interval.days() < 7) {
                    if (interval.days() < 1) {
                        return 'hourly';
                    } else {
                        return 'daily';
                    }
                } else {
                    return 'weekly';
                }
            } else {
                return 'monthly';
            }
        } else {
            return 'yearly';
        }
    } else {
        return 'never';
    }
}

exports.staticSrc_watch = staticSrc_watch;

function sitemap() {
    let sitemapPath = path.resolve(serverFolder + 'sitemap/sitemap.xml');
    let targetPath = __dirname + '/' + staticFolder;

    path.dirname(sitemapPath)
        .split(path.sep)
        .reduce((currentPath, folder) => {
            currentPath += folder + path.sep;

            if (!fs.existsSync(currentPath)) {
                fs.mkdirSync(currentPath);
            }

            return currentPath;
        }, '');


    fs.writeFile(sitemapPath, '<?xml version="1.0" encoding="UTF-8"?>\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', (error) => { if (error) throw error; });

    return gGulp.src(staticFolder + '**/index.php')
        .pipe(
            gThrough.obj(function (file, enc, cb) {
                if (!fs.existsSync(file.dirname + '/.hidden') && file.dirname.indexOf('migrations') == -1) {
                    exec('git log -1 --format="%aI" -- ' + file.path, function (exec_error, stdout) {
                        let loc = file.dirname.replace(path.resolve(targetPath), 'https://' + pkg.name).replace(/\\/g, '/').replace();
                        let priority = (Math.round((1 - ((loc.match(/\//g) || []).length - 2) * 0.1) * 10) / 10).toFixed(1);
                        let url = `
    <url>
        <loc>${loc}/</loc>
        <lastmod>${stdout.trim()}</lastmod>
        <changefreq>${getChangeFreq(stdout.trim())}</changefreq>
        <priority>${priority > 0 ? priority : 0}</priority>
    </url>`;

                        fs.appendFile(sitemapPath, url, (error) => { if (error) throw error; cb(); });

                        if (exec_error) {
                            console.error(`exec error: ${exec_error}`);
                            return;
                        }
                    });
                } else {
                    cb();
                }

                this.push(file);
            })
        )
        .on('end', function () { fs.appendFile(sitemapPath, '\n</urlset>', (error) => { if (error) throw error; }); });
}

exports.sitemap = sitemap;

function phpLint() {
    return gGulp.src(srcFolder + '**/*.php')
        // Lint and suppress output of valid files
        .pipe(gPhplint('', { skipPassedFiles: true }))
        // Fail on error
        .pipe(gPhplint.reporter(function (file) {
            let report = file.phplintReport || {};

            if (report.error) {
                throw new gPluginError('gulp-eslint', {
                    plugin: 'PHPLintError',
                    message: report.message + ' on line ' + report.line + ' of ' + report.filename
                });
            }
        }));
}

exports.phpLint = phpLint;

function jsLint() {
    return gGulp.src(funcFolder + '**/*.js')
        // Lint JavaScript
        .pipe(gEslint())
        // Output to console
        .pipe(gEslint.format())
        // Fail on error
        .pipe(gEslint.failAfterError());
}

exports.jsLint = jsLint;

function jsSrc() {
    return gGulp.src(funcFolder + 'functions.js', { read: false })
        .pipe(gTap(function (file) {
            file.contents = gBrowserify(file.path, { debug: true, standalone: 'Dargmuesli' }).transform('babelify', { presets: ['@babel/preset-env'] }).bundle();
        }))
        .pipe(gBuffer())
        .pipe(gGulp.dest(baseFolder))
        .pipe(gRename({
            extname: '.min.js'
        }))
        .pipe(gBabelMinify())
        .pipe(gGulp.dest(baseFolder));
}

exports.jsSrc = jsSrc;

function jsSrc_watch() {
    // Watch for any changes in source files to copy changes
    gGulp.watch(funcFolder)
        .on('all', function () {
            jsSrc();
        });
}

exports.jsSrc_watch = jsSrc_watch;

function jsDoc() {
    return gGulp.src(srcJsFolder + '**/*.js')
        .pipe(gJsdoc2md())
        .pipe(gRename(function (path) {
            path.extname = '.md'
        }))
        .pipe(gGulp.dest('docs/js/'));
}

exports.jsDoc = jsDoc;

function css_compressed() {
    return gGulp.src(sassFile)
        .pipe(gRename({
            extname: '.min.css'
        }))
        .pipe(gSourcemaps.init())
        .pipe(gSass({
            outputStyle: 'compressed'
        }).on('error', gSass.logError))
        .pipe(gAutoprefixer())
        .pipe(gSourcemaps.write('.'))
        .pipe(gGulp.dest(baseFolder));
}

exports.css_compressed = css_compressed;

function css_extended() {
    return gGulp.src(sassFile)
        .pipe(gSourcemaps.init())
        .pipe(gSass({
            outputStyle: 'expanded'
        }).on('error', gSass.logError))
        .pipe(gAutoprefixer())
        .pipe(gSourcemaps.write('.'))
        .pipe(gGulp.dest(baseFolder));
}

exports.css_extended = css_extended;

function cssSrc_watch() {
    // Watch for any changes in source files to copy changes
    gGulp.watch(styleFolder)
        .on('all', function () {
            css_compressed();
            css_extended();
        });
}

exports.cssSrc_watch = cssSrc_watch;

function composer_update() {
    // Update composer
    return gComposer('update', {
        'async': false
    });
}

exports.composer_update = composer_update;

function composer_clean() {
    // Delete all files from composer package resources dist folder
    return gDel(depComposerFolder + '*');
}

exports.composer_clean = composer_clean;

function composer_src() {
    // Copy all composer libraries to composer package resources dist folder
    return gGulp.src(composerSrcGlob)
        .pipe(gGulp.dest(depComposerFolder));
}

exports.composer_src = composer_src;

function composer_watch() {
    // Watch for any changes in composer files to copy changes
    gGulp.watch([composerSrcGlob, 'composer.json'])
        .on('all', function () {
            composer_update();
            composer_src();
        });
}

exports.composer_watch = composer_watch;

function yarn_update() {
    // Update package dependencies
    return gGulp.src('package.json')
        .pipe(gYarn());
}

exports.yarn_update = yarn_update;

function yarn_clean() {
    // Delete all files from yarn package resources dist folder
    return gDel(depYarnFolder + '*');
}

exports.yarn_clean = yarn_clean;

function yarn_src() {
    // Copy front-end javascript libraries to yarn package resources dist folder
    const streamArray = [gGulp.src('node_modules/chart.js/dist/Chart{.min,}.js')
        .pipe(gGulp.dest(depYarnFolder + 'chart.js/')),
    gGulp.src('node_modules/dragula/dist/*.{css,js}')
        .pipe(gGulp.dest(depYarnFolder + 'dragula/')),
    gGulp.src('node_modules/jquery/dist/jquery*.js')
        .pipe(gGulp.dest(depYarnFolder + 'jquery/')),
    gGulp.src('node_modules/jquery-validation/dist/{localization/,jquery.validate}*.js')
        .pipe(gGulp.dest(depYarnFolder + 'jquery-validation/')),
    gGulp.src('node_modules/js-cookie/src/*.js')
        .pipe(gGulp.dest(depYarnFolder + 'js-cookie/')),
    gGulp.src('node_modules/later/later{.min,}.js')
        .pipe(gGulp.dest(depYarnFolder + 'later/')),
    gGulp.src('node_modules/materialize-css/dist/**')
        .pipe(gGulp.dest(depYarnFolder + 'materialize-css/')),
    gGulp.src(['node_modules/moment/moment*.js', 'node_modules/moment/min/moment*.js'])
        .pipe(gGulp.dest(depYarnFolder + 'moment/')),
    gGulp.src(['node_modules/moment-timezone/moment-timezone.js', 'node_modules/moment-timezone/builds/*.js'])
        .pipe(gGulp.dest(depYarnFolder + 'moment-timezone/')),
    gGulp.src('node_modules/prismjs/{components/*.js,plugins/**,themes/*.css,prism.js}')
        .pipe(gGulp.dest(depYarnFolder + 'prismjs/'))];
    return gMergeStream(streamArray);
}

exports.yarn_src = yarn_src;

function yarn_watch() {
    // Watch for any changes in yarn files to copy changes
    gGulp.watch(['package.json'])
        .on('all', function () {
            yarn_update();
            yarn_src();
        });
}

exports.yarn_watch = yarn_watch;

function symlinks(callback) {
    // Create all necessary symlinks
    return callback();
}

exports.symlinks = symlinks;

function zip() {
    // Build a zip file containing the dist folder
    return gGulp.src(zipSrcGlob, { dot: true })
        .pipe(gZip(pkg.name + '.zip'))
        .pipe(gGulp.dest(path.dirname(distFolder)));
}

exports.zip = zip;

function zipWaiter() {
    // Do not zip while a build is still in progress
    if (buildInProgress) {
        setTimeout(zipWaiter, 100);
    } else {
        zip();
    }
}

function zip_watch() {
    // Watch for any changes to start a zip rebuild
    gGulp.watch(zipSrcGlob)
        .on('all', function (event, path) {
            console.log(event + ': "' + path + '". Running tasks...');
            zipWaiter();
        });
}

exports.zip_watch = zip_watch;

// Build tasks
gGulp.task(
    'build',
    gGulp.series(
        dist_clean,
        gGulp.series(
            gGulp.parallel(
                credentials,
                staticSrc,
                sitemap,
                phpLint,
                jsLint,
                jsSrc,
                css_compressed,
                css_extended
            ),
            // Yarn needs to be in series with phpLint
            // as the Yarn task does not return on linting errors.
            gGulp.parallel(
                gGulp.series(
                    composer_update,
                    composer_src
                ),
                gGulp.series(
                    yarn_update,
                    yarn_src
                )
            )
        ),
        symlinks,
        zip
    )
);
gGulp.task(
    'default',
    gGulp.series(
        'build',
        gGulp.parallel(
            credentials_watch,
            staticSrc_watch,
            jsSrc_watch,
            cssSrc_watch,
            composer_watch,
            yarn_watch,
            zip_watch
        )
    )
);
