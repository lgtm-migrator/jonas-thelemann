document.addEventListener('DOMContentLoaded', function () {
    Dargmuesli.Html.addPreloaderHtml('top10', 'big', 'green');
    Dargmuesli.Html.addPreloaderHtml('attacksperday', 'big', 'green');
    Dargmuesli.Html.addPreloaderHtml('attacksperhours', 'big', 'green');
    Dargmuesli.Html.addPreloaderHtml('banlist', 'big', 'green');
});

var page = Dargmuesli.Prototyping.getQueryValue(Dargmuesli.Prototyping.getQueryArray(window.location.href), 'page');

if (!Dargmuesli.Prototyping.isNumeric(page)) {
    page = 1;
}

Dargmuesli.Html.insertDatabaseRankingsListHtml('banlist', 'ip', 10, 'top10');
Dargmuesli.Html.insertDatabaseTableHtml('banlist', '[{"ID":"id"},{"IP":"ip"},{"Zeit":"created"},{"Protokoll":"protocol"}]', '10', page, '[{"id":"ASC"}]', 'centered,responsive-table,striped', 'banlist');
