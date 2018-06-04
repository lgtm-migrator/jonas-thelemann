document.addEventListener('DOMContentLoaded', function () {
    addPreloaderHtml('top10', 'big', 'green');
    addPreloaderHtml('attacksperday', 'big', 'green');
    addPreloaderHtml('attacksperhours', 'big', 'green');
    addPreloaderHtml('banlist', 'big', 'green');
});

var page = getQueryValue(getQueryArray(window.location.href), 'page');

if (!isNumeric(page)) {
    page = 1;
}

insertDatabaseRankingsListHtml('server', 'banlist', 'ip', 10, 'top10');
insertDatabaseTableHtml('server', 'banlist', '[{"ID":"id"},{"IP":"ip"},{"Zeit":"created"},{"Protokoll":"protocol"}]', '10', page, '[{"id":"ASC"}]', 'centered,responsive-table,striped', 'banlist');
