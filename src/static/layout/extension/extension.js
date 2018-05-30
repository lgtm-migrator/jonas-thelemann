var bodyElement = null;
var greetingButton = null;
var greetingImage = null;
var greeting = null;
var image = new Image();
var imageloaded = false;
var domcontentloaded = false;

window.addEventListener('keydown', preventScrolling, false);

function preventScrolling(e) {
    if ([32, 33, 34, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}

image.onload = function () {
    imageloaded = true;

    unlockImage();
}
image.src = '../../../layout/images/welcome.jpg';

document.addEventListener('DOMContentLoaded', function (event) {
    bodyElement = document.getElementsByTagName('body')[0];
    greetingButton = document.getElementById('greeting-button');
    greetingImage = document.getElementById('greeting-image');
    greeting = document.getElementById('greeting');
    domcontentloaded = true;

    $(this).scrollTop(0);

    bodyElement.classList.add('greeting-container');

    greetingButton.addEventListener('click', hideGreeting);
    window.addEventListener('keypress', function (e) {
        var key = e.which || e.keyCode;
        if (key === 13) {
            greetingButton.click();
        }
    });
    unlockImage();
});

function unlockImage() {
    if (imageloaded && domcontentloaded) {
        greetingImage.style.backgroundImage = 'url(' + image.src + ')';
        greetingImage.classList.remove('invisible');
    }
}

function hideGreeting() {
    greeting.style.transform = 'translatey(-100%)';

    setTimeout(function () {
        bodyElement.classList.remove('greeting-container');
        window.removeEventListener('keydown', preventScrolling, false);
    }, 1000);
}
