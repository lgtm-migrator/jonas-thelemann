export function initializeDatepicker(locale = 'de', disableDayFn = undefined) {
    let options = {};

    switch (locale) {
        case 'de':
            options = {
                disableDayFn: disableDayFn,

                cancel: 'Abbrechen',
                clear: 'Löschen',
                done: 'Ok',

                previousMonth: '<',
                nextMonth: '>',

                months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
                monthsShort: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
                weekdays: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
                weekdaysShort: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
                weekdaysAbbrev: ['S', 'M', 'D', 'M', 'D', 'F', 'S'],

                format: 'd.m.yyyy',

                firstDay: 1
            };

            break;
    }

    M.Datepicker.init(document.querySelectorAll('.datepicker'), options);
}
