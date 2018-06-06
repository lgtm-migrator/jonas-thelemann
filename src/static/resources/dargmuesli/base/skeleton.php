<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/packages/composer/autoload.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/url/require.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/url/rootpointer.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/navigation/breadcrumbs.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/navigation/menu.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/navigation/tableofcontents.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/navigation/translation.php';

    $displayDisclaimer = true;

    function isCardOpen($cardId)
    {
        if (isset($_COOKIE['closedCards'])) {
            $closedCardsCookie = json_decode($_COOKIE['closedCards'], true);

            if (!empty($closedCardsCookie)) {
                $closedCards = $closedCardsCookie['cards'];

                if (!empty($closedCards)) {
                    if (in_array($cardId, $closedCards)) {
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    return true;
                }
            } else {
                return true;
            }
        } else {
            setcookie('closedCards', json_encode([]), time() + (60 * 60 * 24 * 150), '/');
            return true;
        }
    }

    function outputHtml($description, $content, $features = [], $keywords = 'jonas, thelemann')
    {
        global $displayDisclaimer;
        global $rootPointerInteger;
        global $directoryName;

        $currentFolder = null;

        if ($rootPointerInteger == 0) {
            $currentFolder = 'welcome';
        } else {
            preg_match_all(
                '/^\/[^\.\s]+($|\/)/m',
                parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
                $matches,
                PREG_SET_ORDER,
                0
            );
            $currentFolder = basename($matches[0][0]);
        }

        $title = '';
        $titleShy = '';
        $featureTranslation = getFeatureTranslation($features);

        if (isset($_GET['errorCode'])) {
            $title = $_GET['errorCode'];
            $titleShy = $_GET['errorCode'];
        } else {
            $title = getNavigationTranslation($currentFolder);
            $titleShy = getNavigationTranslation($currentFolder, true);
        }

        $html = '
        <!DOCTYPE html>
        <html dir="ltr" itemscope itemtype="https://schema.org/ProfilePage" lang="de">
            <head>
                <meta charset="utf-8">
                <meta content="utf-8" itemprop="encoding">
                <meta content="#ee976e" name="theme-color">
                <meta content="#ee976e" name="msapplication-TileColor">
                <meta content="/resources/dargmuesli/images/browserconfig.xml" name="msapplication-config">
                <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <meta content="website" property="og:type">
                <meta content="Jonas Thelemann" name="author">
                <meta content="Jonas Thelemann" itemprop="accountablePerson author creator editor publisher">
                <meta content="'.$description.'" name="description">
                <meta content="'.$description.'" itemprop="description">
                <meta content="'.$description.'" property="og:description">
                <meta content="'.$keywords.'" name="keywords">
                <meta content="'.$keywords.'" itemprop="keywords">
                <meta content="'.$_SERVER['SERVER_ROOT_URL'].'/resources/dargmuesli/images/logo.png" property="og:image">
                <meta content="'.$_SERVER['SERVER_ROOT_URL'].'/resources/dargmuesli/images/logo.png" itemprop="thumbnailUrl">
                <meta content="'.$_SERVER['SERVER_ROOT_URL'].$_SERVER['REQUEST_URI'].'" property="og:url">
                <meta content="'.$_SERVER['SERVER_ROOT_URL'].$_SERVER['REQUEST_URI'].'" itemprop="sameAs url">
                <meta content="de" itemprop="inLanguage">
                <meta content="true" itemprop="isAccessibleForFree">
                <meta content="true" itemprop="isFamilyFriendly">
                <meta content="'.$title.'" property="og:title">
                <title itemprop="name">
                    '.$title.' - Jonas Thelemann
                </title>
                <link href="'.$_SERVER['REQUEST_URI'].'" rel="canonical">
                <link href="/resources/dargmuesli/images/favicon.ico" type="image/x-icon" rel="icon">
                <link href="/resources/dargmuesli/images/site.webmanifest" rel="manifest">
                <link href="/resources/dargmuesli/images/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
                <link color="#ee976e" href="/resources/dargmuesli/images/safari-pinned-tab.svg" rel="mask-icon">'
                .getFeatureTranslation(['pkg/mtrl/mcss', 'drg/base/stl.mcss']).'
            </head>
            <body>
                <noscript>
                    <iframe height="0" sandbox="" src="//www.googletagmanager.com/ns.html?id=GTM-KL6875" width="0"></iframe>
                    <div class="card-panel red">
                        <span>
                            Problem!
                        </span>
                        <p>
                            Um diese Website richtig nutzen zu können, muss Javascript aktiviert sein.
                        </p>
                    </div>
                </noscript>';

        if ($displayDisclaimer && isCardOpen('wipinfocard')) {
            $html .= '
            <div class="card light-blue grey-text text-lighten-4" id="wipinfocard">
                <div class="card-content">
                    <span class="card-title">
                        Information
                    </span>
                    <button class="card-close">
                        <i class="material-icons">
                            close
                        </i>
                    </button>
                    <p>
                        An dieser Website wird noch gearbeitet. Keine Garantie für Funktionalität und Inhalt!
                    </p>
                </div>
            </div>';
        }

        $html .= '
                <header itemscope itemtype="https://schema.org/WPHeader">
                    <nav>
                        <div class="center nav-wrapper">
                            <a class="button-collapse top-nav left full hide-on-med-and-up" data-activates="nav-mobile" href="#" id="menu-button">
                                <i class="material-icons">
                                    menu
                                </i>
                            </a>
                            <a href="'.$_SERVER['SERVER_ROOT_URL'].'/" class="brand-logo">
                                <span itemprop="name">
                                    Jonas Thelemann
                                </span>
                            </a>
                            <a class="button-collapse top-nav right full hide-on-large-only" data-activates="toc-mobile" href="#" id="toc-button">
                                <i class="material-icons">
                                    format_list_bulleted
                                </i>
                            </a>
                        </div>
                    </nav>
                    <div class="row container" id="breadcrumbcontainer">
                        <div class="col s12 m9 offset-m3 l10 offset-l2" id="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
                            '.getBreadcrumbsHtml($title).'
                        </div>
                    </div>
                </header>
                <div class="row container" id="main">
                    <div class="col s12 m3 l2" id="nav">
                        '.getMenuHtml().'
                    </div>
                    <div class="col s12 m9 l8">
                        <main itemprop="mainContentOfPage" itemscope itemtype="https://schema.org/WebPageElement">
                            <h1 class="header" itemprop="headline">
                                '.$titleShy.'
                            </h1>
                            <p class="caption" itemprop="about alternativeHeadline">
                                '.$description.'.
                            </p>
                            <div itemprop="text">'
                                .$content.'
                            </div>
                        </main>
                    </div>
                    <div class="col s12 l2">
                        <div id="toc">'
                            .getTableOfContentsHtml($content).'
                        </div>
                    </div>
                </div>
                <footer class="page-footer" itemscope itemtype="https://schema.org/WPFooter">
                    <div class="container">
                        <div class="row">
                            <div class="col s6">
                                <h5 class="white-text" itemprop="headline">
                                    Website
                                </h5>
                                <div>
                                    <a class="grey-text text-lighten-3" href="'.$_SERVER['SERVER_ROOT_URL'].'/sitemap" itemprop="url" title="Sitemap">
                                        Sitemap
                                    </a>
                                </div>
                                <div itemprop="publishingPrinciples">
                                    <a class="grey-text text-lighten-3" href="'.$_SERVER['SERVER_ROOT_URL'].'/imprint" itemprop="url" title="Imprint">
                                        Impressum
                                    </a>
                                </div>
                            </div>
                            <div class="col s6">
                                <h5 class="white-text" itemprop="headline">
                                    Accounts
                                </h5>
                                <div>
                                    <a class="grey-text text-lighten-3" href="https://github.com/Dargmuesli" itemprop="url" target="_blank" title="Github">
                                        Github
                                    </a>
                                <div>
                                    <a class="grey-text text-lighten-3" href="https://www.facebook.com/jonas.dargmuesli.thelemann" itemprop="url" target="_blank" title="Facebook">
                                        Facebook
                                    </a>
                                </div>
                                </div>
                                <div>
                                    <a class="grey-text text-lighten-3" href="https://www.youtube.com/channel/UCmIrzQsJeEM5eW6KOAk9nSg" itemprop="url" target="_blank" title="YouTube">
                                        YouTube
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copyright">
                        <div class="container">
                            Copyright © <span itemprop="copyrightYear">'.date('Y').'</span>, <span itemprop="copyrightHolder">Jonas Thelemann</span>
                        </div>
                    </div>
                </footer>'
                .getFeatureTranslation(['pkg/jq/mjs', 'pkg/mtrl/mjs', 'pkg/jsck/js', 'drg/gtm/mjs', 'drg/base/func.js'])
                .$featureTranslation
                .getFeatureTranslation(['drg/base/opt.js']).'
            </body>
        </html>';

        echo getIndentedML($html);
    }
