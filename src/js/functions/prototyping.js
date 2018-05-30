Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}

NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for (var i = this.length - 1; i >= 0; i--) {
        if (this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}

function nodeExists(node) {
    var nodeExists = false;

    if (typeof(node) != 'undefined' && node != null) {
        nodeExists = true;
    }

    return nodeExists;
}

function getLastLine(string) {
    if (string.lastIndexOf('\n') > 0) {
        return string.substring(string.lastIndexOf('\n') + 1, string.length);
    } else {
        return string;
    }
}

function getQueryArray(url) {
    var queryArray = [];
    var queryParts = getQueryString(url).split('&');

    queryParts.forEach(function(value, index, array) {
        var queryPairs = value.split('=');

        queryArray.push(queryPairs);
    });

    return queryArray;
}

function getQueryString(url) {
    var getQueryString = '';

    if (url.includes('?')) {
        getQueryString = url.replace(/.*\?/, '');
    }

    return getQueryString;
}

function getQueryValue(queryArray, key) {
    for (var i = 0; i < queryArray.length; i++) {
        if (queryArray[i][0] == key) {
            return queryArray[i][1];
        }
    }
}

function getWithoutQueryString(url) {
    return url.replace(/\?.*/, '');
}

function tryParseJSON(jsonString) {
    try {
        var json = JSON.parse(jsonString);

        if (json && typeof json === 'object') {
            return json;
        }
    } catch (e) {
        return false;
    }
};

function getPercentage(span, value) {
    var percentage = null;

    percentage = 100 / span * value;

    return percentage;
}

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function toTimeZone(time, format, zone) {
    return moment.tz(time, format, 'Etc/GMT').tz(zone);
}

function setDeterminate(percentage, id) {
    idElement = document.getElementById(id);

    idElement.classList.remove('indeterminate');
    idElement.classList.add('determinate');

    idElement.style.width = percentage + '%';
}

function setIndeterminate(id) {
    idElement = document.getElementById(id);

    idElement.classList.remove('determinate');
    idElement.classList.add('indeterminate');
}
