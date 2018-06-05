$(document).ready(function () {
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
        }
    });
});
