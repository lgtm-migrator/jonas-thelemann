<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/navigation/translation.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/url/rootpointer.php';

    function get_breadcrumbs_html($title)
    {
        $error = boolval(preg_match_all('/\\b([0-9][0-9][0-9])\\b/', $title));
        $loc = $_SERVER['REQUEST_URI'];
        $dir = substr($loc, 0, strrpos($loc, '/'));
        $dirs = explode('/', $dir);
        $folder = substr($dir, strrpos($dir, '/') + 1, strlen($dir));
        $breadcrumbsHtml = null;

        if (isset($dirs[0]) && $dirs[0] == '') {
            $dirs = array_splice($dirs, 1, count($dirs) - 1);
        }

        if (!$error) {
            $breadcrumbsHtml = '<a class="breadcrumb" href="#!" title="breadcrumbs"></a>';

            if (count($dirs) == 0) {
                $breadcrumbsHtml .= '
                <div class="breadcrumb" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a class="breadcrumb" href="#!" itemprop="item">
                        <span itemprop="name">
                            '.get_navigation_translation('welcome').'
                        </span>
                    </a>
                    <meta itemprop="position" content="0">
                </div>';
            } else {
                for ($i = 0; $i < count($dirs); ++$i) {
                    if ($dirs[$i] != '' && ($dirs[$i] != 'portfolio') || ($i == count($dirs) - 1)) {
                        $translatedDirsI = get_navigation_translation($dirs[$i]);

                        if ($translatedDirsI != '') {
                            if ($i == count($dirs) - 1) {
                                $breadcrumbsHtml .= '
                                <div class="breadcrumb" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    <a class="breadcrumb" href="../'.$dirs[$i].'/#!" itemprop="item">
                                        <span itemprop="name">
                                            '.$translatedDirsI.'
                                        </span>
                                    </a>
                                    <meta itemprop="position" content="'.$i.'">
                                </div>';
                            } else {
                                $breadcrumbsHtml .= '
                                <div class="breadcrumb" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    <a class="breadcrumb" href="'.get_root_pointer_string(count($dirs) - $i - 1).'" itemprop="item">
                                        <span itemprop="name">
                                            '.$translatedDirsI.'
                                        </span>
                                    </a>
                                    <meta itemprop="position" content="'.$i.'">
                                </div>';
                            }
                        }
                    }
                }
            }
        } else {
            $breadcrumbsHtml = '
            <a class="breadcrumb" href="#!" itemprop="item">
                '.get_navigation_translation('error').'
            </a>';
        }

        return $breadcrumbsHtml;
    }
