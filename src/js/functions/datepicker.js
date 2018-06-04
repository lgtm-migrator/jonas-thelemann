export function initializeDatepicker(locale, selectYears = undefined, disable = undefined) {
    // Strings and translations
    /**/
    var monthsFull = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    /**/
    var monthsShort = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    /**/
    var weekdaysFull = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    /**/
    var weekdaysShort = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    /**/
    var weekdaysLetter = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
    // var showMonthsShort = undefined;
    // var showWeekdaysFull = undefined;

    // Buttons
    /**/
    var today = 'Today';
    /**/
    var clear = 'Clear';
    /**/
    var close = 'Close';

    // Accessibility labels
    /**/
    var labelMonthNext = 'Next month';
    /**/
    var labelMonthPrev = 'Previous month';
    /**/
    var labelMonthSelect = 'Select a month';
    /**/
    var labelYearSelect = 'Select a year';

    // Formats
    /**/
    var format = 'd mmmm, yyyy';
    /**/
    var formatSubmit = undefined;
    // var hiddenPrefix = undefined;
    // var hiddenSuffix = '_submit';
    // var hiddenName = undefined;

    //// Editable input
    // var editable = undefined;

    // First day of the week
    /**/
    var firstDay = undefined;

    // // Date limits
    // var min = undefined;
    // var max = undefined;

    // // Root picker container
    // var container = undefined;

    // // Hidden input container
    // var containerHidden = undefined;

    // Close on a user action
    var closeOnSelect = true;
    var closeOnClear = true;

    // // Events
    // var onStart = undefined;
    // var onRender = undefined;
    // var onOpen = undefined;
    // var onClose = undefined;
    // var onSet = undefined;
    // var onStop = undefined;

    if (locale == 'de') {
        monthsFull = ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'];
        monthsShort = ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'];
        weekdaysFull = ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'];
        weekdaysShort = ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'];
        weekdaysLetter = ['S', 'M', 'D', 'M', 'D', 'F', 'S'];

        today = 'Heute';
        clear = 'Löschen';
        close = 'Schließen';

        labelMonthNext = 'Nächster Monat';
        labelMonthPrev = 'Vorheriger Monat';
        labelMonthSelect = 'Monat auswählen';
        labelYearSelect = 'Jahr auswählen';

        format = 'd.m.yyyy';
        formatSubmit = 'yyyy-mm-dd';

        firstDay = 1;
    }

    $('.datepicker').pickadate({
        monthsFull: monthsFull,
        monthsShort: monthsShort,
        weekdaysFull: weekdaysFull,
        weekdaysShort: weekdaysShort,
        weekdaysLetter: weekdaysLetter,

        today: today,
        clear: clear,
        close: close,

        closeOnSelect: closeOnSelect,
        closeOnClear: closeOnClear,

        firstDay: firstDay,

        format: format,
        formatSubmit: formatSubmit,

        labelMonthNext: labelMonthNext,
        labelMonthPrev: labelMonthPrev,
        labelMonthSelect: labelMonthSelect,
        labelYearSelect: labelYearSelect,

        selectYears: selectYears,

        disable: disable
    });
}
