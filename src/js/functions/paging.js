import { getQueryArray, getWithoutQueryString } from './prototyping.js';
import { addPreloaderHtml, insertDatabaseTableHtml } from './html.js';

export function addPageButtonListeners(dbh, name, columns, limit, order, classes, id) {
    var pageButtons = document.querySelectorAll('.pagination button');

    for (var i = 0; i < pageButtons.length; i++) {
        (function () {
            var pageButton = pageButtons[i];

            pageButton.addEventListener('click', function () {
                redirectToPage(dbh, name, columns, limit, pageButton.dataset.page, order, classes, id);
            });
        }());
    }
}

export function redirectToPage(dbh, name, columns, limit, nextPage, order, classes, id) {
    var queryArray = getQueryArray(window.location.href);
    var queryStringNew = '';

    var idElement = document.getElementById(id);
    var height = idElement.clientHeight;

    idElement.style.minHeight = height + 'px';

    addPreloaderHtml(id, 'big', 'green');

    queryArray.forEach(function (value) {
        if (queryStringNew == '') {
            queryStringNew += '?';
        } else {
            queryStringNew += '&';
        }

        if (value[0] == '' || value[0] == 'page') {
            queryStringNew += 'page=' + nextPage;
        } else {
            queryStringNew += value;
        }
    });

    insertDatabaseTableHtml(dbh, name, columns, limit, nextPage, order, classes, id);
    window.history.replaceState(queryStringNew, document.title, getWithoutQueryString(window.location.href) + queryStringNew);
}
