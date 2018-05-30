<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/navigation/translation.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/url/rootpointer.php';

    function getBreadcrumbsHtml($title)
    {
        $error = boolval(preg_match_all('/\\b([0-9][0-9][0-9])\\b/', $title));
        $loc = $_SERVER['REQUEST_URI'];
        $dir = substr($loc, 0, strrpos($loc, '/'));
        $dirs = explode('/', $dir);
        $folder = substr($dir, strrpos($dir, '/') + 1, strlen($dir));
        $breadcrumbsHtml = null;

        if (isset($dirs[1]) && $dirs[1] == 'portfolio') {
            $dirs = array_splice($dirs, 1, count($dirs) - 1);
        }

        if (!$error) {
            $breadcrumbsHtml = '<a class="breadcrumb" href="#!"></a>';

            if (count($dirs) == 1) {
                $breadcrumbsHtml .= '
                <div class="breadcrumb" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a class="breadcrumb" href="#!" itemprop="item">
                        <span itemprop="name">
                            '.getNavigationTranslation('welcome').'
                        </span>
                    </a>
                    <meta itemprop="position" content="0">
                </div>';
            } else {
                for ($i = 0; $i < count($dirs); ++$i) {
                    if ($dirs[$i] != '' && $dirs[$i] != 'portfolio') {
                        $translatedDirsI = getNavigationTranslation($dirs[$i]);

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
                                    <a class="breadcrumb" href="'.getRootPointerString(count($dirs) - $i - 1).'" itemprop="item">
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
                '.getNavigationTranslation('error').'
            </a>';
        }

        return $breadcrumbsHtml;
    }
