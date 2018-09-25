export function setUpScrollSpy() {
    var standard = true;

    $('.scrollspy').each(function () {
        if ($(this).prop('tagName') != 'SECTION') {
            standard = false;

            $(this).on('click', function () {
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

    $('#toc-mobile').find('a').each(function () {
        $(this).on('click', function (e) {
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

export function setUpPushPin(pinName) {
    let footer = document.querySelector('footer');

    if (pinName == 'toc') {
        let toc = document.querySelector('#toc');
        let toc_mobile = document.querySelector('#toc-mobile');

        M.Pushpin.init(toc, {
            top: toc.getBoundingClientRect().top + window.pageYOffset,
            bottom: footer.getBoundingClientRect().top + window.pageYOffset - toc_mobile.clientHeight - 50,
            offset: 100
        });
    } else if (pinName == 'navigation') {
        let nav = document.querySelector('nav');

        M.Pushpin.init(nav, {
            top: nav.getBoundingClientRect().top + window.pageYOffset,
            bottom: footer.getBoundingClientRect().top + window.pageYOffset - nav.clientHeight
        });
    }
}

export function destroyPushPin(pinName) {
    if (pinName == 'toc') {
        M.Pushpin.getInstance(document.querySelector('#toc')).destroy();
    } else if (pinName == 'navigation') {
        M.Pushpin.getInstance(document.querySelector('nav')).destroy();
    }
}

export function setUpSidenav(navName) {
    if (navName == 'menu') {
        // $('#menu-button').sidenavCustomized({
        M.Sidenav.init(document.querySelector('#nav-mobile'), {
            edge: 'left',
            outDuration: window.innerWidth > 600 ? 0 : 200
        });
    } else if (navName == 'toc') {
        // $('#toc-button').sidenavCustomized({
        M.Sidenav.init(document.querySelector('#toc-mobile'), {
            edge: 'right',
            outDuration: window.innerWidth > 992 ? 0 : 200
        });
    }
}
