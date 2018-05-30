$(document).ready(function() {
    $('.slider').slider({
        indicators: false,
        interval: 5000
    });
});

/*var counter = 0;

function weiter() {
    var frame = document.getElementById('ImageFrame');

    counter++;
    frame.src = $_SERVER['DOCUMENT_ROOT'] . '/layout/ajax-loader.gif';
    frame.parentNode.style.display = 'none';
    frame.parentNode.style.display = 'inline';

    if (counter == 1) {
        frame.src = 'layout/images/dia/bravo.jpg';
        frame.alt = 'Bild "Kirschblüten" von Jonas Thelemann nach einem Tutorial von Andrew Price.';
        document.getElementById('Title').innerHTML = 'Kirschblüten';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann nach einem Tutorial von Andrew Price.';
    } else if (counter == 2) {
        frame.src = 'layout/images/dia/charlie.jpg';
        frame.alt = 'Bild "Frühstück" von Jonas Thelemann nach einem Tutorial von Andrew Price.';
        document.getElementById('Title').innerHTML = 'Frühstück';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann nach einem Tutorial von Andrew Price.';
    } else if (counter == 3) {
        frame.src = 'layout/images/dia/delta.jpg';
        frame.alt = 'Bild "Blaupause" von Jonas Thelemann.';
        document.getElementById('Title').innerHTML = 'Blaupause';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 4) {
        frame.src = 'layout/images/dia/echo.jpg';
        frame.alt = 'Bild "Weihnachtsfest" von Jonas Thelemann.';
        document.getElementById('Title').innerHTML = 'Weihnachtsfest';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 5) {
        frame.src = 'layout/images/dia/foxtrot.jpg';
        frame.alt = 'Bild "Tears Of Steel"';
        document.getElementById('Title').innerHTML = 'Tears Of Steel';
        document.getElementById('Description').innerHTML = 'Von der Blender Foundation.';
    } else if (counter == 6) {
        frame.src = 'layout/images/dia/golf.jpg';
        frame.alt = 'Bild "Grenzen"';
        document.getElementById('Title').innerHTML = 'Grenzen';
        document.getElementById('Description').innerHTML = 'Von Spelle.';
    } else if (counter == 7) {
        frame.src = 'layout/images/dia/hotel.jpg';
        frame.alt = 'Bild "Auto"';
        document.getElementById('Title').innerHTML = 'Auto';
        document.getElementById('Description').innerHTML = 'Von Kingofspeed.';
    } else if (counter == 8) {
        frame.src = 'layout/images/dia/india.jpg';
        frame.alt = 'Bild "Wasserglas"';
        document.getElementById('Title').innerHTML = 'Wasserglas';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann nach einem Tutorial von Andrew Price.';
    } else if (counter == 9) {
        frame.src = 'layout/images/dia/juliett.jpg';
        frame.alt = 'Bild "Gitarre"';
        document.getElementById('Title').innerHTML = 'Gitarre';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 10) {
        frame.src = 'layout/images/dia/kilo.jpg';
        frame.alt = 'Bild "Haus"';
        document.getElementById('Title').innerHTML = 'Haus';
        document.getElementById('Description').innerHTML = 'Von Power.';
    } else if (counter == 11) {
        frame.src = 'layout/images/dia/lima.jpg';
        frame.alt = 'Bild "Nickname"';
        document.getElementById('Title').innerHTML = 'Nickname';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann nach einem Tutorial von Andrew Price.';
    } else if (counter == 12) {
        frame.src = 'layout/images/dia/mike.jpg';
        frame.alt = 'Bild "Waldflug"';
        document.getElementById('Title').innerHTML = 'Waldflug';
        document.getElementById('Description').innerHTML = 'Von Rob Tuytel und Jonas Thelemann.';
    } else if (counter == 13) {
        frame.src = 'layout/images/dia/november.jpg';
        frame.alt = 'Bild "Weltraum"';
        document.getElementById('Title').innerHTML = 'Weltraum';
        document.getElementById('Description').innerHTML = 'Von Trevor Perger.';
    } else if (counter == 14) {
        frame.src = 'layout/images/dia/oscar.jpg';
        frame.alt = 'Bild "Auto der Zukunft"';
        document.getElementById('Title').innerHTML = 'Auto der Zukunft';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 15) {
        frame.src = 'layout/images/dia/papa.jpg';
        frame.alt = 'Bild "Rennen"';
        document.getElementById('Title').innerHTML = 'Rennen';
        document.getElementById('Description').innerHTML = 'Von Pokestuff.';
    } else if (counter == 16) {
        frame.src = 'layout/images/dia/quebec.jpg';
        frame.alt = 'Bild "Rennauto"';
        document.getElementById('Title').innerHTML = 'Rennauto';
        document.getElementById('Description').innerHTML = 'Von RichardUpshur.';
    } else if (counter == 17) {
        frame.src = 'layout/images/dia/romeo.jpg';
        frame.alt = 'Bild "Funken"';
        document.getElementById('Title').innerHTML = 'Funken';
        document.getElementById('Description').innerHTML = 'Von Andrew Price.';
    } else if (counter == 18) {
        frame.src = 'layout/images/dia/sierra.jpg';
        frame.alt = 'Bild "Sumpfgebiet"';
        document.getElementById('Title').innerHTML = 'Sumpfgebiet';
        document.getElementById('Description').innerHTML = 'Von Focusgfx.';
    } else if (counter == 19) {
        frame.src = 'layout/images/dia/tango.jpg';
        frame.alt = 'Bild "Gefängiszelle"';
        document.getElementById('Title').innerHTML = 'Gefängiszelle';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 20) {
        frame.src = 'layout/images/dia/uniform.jpg';
        frame.alt = 'Bild "Mis3ria"';
        document.getElementById('Title').innerHTML = 'Mis3ria';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 21) {
        frame.src = 'layout/images/dia/victor.jpg';
        frame.alt = 'Bild "Minecraft"';
        document.getElementById('Title').innerHTML = 'Minecraft';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 22) {
        frame.src = 'layout/images/dia/alpha.jpg';
        frame.alt = 'Bild "Caminandes"';
        document.getElementById('Title').innerHTML = 'Caminandes';
        document.getElementById('Description').innerHTML = 'Von Pablo Vazquez, Beorn Leonard and Francesco Siddi.';
        counter = 0;
    }
}

function zurueck() {
    var frame = document.getElementById('ImageFrame');

    counter--;
    frame.src = 'layout/ajax-loader.gif';

    if (counter == -1) {
        frame.src = 'layout/images/dia/victor.jpg';
        frame.alt = 'Bild "Minecraft"';
        document.getElementById('Title').innerHTML = 'Minecraft';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
        counter = 21;
    } else if (counter == 0) {
        frame.src = 'layout/images/dia/alpha.jpg';
        frame.alt = 'Bild "Caminandes"';
        document.getElementById('Title').innerHTML = 'Caminandes';
        document.getElementById('Description').innerHTML = 'Von Pablo Vazquez, Beorn Leonard and Francesco Siddi.';
    } else if (counter == 1) {
        frame.src = 'layout/images/dia/bravo.jpg';
        frame.alt = 'Bild "Kirschbl&uumll;ten"';
        document.getElementById('Title').innerHTML = 'Kirschbl&uumll;ten';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann nach einem Tutorial von Andrew Price.';
    } else if (counter == 2) {
        frame.src = 'layout/images/dia/charlie.jpg';
        frame.alt = 'Bild "Fr&uumll;hst&uumll;ck"';
        document.getElementById('Title').innerHTML = 'Fr&uumll;hst&uumll;ck';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann nach einem Tutorial von Andrew Price.';
    } else if (counter == 3) {
        frame.src = 'layout/images/dia/delta.jpg';
        frame.alt = 'Bild "Blaupause"';
        document.getElementById('Title').innerHTML = 'Blaupause';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 4) {
        frame.src = 'layout/images/dia/echo.jpg';
        frame.alt = 'Bild "Weihnachtsfest"';
        document.getElementById('Title').innerHTML = 'Weihnachtsfest';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 5) {
        frame.src = 'layout/images/dia/foxtrot.jpg';
        frame.alt = 'Bild "Tears Of Steel"';
        document.getElementById('Title').innerHTML = 'Tears Of Steel';
        document.getElementById('Description').innerHTML = 'Von der Blender Foundation.';
    } else if (counter == 6) {
        frame.src = 'layout/images/dia/golf.jpg';
        frame.alt = 'Bild "Grenzen"';
        document.getElementById('Title').innerHTML = 'Grenzen';
        document.getElementById('Description').innerHTML = 'Von Spelle.';
    } else if (counter == 7) {
        frame.src = 'layout/images/dia/hotel.jpg';
        frame.alt = 'Bild "Auto"';
        document.getElementById('Title').innerHTML = 'Auto';
        document.getElementById('Description').innerHTML = 'Von Kingofspeed.';
    } else if (counter == 8) {
        frame.src = 'layout/images/dia/india.jpg';
        frame.alt = 'Bild "Wasserglas"';
        document.getElementById('Title').innerHTML = 'Wasserglas';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann nach einem Tutorial von Andrew Price.';
    } else if (counter == 9) {
        frame.src = 'layout/images/dia/juliett.jpg';
        frame.alt = 'Bild "Gitarre"';
        document.getElementById('Title').innerHTML = 'Gitarre';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 10) {
        frame.src = 'layout/images/dia/kilo.jpg';
        frame.alt = 'Bild "Haus"';
        document.getElementById('Title').innerHTML = 'Haus';
        document.getElementById('Description').innerHTML = 'Von Power.';
    } else if (counter == 11) {
        frame.src = 'layout/images/dia/lima.jpg';
        frame.alt = 'Bild "Nickname"';
        document.getElementById('Title').innerHTML = 'Nickname';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann nach einem Tutorial von Andrew Price.';
    } else if (counter == 12) {
        frame.src = 'layout/images/dia/mike.jpg';
        frame.alt = 'Bild "Waldflug"';
        document.getElementById('Title').innerHTML = 'Waldflug';
        document.getElementById('Description').innerHTML = 'Von Rob Tuytel und Jonas Thelemann.';
    } else if (counter == 13) {
        frame.src = 'layout/images/dia/november.jpg';
        frame.alt = 'Bild "Weltraum"';
        document.getElementById('Title').innerHTML = 'Weltraum';
        document.getElementById('Description').innerHTML = 'Von Trevor Perger.';
    } else if (counter == 14) {
        frame.src = 'layout/images/dia/oscar.jpg';
        frame.alt = 'Bild "Auto der Zukunft"';
        document.getElementById('Title').innerHTML = 'Auto der Zukunft';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 15) {
        frame.src = 'layout/images/dia/papa.jpg';
        frame.alt = 'Bild "Rennen"';
        document.getElementById('Title').innerHTML = 'Rennen';
        document.getElementById('Description').innerHTML = 'Von Pokestuff.';
    } else if (counter == 16) {
        frame.src = 'layout/images/dia/quebec.jpg';
        frame.alt = 'Bild "Rennauto"';
        document.getElementById('Title').innerHTML = 'Rennauto';
        document.getElementById('Description').innerHTML = 'Von RichardUpshur.';
    } else if (counter == 17) {
        frame.src = 'layout/images/dia/romeo.jpg';
        frame.alt = 'Bild "Funken"';
        document.getElementById('Title').innerHTML = 'Funken';
        document.getElementById('Description').innerHTML = 'Von Andrew Price.';
    } else if (counter == 18) {
        frame.src = 'layout/images/dia/sierra.jpg';
        frame.alt = 'Bild "Sumpfgebiet"';
        document.getElementById('Title').innerHTML = 'Sumpfgebiet';
        document.getElementById('Description').innerHTML = 'Von Focusgfx.';
    } else if (counter == 19) {
        frame.src = 'layout/images/dia/tango.jpg';
        frame.alt = 'Bild "Gefängiszelle"';
        document.getElementById('Title').innerHTML = 'Gefängiszelle';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    } else if (counter == 20) {
        frame.src = 'layout/images/dia/uniform.jpg';
        frame.alt = 'Bild "Mis3ria"';
        document.getElementById('Title').innerHTML = 'Mis3ria';
        document.getElementById('Description').innerHTML = 'Von Jonas Thelemann.';
    }
}*/
