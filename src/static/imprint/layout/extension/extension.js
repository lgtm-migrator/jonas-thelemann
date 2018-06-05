function contactformCallback(response) {
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'layout/extension/extension.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if ((xhr.readyState == 4) && (xhr.status == 200)) {
            document.getElementById('address').innerHTML = xhr.responseText;
        }
    };
    xhr.send('g-recaptcha-response=' + response);
}
