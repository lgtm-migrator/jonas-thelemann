<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/filesystem/directory.php';

    function getSitemapHtml($directoryArray = null, $directoryArrayKey = null)
    {
        global $protocol;

        // Initialize directory array
        if (!isset($directoryArray)) {
            $directoryArray = getWebDirectoryArray($_SERVER['DOCUMENT_ROOT'], null, '*');
        }

        // Initialize directory array key
        if (!isset($directoryArrayKey)) {
            $directoryArrayKey = '';
        }

        // Invert directory array
        $directoryArrayKeys = array_keys($directoryArray);

        $sitemapHtml = '<ul class="collection">';

        // Iterate over every folder
        for ($i = 0; $i < count($directoryArray); ++$i) {

            // Display a colletion item
            $sitemapHtml .= '
            <li>
                <a class="collection-item" href="/'.$directoryArrayKey.$directoryArrayKeys[$i].'" title="'.$directoryArrayKeys[$i].'">
                    '.$directoryArrayKeys[$i].'
                </a>';

            // Integrate subfolders
            if (!empty($directoryArray[$directoryArrayKeys[$i]])) {
                $sitemapHtml .= PHP_EOL.getSitemapHtml($directoryArray[$directoryArrayKeys[$i]], $directoryArrayKey.$directoryArrayKeys[$i].DIRECTORY_SEPARATOR);
            }

            $sitemapHtml .= '
            </li>';
        }

        $sitemapHtml .= '
        </ul>';

        return $sitemapHtml;
    }

    function getSitemapXml()
    {
        $sitemapXml = '<?xml version="1.0" encoding="UTF-8"?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'
            .getSitemapXmlUrl().'
        </urlset>';

        return $sitemapXml;
    }

    function getSitemapXmlUrl($directoryArray = null, $directoryArrayKey = null)
    {
        global $protocol;
        $sitemapXmlPage = '';

        // Initialize directory array
        if (!isset($directoryArray)) {
            $directoryArray = getWebDirectoryArray($_SERVER['DOCUMENT_ROOT'], null, '*');
        }

        // Initialize directory array key
        if (!isset($directoryArrayKey)) {
            $directoryArrayKey = '';
        }

        // Invert directory array
        $directoryArrayKeys = array_keys($directoryArray);

        // Iterate over every folder
        for ($i = 0; $i < count($directoryArray); ++$i) {
            $hostPath = $directoryArrayKey.$directoryArrayKeys[$i].DIRECTORY_SEPARATOR;

            if ($directoryArrayKeys[$i] != 'portfolio') {
                $lastModification = date('Y-m-d\TH:i:s+02:00', filemtime($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$hostPath.'index.php'));

                echo $hostPath."\n";

                // Display a colletion item
                $sitemapXmlPage .= '
                <url>
                    <loc>'.$_SERVER['SERVER_ROOT_URL'].'/'.$hostPath.'</loc>
                    <lastmod>'.$lastModification.'</lastmod>
                    <changefreq>'.getChangeFreq($lastModification).'</changefreq>
                    <priority>'.getUrlPriority($hostPath).'</priority>
                </url>';
            }

            // Integrate subfolders
            if (!empty($directoryArray[$directoryArrayKeys[$i]])) {
                $sitemapXmlPage .= getSitemapXmlUrl($directoryArray[$directoryArrayKeys[$i]], $hostPath);
            }
        }

        return $sitemapXmlPage;
    }

    function getUrlPriority($url)
    {
        $priority = 1.1 - substr_count($url, '/') * 0.1;

        if ($priority > 0.0) {
            return number_format($priority, 1, '.', ',');
        } else {
            return 0.0;
        }
    }
