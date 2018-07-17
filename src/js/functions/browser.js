import { setupCardClosers } from './cards.js';
import { nodeExists } from './prototyping.js';
import { destroyPushPin, setUpPushPin, setUpScrollSpy, setUpSideNav } from './setup.js';

$(document).ready(function () {
    Materialize.updateTextFields();
    $('select').material_select();

    if (window.location.hash != '' && window.location.hash != '#!') {
        $(window.location.hash + ' .collapsible-header').addClass('active');
        $('#toc-mobile').find('a[href="' + window.location.hash + '"]').addClass('active');
        $('.collapsible').collapsible();
    }

    setUpPushPin('navigation');
    setUpPushPin('table of contents');
    setUpSideNav('menu');
    setUpSideNav('table of contents');
    setUpScrollSpy('scrollspy');

    setupCardClosers();
});

$(window).on('hashchange', offsetAnchor);

$(window).resize(function () {
    destroyPushPin('navigation');
    destroyPushPin('table of contents');

    setUpPushPin('navigation');
    setUpPushPin('table of contents');
});

window.onpopstate = function (e) {
    if (e.state) {
        document.getElementById('content').innerHTML = e.state.html;
        document.title = e.state.pageTitle;
    }
};

window.setTimeout(offsetAnchor, 1);

export function offsetAnchor() {
    if (window.location.hash != '' && window.location.hash != '#!') {
        var hashElement = document.querySelector(window.location.hash);

        if (nodeExists(hashElement)) {
            var bodyRect = document.body.getBoundingClientRect();
            var elemRect = hashElement.getBoundingClientRect();
            var offset = elemRect.top - bodyRect.top;

            window.scrollTo(window.scrollX, offset - 100);
        }
    }
}
