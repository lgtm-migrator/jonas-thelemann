document.addEventListener('DOMContentLoaded', function () {
    var hashElement = document.getElementById('var');
    var hashParams = Dargmuesli.Prototyping.getHashParams();

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

    }

    document.querySelectorAll('.copy').forEach(function (element) {
        element.addEventListener('click', function () { Dargmuesli.Prototyping.copy('#hash') });
    });
});
