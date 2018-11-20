<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/strings.php';

    /**
     * Returns an array of all web-subdirectories of a directory.
     *
     * @param   directoryName   The directory to scan.
     * @param   detailPaths    An array of paths to explicitly scan. Overrides levels.
     * @param   levels  The maximum value of subdirectory depth. "*" for recursive scanning. Defaults to 0.
     * @return  directoryArray  An array of directories.
     * @throws  Exception   If $directoryName is not a valid directory.
     */
    function get_web_directory_array($directoryName, $detailPaths = null, $levels = 0)
    {
        // Validate the directory
        if (!is_dir($directoryName)) {
            throw new Exception('"'.$directoryName.'" is not a valid directory!');
        }

        if (!starts_with($directoryName, $_SERVER['SERVER_ROOT'])) {
            throw new Exception('"'.$directoryName.'" is not within server root!');
        }

        $directoryArray = array();

        // Scan the directory getting rid of Linux's relative dot links
        $scanResult = array_diff(scandir($directoryName), array('..', '.'));

        // Validate the scan result
        if ($scanResult) {

            // Iterate over scan result's elements
            foreach ($scanResult as $index => $folderName) {

                // Only process directories that are neither hidden nor blacklisted by name but contain a webpage
                if (
                        is_dir($directoryName.DIRECTORY_SEPARATOR.$folderName)
                        && $folderName != 'tools'
                        && (file_exists($directoryName.DIRECTORY_SEPARATOR.$folderName.DIRECTORY_SEPARATOR.'index.php') || file_exists($directoryName.DIRECTORY_SEPARATOR.$folderName.DIRECTORY_SEPARATOR.'index.html') || file_exists($directoryName.DIRECTORY_SEPARATOR.$folderName.DIRECTORY_SEPARATOR.'index.htm'))
                        && !file_exists($directoryName.DIRECTORY_SEPARATOR.$folderName.DIRECTORY_SEPARATOR.'.hidden')
                    ) {
                    if (is_array($detailPaths) && starts_with($detailPaths, $directoryName.DIRECTORY_SEPARATOR.$folderName.DIRECTORY_SEPARATOR)) {

                        // Scan child directories for given paths
                        $directoryArray[$folderName] = get_web_directory_array($directoryName.DIRECTORY_SEPARATOR.$folderName.DIRECTORY_SEPARATOR, $detailPaths, $levels - 1);
                    } elseif (is_int($levels) && $levels > 0) {

                        // Scan child directories to a certain depth
                        $directoryArray[$folderName] = get_web_directory_array($directoryName.DIRECTORY_SEPARATOR.$folderName.DIRECTORY_SEPARATOR, null, '*');
                    } elseif (is_string($levels) && $levels == '*') {

                        // Scan child directories recursively
                        $directoryArray[$folderName] = get_web_directory_array($directoryName.DIRECTORY_SEPARATOR.$folderName.DIRECTORY_SEPARATOR, null, '*');
                    } else {
                        $directoryArray[$folderName] = array();
                    }
                }
            }
        }

        return $directoryArray;
    }
