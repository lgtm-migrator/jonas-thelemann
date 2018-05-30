function setUpScrollSpy() {
    var standard = true;

    $('.scrollspy').each(function(index) {
        if ($(this).prop('tagName') != 'SECTION') {
            standard = false;

            $(this).on('click', function() {
                if ($(this).hasClass('active')) {
                    history.replaceState({}, null, '#!');

                    $('#toc-mobile').find('a.active').removeClass('active');
                } else {
                    history.replaceState({}, null, '#' + $(this).attr('id'));

                    $('#toc-mobile').find('a.active').removeClass('active');
                    $('#toc-mobile').find('a[href="#' + $(this).attr('id') + '"]').addClass('active');
                }
            });
        }
    });

    if (standard) {
        $('.scrollspy').scrollSpy({
            scrollOffset: 100
        });
    }

    $('#toc-mobile').find('a').each(function(index) {
        $(this).on('click', function(e) {
            e.preventDefault();

            history.replaceState({}, '', e.target.href);

            $('#toc-mobile').find('a.active').removeClass('active');
            $(this).addClass('active');

            $('.collapsible-header.active').removeClass('active');
            $($(this).attr('href') + ' .collapsible-header').addClass('active');
            $('.collapsible').collapsible({
                action: 'open'
            });
        });
    });
}

function setUpPushPin(pinName) {
    if (pinName == 'table of contents') {
        $('#toc').pushpin({
            top: $('#toc').offset().top,
            bottom: $('footer').first().offset().top - $('#toc-mobile').height() - 50,
            offset: 100
        });
    } else if (pinName == 'navigation') {
        $('nav').pushpin({
            top: $('nav').offset().top
        });
    }
}

function destroyPushPin(pinName) {
    if (pinName == 'table of contents') {
        $('#toc').pushpin('remove');
    } else if (pinName == 'navigation') {
        $('nav').pushpin('remove');
    }
}

function setUpSideNav(navName) {
    if (navName == 'menu') {
        // $('#menu-button').sideNav({
        //     edge: 'left'
        // });
        $('#menu-button').sideNavCustomized({
            edge: 'left'
        });
    } else if (navName == 'table of contents') {
        // $('#toc-button').sideNav({
        //     edge: 'right',
        //     closeOnClick: true
        // });
        $('#toc-button').sideNavCustomized({
            edge: 'right',
            closeOnClick: true
        });
    }
}
