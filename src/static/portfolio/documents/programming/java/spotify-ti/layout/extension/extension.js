document.addEventListener('DOMContentLoaded', function () {
    var hashElement = document.getElementById('var');
    var hashParams = getHashParams();

    if (!jQuery.isEmptyObject(hashParams)) {
        hashElement.innerHTML = '<h2>\
        Dein Code\
        </h2>\
        <p>\
            <strong>\
                Er läuft in ' + hashParams['expires_in'] + ' Sekunden ab.\
            </strong>\
            Kopiere ihn als nächstes und füge ihn in SpotifyTI ein.\
        </p>\
        <div class="card-panel"><span id="hash">' + hashParams['access_token'] + '</span></div>\
        <p>\
            <a class="waves-effect waves-light btn" href="' + window.location.hash + '">\
                <i class="material-icons left">\
                    content_copy\
                </i>\
                Copy\
            </a>\
        </p>';

        var btn = document.querySelector('.btn');

        btn.addEventListener('click', function () {
            var range = document.createRange();
            var selection = window.getSelection();

            range.selectNodeContents(document.querySelector('#hash'));
            selection.removeAllRanges();
            selection.addRange(range);

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Copying text command was ' + msg);
            } catch (err) {
                console.log('Oops, unable to copy');
            }
        });
    }
});

function getHashParams() {
    var hashParams = {};
    var e,
        a = /\+/g,
        r = /([^&;=]+)=?([^&;]*)/g,
        d = function (s) {
            return decodeURIComponent(s.replace(a, ' '));
        },
        q = window.location.hash.substring(1);

    while (e == r.exec(q))
        hashParams[d(e[1])] = d(e[2]);

    return hashParams;
}
