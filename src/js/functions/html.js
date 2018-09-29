import { addPageButtonListeners } from './paging.js';
import { nodeExists } from './prototyping.js';

export function addPreloaderHtml(id, size, color) {
    var sizeHtml = '';

    if (size == 'big') {
        sizeHtml = 'big ';
    } else if (size == 'small') {
        sizeHtml = 'small ';
    }

    var colorHtml = '';

    if (color == 'blue') {
        colorHtml = 'blue';
    } else if (color == 'red') {
        colorHtml = 'red';
    } else {
        colorHtml = 'green';
    }

    document.getElementById(id).innerHTML = `
    <div class="preloader-wrapper ` + sizeHtml + `active">
        <div class="spinner-layer spinner-` + colorHtml + `-only">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>`;
}

export function insertDatabaseTableHtml(tableName, columnNames, limit, page, order, classes, id) {
    var xhr = new XMLHttpRequest();
    var data = new FormData();

    if (typeof page === 'undefined' || !page) {
        page = 1;
    }

    data.append('tableName', tableName);
    data.append('columnNames', columnNames);
    data.append('limit', limit);
    data.append('page', page);
    data.append('order', order);
    data.append('classes', classes);

    xhr.open('POST', '/resources/dargmuesli/database/table.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var targetElement = document.getElementById(id);

            if (nodeExists(targetElement)) {
                targetElement.innerHTML = xhr.responseText;
            } else {
                console.log('No element with id "' + id + '" exists!');
            }

            addPageButtonListeners(tableName, columnNames, limit, order, classes, id);
        }
    };
    xhr.send(data);
}

export function insertDatabaseRankingsHtml(data, id) {
    var xhr = new XMLHttpRequest();

    xhr.open('POST', '/resources/dargmuesli/database/rankings.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var targetElement = document.getElementById(id);

            if (nodeExists(targetElement)) {
                targetElement.innerHTML = xhr.responseText;
            } else {
                console.log('No element with id "' + id + '" exists!');
            }
        }
    };
    xhr.send(data);
}

export function insertDatabaseRankingsListHtml(tableName, columnName, limit, id) {
    var data = new FormData();

    data.append('rankingType', 'list');
    data.append('tableName', tableName);
    data.append('columnName', columnName);
    data.append('limit', limit);

    insertDatabaseRankingsHtml(data, id);
}

// export function insertDatabaseRankingsMatrixHtml(tableName, categories, id) {
//     var data = new FormData();

//     data.append('rankingType', 'matrix');
//     data.append('tableName', tableName);
//     data.append('categories', categories);

//     insertDatabaseRankingsHtml(data, id);
// }
