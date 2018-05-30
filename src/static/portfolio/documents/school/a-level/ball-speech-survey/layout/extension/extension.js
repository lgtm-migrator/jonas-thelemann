var speakerspot;

function outsideZone(speakerspot) {
    console.log('outside');
    speakerspot.style.width = '30vw';
    speakerspot.style.height = '30vw';
    speakerspot.style.maxHeight = '50vh';
}

function insideZone(speakerspot) {
    console.log('inside');
    speakerspot.style.width = '30%';
    speakerspot.style.height = 'auto';
    speakerspot.style.maxHeight = 'initial';
}

function figureClicked(me) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var answerElements = xhttp.responseText.split(';');
            if (answerElements[0] == 'ok') {
                document.getElementById('successpopup').classList.remove('hidden');
                document.getElementById('warningclick').innerHTML = 'Klicke auf die von dir an- oder abgewählte Person, um deine Wahl zu bestätigen.';
                document.getElementById('warningpopup').classList.add('hidden');

                if (answerElements[1] == 'candidateelisabeth') {
                    document.getElementById('lastchoice').innerHTML = 'Elisabeth';
                } else if (answerElements[1] == 'candidatejonas') {
                    document.getElementById('lastchoice').innerHTML = 'Jonas';
                    alert('Danke für deine Stimme!\nAber überleg\' dir doch nochmal, ob du wirklich denkst, ich könnte Reden so gut schreiben wie Websiten...');
                } else if (answerElements[1] == 'candidaterosa') {
                    document.getElementById('lastchoice').innerHTML = 'Rosa';
                } else if (answerElements[1] == 'nobody') {
                    document.getElementById('lastchoice').innerHTML = 'Niemanden';
                }
            } else if (answerElements[0] == 'closed') {
                document.getElementById('warningclick').innerHTML = 'Die Umfrage ist beendet. Es werden keine weiteren Stimmen akzeptiert.';
            }
        }
    };
    xhttp.open('post', 'layout/extension/extension.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    if (me.parentNode.id == 'speakerspot') {
        document.getElementById('warningclick').innerHTML = 'Bitte warten...';
        xhttp.send('chosen=' + speakerspot.getElementsByTagName('figure')[0].id);
    } else if (!isSpeakerFilled()) {
        document.getElementById('warningclick').innerHTML = 'Bitte warten...';
        xhttp.send('chosen=nobody');
    }
}

document.addEventListener('DOMContentLoaded', function(event) {
    speakerspot = document.getElementById('speakerspot');
    var figures = document.getElementsByTagName('figure');

    for (i = 0; i < figures.length; i++) {
        figures[i].addEventListener('click', function(event) {
            figureClicked(this);
        });
    }

    if (isSpeakerFilled()) {
        insideZone(speakerspot);
    }

    dragula([
            document.querySelector('#speakerspot'),
            document.querySelector('#candidates')
        ], {
            accepts: function(el, target, source, sibling) {
                if (target.id == 'speakerspot' && !isSpeakerFilled()) { //target.hasChildNodes()
                    return true;
                } else if (target.id == 'candidates') {
                    return true;
                } else {
                    return false;
                }
            },
            direction: 'horizontal',
        })
        .on('out', function(el, container, source) {
            console.log('out! container: ' + container.id + ', source: ' + source.id);
            if (source.id == 'speakerspot') {
                if (container.id == 'speakerspot' && !isSpeakerFilled()) {
                    //outsideZone(speakerspot);
                    //el.style.flex = 'initial';
                } else if (container.id == 'candidates' && isSpeakerFilled()) {
                    insideZone(speakerspot);
                }
            } else if (source.id == 'candidates') {
                if (container.id == 'speakerspot') {
                    insideZone(speakerspot);
                } else if (container.id == 'candidates' && !isSpeakerFilled()) {
                    outsideZone(speakerspot);
                }
            }
        })
        .on('over', function(el, container, source) {
            console.log('over! container: ' + container.id + ', source: ' + source.id);
            if (container.id == 'speakerspot') {
                insideZone(speakerspot);
            } else if (container.id == 'candidates' && (!isSpeakerFilled() || source.id == 'speakerspot')) {
                outsideZone(speakerspot);
            }
        })
        .on('drop', function(el, target, source, sibling) {
            console.log('drop! target: ' + target.id + ', source: ' + source.id);
            if (target.id == 'speakerspot') {
                document.getElementById('warningpopup').classList.remove('hidden');
            } else if (source.id == 'speakerspot' && target.id == 'candidates') {
                document.getElementById('warningpopup').classList.remove('hidden');
            }
        });;
    /*.on('cancel', function (el, container, source) {
        if (source.id == 'speakerspot' && source.hasChildNodes()) {
            source.style.width = '30%';
            source.style.height = 'auto';
        }
    });*/
});

