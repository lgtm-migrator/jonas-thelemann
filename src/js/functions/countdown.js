import { getPercentage, setDeterminate } from './prototyping.js';

export function showCountdown(id, cronSched, dateParts, locale) {
    var nextCountdownDate = later.schedule(cronSched).next().getTime();
    var lastCountdownDate = later.schedule(cronSched).prev().getTime();
    var lastNextDateDifference = nextCountdownDate - lastCountdownDate;
    var lastNowDateDifference = new Date().getTime() - lastCountdownDate;
    var percentage = 100 / lastNextDateDifference * lastNowDateDifference;

    var targetDate = moment(nextCountdownDate).valueOf();
    var currentDate = moment().valueOf();
    var diffTime = targetDate - currentDate;
    var duration = moment.duration(diffTime, 'milliseconds');

    var interval = 1000;

    setInterval(function () {
        nextCountdownDate = later.schedule(cronSched).next(1).getTime();
        lastCountdownDate = later.schedule(cronSched).prev(1).getTime();
        lastNextDateDifference = nextCountdownDate - lastCountdownDate;
        lastNowDateDifference = new Date().getTime() - lastCountdownDate;
        percentage = getPercentage(lastNextDateDifference, lastNowDateDifference);

        targetDate = moment(nextCountdownDate).valueOf();
        currentDate = moment().valueOf();
        diffTime = targetDate - currentDate;
        duration = moment.duration(diffTime, 'milliseconds');

        setDeterminate(percentage, 'countdownprogressbar');

        duration = moment.duration(duration - interval, 'milliseconds');
        document.getElementById(id).innerHTML = duration.locale(locale).humanize();
    }, interval);
}

export function timeConverter(UNIX_timestamp) {
    var a = new Date(UNIX_timestamp);
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var year = a.getFullYear();
    var month = months[a.getMonth()];
    var date = a.getDate();
    var hour = a.getHours();
    var min = a.getMinutes();
    var sec = a.getSeconds();
    var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec;

    return time;
}
