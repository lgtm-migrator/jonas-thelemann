import { setupCardClosers } from './cards.js';
import { nodeExists } from './prototyping.js';
import { /*destroyPushPin,*/ setUpPushPin, setUpScrollSpy, setUpSidenav } from './setup.js';

$(document).ready(function () {
    M.updateTextFields();

    if (window.location.hash != '' && window.location.hash != '#!') {
        $(window.location.hash + ' .collapsible-header').addClass('active');
        $('#toc-mobile').find('a[href="' + window.location.hash + '"]').addClass('active');
    }

    setUpPushPin('navigation');
    setUpPushPin('toc');
    setUpSidenav('menu');
    setUpSidenav('toc');
    setUpScrollSpy('scrollspy');

    setupCardClosers();
});

window.addEventListener('hashchange', offsetAnchor);

window.addEventListener('resize', function () {
    // https://github.com/Dogfalo/materialize/issues/6135
    // destroyPushPin('navigation');
    // destroyPushPin('toc');

    // Update slide out time
    setUpSidenav('menu');
    setUpSidenav('toc');

    setUpPushPin('navigation');
    setUpPushPin('toc');
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