function isSpeakerFilled() {
    if (speakerspot.getElementsByTagName('figure').length > 0) {
        return true;
    } else {
        return false;
    }
}

/*function allowDrop(ev) {
    ev.preventDefault();
}

function dragstart(ev) {
    ev.dataTransfer.setData('text', ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data0 = ev.dataTransfer;
    var data1 = ev.dataTransfer.getData('text');
    var data2 = document.getElementById(ev.dataTransfer.getData('text'));
    ev.target.appendChild(data2);
}

function move(ev) {
    var touch = event.targetTouches[0];

    draggable.style.left = touch.pageX-25 + 'px';
    draggable.style.top = touch.pageY-25 + 'px';
    event.preventDefault();
}*/

/*document.addEventListener('DOMContentLoaded', function(event) {
    document.getElementById('speakerspot').addEventListener('drop', function(event){drop(event);});
    document.getElementById('speakerspot').addEventListener('dragover', function(event){allowDrop(event);});
    document.getElementById('candidateelisabeth').addEventListener('dragstart', function(event){dragstart(event);});*/
/*document.getElementById('candidateelisabeth').addEventListener('touchmove', function(event){dragstart(event);});*/
/*document.getElementById('candidatejonas').addEventListener('dragstart', function(event){dragstart(event);});
    document.getElementById('candidaterosa').addEventListener('dragstart', function(event){dragstart(event);});
});*/

/*interact('.draggable').draggable({
    // enable inertial throwing
    inertia: true,
    // keep the element within the area of it's parent
    restrict: {
        restriction: "parent",
        endOnly: true,
        elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
    },
    // enable autoScroll
    autoScroll: true,

    // call this function on every dragmove event
    onmove: dragMoveListener,
    // call this function on every dragend event
    onend: function (event) {
        var textEl = event.target.querySelector('p');

        textEl && (textEl.textContent =    'moved a distance of ' + (Math.sqrt(event.dx * event.dx + event.dy * event.dy)|0) + 'px');
    }
});

function dragMoveListener (event) {
    var target = event.target,
    // keep the dragged position in the data-x/data-y attributes
    x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
    y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)';

    // update the posiion attributes
    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
}

window.dragMoveListener = dragMoveListener;

interact('.dropzone').dropzone({
    overlap: 0.5,
    checker: function (dragEvent, event, dropped, dropzone, dropElement, draggable, draggableElement) {
        return dropped;
    },
    // listen for drop related events:
    ondropactivate: function (event) {
        // add active dropzone feedback
        event.target.classList.add('drop-active');
    },
    ondragenter: function (event) {
        //var draggableElement = event.relatedTarget,
        //dropzoneElement = event.target;

        var dropRect = interact.getElementRect(event.target)
        var dropCenter = {
            x: dropRect.left + dropRect.width  / 2,
            y: dropRect.top  + dropRect.height / 2
        };

        event.draggable.snap({
              anchors: [ dropCenter ]
        });

        // feedback the possibility of a drop
        dropzoneElement.classList.add('drop-target');
        draggableElement.classList.add('can-drop');
        //draggableElement.textContent = 'Dragged in';
    },
    ondragleave: function (event) {
        // remove the drop feedback style
        event.target.classList.remove('drop-target');
        event.relatedTarget.classList.remove('can-drop');
        //event.relatedTarget.textContent = 'Dragged out';
    },
    ondrop: function (event) {
        //event.relatedTarget.textContent = 'Dropped';
    },
    ondropdeactivate: function (event) {
        // remove active dropzone feedback
        event.target.classList.remove('drop-active');
        event.target.classList.remove('drop-target');
    }
});*/
