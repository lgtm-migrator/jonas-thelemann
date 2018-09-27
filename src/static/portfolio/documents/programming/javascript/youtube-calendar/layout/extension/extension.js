var cronSched = later.parse.recur().on(12).month().on(0, 12).hour().on(0).minute().on(0).second().every(1).dayOfMonth().between(1, 24);
var serverTime = moment();

later.date.localTime();

document.addEventListener('DOMContentLoaded', function () {
    M.FormSelect.init(document.querySelectorAll('select'), {});
    initializeArchiveSelect();
    initializeCalendar();
    showCountdown('countdown', cronSched, ['year', 'month', 'day', 'hour', 'minute', 'second'], 'de');

    $('#archiveform').submit(function (e) {
        var archiveembed = document.getElementById('archiveembed');

        archiveembed.classList.add('buffering');

        $.ajax({
            type: 'GET',
            url: 'layout/extension/extension.php',
            data: $('#archiveform').serialize(),
            success: function (videoLink) {
                if (videoLink != '') {
                    document.getElementById('archiveembed').innerHTML = '<iframe src="' + videoLink + '" allowfullscreen></iframe>';
                }
            }
        });

        e.preventDefault();
    });

    var xhr = new XMLHttpRequest();
    var data = new FormData();

    data.append('task', 'current');

    xhr.open('POST', 'layout/extension/extension.php', true);
    xhr.onreadystatechange = function () {
        if ((xhr.readyState == 4) && (xhr.status == 200)) {
            serverTime = toTimeZone(xhr.getResponseHeader('Date'), 'ddd, DD MMM YYYY HH:mm:ss zz', 'Europe/Berlin');

            if (serverTime.format('M') == '12') {
                var days = tryParseJSON(xhr.responseText);

                if (days) {
                    for (var i = 0, rl = days.length; i < rl; i++) {
                        (function () {
                            var videos = days[i];
                            var calendarDoorButton = document.getElementById('calendardoor' + (i + 1));

                            for (var j = 0, vl = videos.length; j < vl; j++) {
                                var data = videos[j];

                                for (var link in data) {
                                    (function () {
                                        var videoLink = link;
                                        var videoTitle = data[link];
                                        var calendardoorpartbutton = null;

                                        if (j == 0) {
                                            calendardoorpartbutton = document.getElementById('calendardoorparta' + (i + 1));
                                        } else if (j == 1) {
                                            calendardoorpartbutton = document.getElementById('calendardoorpartb' + (i + 1));
                                        }

                                        if (nodeExists(calendardoorpartbutton)) {
                                            calendardoorpartbutton.classList.remove('disabled');
                                            calendardoorpartbutton.title = videoTitle;
                                            calendardoorpartbutton.addEventListener('click', function () {
                                                window.open(videoLink, '_blank');
                                            });

                                            if (nodeExists(calendarDoorButton) && calendarDoorButton.classList.contains('disabled')) {
                                                calendarDoorButton.classList.remove('disabled');

                                                calendarDoorButton.addEventListener('click', function () {
                                                    calendarDoorButton.parentNode.classList.add('opened');
                                                });
                                            }
                                        }
                                    }());
                                }
                            }
                        }());
                    }
                }
            }
        }
    };
    xhr.send(data);

    var time = document.getElementById('time');
    var submitButton = document.getElementById('submit');

    if (nodeExists(time) && nodeExists(submitButton)) {
        $('#time').on('change', function () { formChanged([time], submitButton); });
    }

    formChanged([time], submitButton);
});

function initializeArchiveSelect() {
    if (parseInt(serverTime.format('H')) < 12) {
        document.getElementById('time2').disabled = true;
    }
}

function getDisableArray() {
    var disableArray = [true];

    [2015, 2016].forEach(function (element) {
        var lastDay = 24;

        if (serverTime.format('Y') == element.toString() && serverTime.format('M') == '12' && serverTime.format('D') < 24) {
            lastDay = serverTime.format('D');
        }

        disableArray.push({ from: [element, 11, 1], to: [element, 11, lastDay] });
    });

    return disableArray;
}

function initializeCalendar() {
    var calendarDoorButtons = document.getElementsByClassName('calendardoorcontainer');
    var days = [];
    var i;

    for (i = 0; i < 24; i++) {
        days.push(i + 1);
    }

    var randomDays = shuffle(days);

    for (i = 0; i < 24; i++) {
        var calendardoor = calendarDoorButtons[i].querySelector('.calendardoor');
        var calendardoorparts = calendarDoorButtons[i].querySelectorAll('.doorpart');

        calendardoor.id = 'calendardoor' + randomDays[i];
        calendardoorparts[0].id = 'calendardoorparta' + randomDays[i];
        calendardoorparts[1].id = 'calendardoorpartb' + randomDays[i];
        getFirstChild(calendardoor).innerHTML = randomDays[i];
        getFirstChild(calendardoorparts[0]).innerHTML = 'Vor&shy;mit&shy;tag';
        getFirstChild(calendardoorparts[1]).innerHTML = 'Nach&shy;mit&shy;tag';
    }
}

function getFirstChild(el) {
    var firstChild = el.firstChild;

    while (firstChild != null && firstChild.nodeType == 3) { // skip TextNodes
        firstChild = firstChild.nextSibling;
    }

    return firstChild;
}

function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

function formChanged(formElements, submitButton) {
    var formCompleted = false;

    formElements.forEach(function (formElement) {
        if (formElement.tagName == 'SELECT' && !formElement.options[formElement.selectedIndex].disabled) {
            formCompleted = true;
        }
    });

    if (formCompleted) {
        if (submitButton.classList.contains('disabled')) {
            submitButton.classList.remove('disabled');
        }
    } else {
        submitButton.classList.add('disabled');
    }
}
