document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btn-sitemap').addEventListener('click', function () {
        document.getElementById('callback-sitemap').innerHTML = 'Running<br>';

        generateSitemap(generateSitemapCallback);
    });
});

function generateSitemap() {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'layout/extension/extension.php?sitemap=1', true);
    xhr.onreadystatechange = function () {
        if ((xhr.readyState == 4) && (xhr.status == 200)) {
            var lastLine = getLastLine(xhr.responseText);

            if (lastLine == 'ok') {
                generateSitemapCallback(true);
            } else {
                generateSitemapCallback(false);
            }
        }
    };
    xhr.send();
}

function generateSitemapCallback(success) {
    if (success) {
        document.getElementById('callback-sitemap').innerHTML = 'Done!';
    } else {
        document.getElementById('callback-sitemap').innerHTML = 'There was a problem!';
    }
}

function getLastLine(string) {
    if (string.lastIndexOf('\n') > 0) {
        return string.substring(string.lastIndexOf('\n') + 1, string.length);
    } else {
        return string;
    }
}
