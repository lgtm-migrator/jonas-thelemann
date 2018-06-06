<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/disabled.php';
    include_once 'layout/extension/extension.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            Tools
        </title>
        <link href="/layout/images/favicon.ico" rel="icon" type="image/x-icon">
        <script src="layout/extension/extension.js"></script>
        <script src="https://code.jquery.com/jquery-latest.js"></script>
    </head>
    <body>
        <h1>
            Sitemap Generator
        </h1>
        <p>
            Create a sitemap with correct time settings.
        </p>
        <form>
            <button type="button" id="btn-sitemap">
                Go!
            </button>
        </form>
        <p id="callback-sitemap">

        </p>
    </body>
</html>
