$(document).ready(function () {
    $('.materialize-textarea').characterCounter();
    $('.modal').modal();
    $('#songform').validate({
        errorClass: 'invalid',
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');

            if (placement) {
                $(placement).append(error);
            } else {
                error.insertAfter(element);
            }
        },
        groups: {
            titleartist: 'title artist'
        },
        messages: {
            title: {
                required: 'Titel oder Künstler benötigt.'
            },
            artist: {
                required: 'Titel oder Künstler benötigt.'
            }
        },
        rules: {
            title: {
                required: {
                    depends: function () {
                        var artist = $('#artist');
                        return !(artist.length && artist.val().length);
                    }
                }
            },
            artist: {
                required: {
                    depends: function () {
                        var title = $('#title');
                        return !(title.length && title.val().length);
                    }
                }
            },
            comment: {
                maxlength: 200
            }
        },
        submitHandler: function (form) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'layout/extension/extension.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    switch (xhr.status) {
                        case 200:
                            document.getElementById('result-modal-heading').innerHTML = 'Vielen Dank!';
                            document.getElementById('result-modal-content').innerHTML = 'Deine Antwort wurde erfasst.';
                            form.resetForm();
                            break;
                        case 400:
                            document.getElementById('result-modal-heading').innerHTML = 'Eingabeproblem!';
                            document.getElementById('result-modal-content').innerHTML = 'Die abgeschickten Daten waren ungültig.';
                            break;
                        case 403:
                            document.getElementById('result-modal-heading').innerHTML = 'Geschlossen!';
                            document.getElementById('result-modal-content').innerHTML = 'Diese Umfrage ist leider beendet.';
                            break;
                        case 429:
                            document.getElementById('result-modal-heading').innerHTML = 'Limit erreicht!';
                            document.getElementById('result-modal-content').innerHTML = 'Den Server erreichten zu viele Anfragen.';
                            break;
                        case 500:
                            document.getElementById('result-modal-heading').innerHTML = 'Fehler!';
                            document.getElementById('result-modal-content').innerHTML = 'Es kam zu einem internen Fehler.';
                            break;
                        default:
                            document.getElementById('result-modal-heading').innerHTML = 'Fehler!';
                            document.getElementById('result-modal-content').innerHTML = 'Es kam zu einem unbekannten Fehler #' + xhr.status;
                    }

                    $('#result-modal').modal('open');
                }
            };
            xhr.send(new FormData(form));
        }
    });
});
