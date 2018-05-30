<?php
    $lclPath = 'layout/extension';
    $drgPath = '/resources/dargmuesli';
    $pkgPath = '/resources/packages/yarn';
    $featureTranslations = array(
        'lcl' => array(
            'ext' => array(
                'js' => '/extension.js',
                'css' => '/extension.css',
            ),
        ),
        'drg' => array(
            'base' => array(
                'func.js' => '/base/functions.js',
                'func.mjs' => '/base/functions.min.js',
                'opt.js' => '/base/options.js',
                'stl.css' => '/base/style.css',
                'stl.mcss' => '/base/style.min.css',
            ),
            'gtm' => array(
                'mjs' => '/google-tagmanager/tagmanager.js',
                'js' => '/google-tagmanager/tagmanager.min.js',
            ),
        ),
        'pkg' => array(
            'chrt' => array(
                'js' => '/chart.js/Chart.js',
                'mjs' => '/chart.js/Chart.min.js',
            ),
            'drgl' => array(
                'css' => '/dragula/dragula.css',
                'js' => '/dragula/dragula.js',
                'mcss' => '/dragula/dragula.min.css',
                'mjs' => '/dragula/dragula.min.js',
            ),
            'jq' => array(
                'js' => '/jquery/jquery.js',
                'mjs' => '/jquery/jquery.min.js',
                'slm.js' => '/jquery/jquery.slim.js',
                'slm.mjs' => '/jquery/jquery.slim.min.js',
            ),
            'jqv' => array(
                'de.js' => '/jquery-validation/localization/messages_de.js',
                'js' => '/jquery-validation/jquery.validate.js',
                'mjs' => '/jquery-validation/jquery.validate.min.js',
            ),
            'jsck' => array(
                'js' => '/js-cookie/js.cookie.js',
            ),
            'ltr' => array(
                'js' => '/later/later.js',
                'mjs' => '/later/later.min.js',
            ),
            'mtrl' => array(
                'css' => '/materialize-css/css/materialize.css',
                'js' => '/materialize-css/js/materialize.js',
                'mcss' => '/materialize-css/css/materialize.min.css',
                'mjs' => '/materialize-css/js/materialize.min.js',
            ),
            'mmnt' => array(
                'wlcls.js' => '/moment/moment-with-locales.js',
                'wlcls.mjs' => '/moment/moment-with-locales.min.js',
                'js' => '/moment/moment.js',
                'mjs' => '/moment/moment.min.js',
            ),
            'mmnttz' => array(
                'wdt-2k10-20.js' => '/moment-timezone/moment-timezone-with-data-2010-2020.js',
                'wdt-2k10-20.mjs' => '/moment-timezone/moment-timezone-with-data-2010-2020.min.js',
                'wdt.js' => '/moment-timezone/moment-timezone-with-data.js',
                'wdt.mjs' => '/moment-timezone/moment-timezone-with-data.min.js',
                'js' => '/moment-timezone/moment-timezone.js',
                'mjs' => '/moment-timezone/moment-timezone.min.js',
            ),
            'prsm' => array(
                'coy.css' => '/prismjs/themes/prism-coy.css',
                'drk.css' => '/prismjs/themes/prism-dark.css',
                'fnk.css' => '/prismjs/themes/prism-funky.css',
                'okid.css' => '/prismjs/themes/prism-okaidia.css',
                'slr.css' => '/prismjs/themes/prism-solarizedlight.css',
                'tmrrw.css' => '/prismjs/themes/prism-tomorrow.css',
                'twlgt.css' => '/prismjs/themes/prism-twilight.css',
                'css' => '/prismjs/themes/prism.css',
                'js' => array(
                    '/prismjs/prism.js',
                    '/prismjs/plugins/autoloader/prism-autoloader.min.js',
                    '/prismjs/plugins/line-numbers/prism-line-numbers.min.js',
                    '/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js',
                ),
            ),
        ),
        'ext' => array(
            'recaptcha' => array(
                'de-async-defer' => 'https://www.google.com/recaptcha/api.js?hl=de',
            ),
        ),
    );

    function getFeatureTranslation($featureArray)
    {
        if (!empty($featureArray) && !is_array($featureArray)) {
            return;
        }

        global $featureTranslations;
        global $lclPath;
        global $drgPath;
        global $pkgPath;

        $featureTranslation = null;

        foreach ($featureArray as $key => $value) {
            $featureParts = array();

            if (!is_numeric($key)) {
                $featureParts = explode('/', $key);
            } else {
                $featureParts = explode('/', $value);
            }

            if (isset($featureTranslations[$featureParts[0]][$featureParts[1]]) && array_key_exists($featureParts[2], $featureTranslations[$featureParts[0]][$featureParts[1]])) {
                $link = null;

                $featurePaths = $featureTranslations[$featureParts[0]][$featureParts[1]][$featureParts[2]];

                if (!is_array($featurePaths)) {
                    $featurePaths = array($featurePaths);
                }

                foreach ($featurePaths as $featurePath) {
                    switch ($featureParts[0]) {
                        case 'lcl':
                            $link = $lclPath.$featurePath;
                            break;
                        case 'drg':
                            $link = $_SERVER['SERVER_ROOT_URL'].$drgPath.$featurePath;
                            break;
                        case 'pkg':
                            $link = $_SERVER['SERVER_ROOT_URL'].$pkgPath.$featurePath;
                            break;
                        case 'ext':
                            $link = $featurePath;
                            break;
                    }

                    $tag = null;

                    if (is_type($link, 'script')) {
                        $tag = '<script src="'.$link.'"></script>';
                    } elseif (is_type($link, 'style')) {
                        $tag = '<link href="'.$link.'" rel="stylesheet">';
                    } else {
                        $tag = '<!--'.$featureParts[0].'/'.$featureParts[1].'/'.$featureParts[2].'-->';
                    }

                    if (!is_numeric($key)) {
                        $tag = preg_replace('/></', ' crossorigin="anonymous" integrity="'.$value.'"><', $tag);
                    }

                    $featureTranslation .= PHP_EOL.$tag;
                }
            } else {
                $featureTranslation .= PHP_EOL.'<!--'.$featureParts[0].'/'.$featureParts[1].'/'.$featureParts[2].'-->';
            }
        }

        return $featureTranslation;
    }

    function is_type($link, $type) {
        $typeArray = null;
        $link = parse_url($link, PHP_URL_PATH);

        switch ($type) {
            case 'script':
                $typeArray = array('js');
                break;
            case 'style':
                $typeArray = array('css');
                break;
        }

        if (strpos($link, '.') !== false) {
            return in_array(substr(strrchr($link, '.'), 1), $typeArray);
        } else {
            return in_array($id, $typeArray);
        }
    }
