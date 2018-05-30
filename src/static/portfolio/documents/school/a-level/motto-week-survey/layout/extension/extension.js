var checkCount = 0;
var subbut = null;
var checkboxes = null;

document.addEventListener('DOMContentLoaded', function(event) {
    checkboxes = document.getElementsByClassName('chkbx');
    subbut = document.getElementById('subbut');

    for (i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('click', function() {
            checkChanged(this);
        });
    }

    if (checkCount == 5) {
        disableChecks();
    }

    if (checkCount > 0) {
        subbut.disabled = false;
    } else {
        subbut.disabled = true;
    }
});

function checkChanged(element) {
    if (element.checked) {
        checkCount++;
    } else {
        checkCount--;
    }

    if (checkCount > 0) {
        if (checkCount == 5) {
            disableChecks();
        } else {
            enableChecks();
        }
        subbut.disabled = false;
    } else {
        subbut.disabled = true;
    }
}

function disableChecks() {
    for (i = 0; i < checkboxes.length; i++) {
        if (!checkboxes[i].checked) {
            checkboxes[i].disabled = true;
        }
    }
}

function enableChecks() {
    for (i = 0; i < checkboxes.length; i++) {
        checkboxes[i].disabled = false;
    }
}
