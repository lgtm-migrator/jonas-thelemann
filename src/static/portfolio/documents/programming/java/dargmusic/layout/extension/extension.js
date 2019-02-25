document.addEventListener('DOMContentLoaded', function () {
    let url = new URL(window.location.href);
    let code = url.searchParams.get('code');

    if (code) {
        document.querySelector('#code').innerHTML = code;

        document.querySelector('#copy').addEventListener('click', function () { Dargmuesli.Prototyping.copy('#code') });
        document.querySelector('#hidden').classList.toggle('hidden');
    }
});
