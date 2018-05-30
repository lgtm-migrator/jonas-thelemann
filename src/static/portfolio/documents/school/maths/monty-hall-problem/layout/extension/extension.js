var doorOne = null;
var doorTwo = null;
var doorThree = null;
var carDoor = null;
var chosenDoor = null;
var modDoor = null;
var change = null;
var instructionTextElement = null;
var stage = 0;
var clickable = true;

document.addEventListener('DOMContentLoaded', function() {
    doorOne = document.getElementById('doorOne');
    doorTwo = document.getElementById('doorTwo');
    doorThree = document.getElementById('doorThree');
    instructionTextElement = document.getElementById('instructions');

    doorOne.addEventListener('click', function() {
        chooseDoor('doorOne');
    });
    doorTwo.addEventListener('click', function() {
        chooseDoor('doorTwo');
    });
    doorThree.addEventListener('click', function() {
        chooseDoor('doorThree');
    });
});

function chooseDoor(choice) {
    var chosenDoor = document.getElementById(choice);

    if (chosenDoor.classList.contains('clickable')) {
        toggleClickable(false);

        stage++;

        if (stage == 1) {
            carDoor = document.getElementById(getDoorId(Math.floor((Math.random() * 3) + 1)));

            //Set door colors
            chosenDoor.classList.remove('initial');
            chosenDoor.classList.add('chosen');

            //Get non-chosen door with a goat behind it for moderator
            var oneOrTwo = Math.floor((Math.random() * 2) + 1);
            var modChoice = null;

            if (choice == 'doorOne') {
                if (carDoor.id == 'doorTwo') {
                    modChoice = 'doorThree';
                } else if (carDoor.id == 'doorThree') {
                    modChoice = 'doorTwo';
                } else {
                    if (oneOrTwo == 1) {
                        modChoice = 'doorTwo';
                    } else {
                        modChoice = 'doorThree';
                    }
                }
            } else if (choice == 'doorTwo') {
                if (carDoor.id == 'doorOne') {
                    modChoice = 'doorThree';
                } else if (carDoor.id == 'doorThree') {
                    modChoice = 'doorOne';
                } else {
                    if (oneOrTwo == 1) {
                        modChoice = 'doorOne';
                    } else {
                        modChoice = 'doorThree';
                    }
                }
            } else if (choice == 'doorThree') {
                if (carDoor.id == 'doorOne') {
                    modChoice = 'doorTwo';
                } else if (carDoor.id == 'doorTwo') {
                    modChoice = 'doorOne';
                } else {
                    if (oneOrTwo == 1) {
                        modChoice = 'doorOne';
                    } else {
                        modChoice = 'doorTwo';
                    }
                }
            }

            //Update instructions
            instructionTextElement.innerHTML = 'Der Moderator wählt eine der verbleibenden Türen.<br>Er wählt immer eine Tür, hinter der eine Ziege steht.';

            modDoor = document.getElementById(modChoice);
            //var noChooseDoor = document.getElementById(String(6 - (parseInt(choice) + modChoice)));

            setTimeout(function() {
                modDoor.classList.remove('initial');
                modDoor.classList.add('goat');
                instructionTextElement.innerHTML = 'Bleibst du bei deiner Wahl oder möchtest du die andere Tür wählen?<br>Wähle eine der beiden verschlossenen Türen.';

                toggleClickable(true);
            }, 3000);
        } else if (stage == 2) {
            if (chosenDoor.classList.contains('chosen')) {
                change = false;
                chosenDoor.classList.remove('chosen');
            } else {
                change = true;
                chosenDoor.classList.remove('initial');
            }

            //Decide whether the player won or not
            if (choice == carDoor.id) {
                chosenDoor.classList.add('car');
                instructionTextElement.innerHTML = 'Gewonnen!';
            } else {
                chosenDoor.classList.add('goat');
                instructionTextElement.innerHTML = 'Verloren!';
            }

            setTimeout(function() {
                //Send input data to PostgreSQL database
                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == 'success') {
                            doorOne.classList.remove('car');
                            doorOne.classList.remove('goat');
                            doorOne.classList.add('initial');
                            doorTwo.classList.remove('car');
                            doorTwo.classList.remove('goat');
                            doorTwo.classList.add('initial');
                            doorThree.classList.remove('car');
                            doorThree.classList.remove('goat');
                            doorThree.classList.add('initial');

                            stage = 0;

                            instructionTextElement.innerHTML = 'Hinter zwei Türen befinden sich Ziegen, nur hinter einer ein Auto.<br>Wähle die Tür, hinter der du das Auto vermutest! ';

                            toggleClickable(true);
                        }
                    }
                };
                xhttp.open('POST', 'layout/extension/save.php', true);
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhttp.send('chosenDoor=' + getDoorNumber(chosenDoor.id) + '&modDoor=' + getDoorNumber(modDoor.id) + '&carDoor=' + getDoorNumber(carDoor.id) + '&change=' + change);
            }, 2000);
        }
    }
}

function getDoorId(number) {
    doorId = '';

    if (number == 1) {
        doorId = 'doorOne';
    } else if (number == 2) {
        doorId = 'doorTwo';
    } else if (number == 3) {
        doorId = 'doorThree';
    }

    return doorId;
}

function getDoorNumber(id) {
    doorNumber = '';

    if (id == 'doorOne') {
        doorNumber = 1;
    } else if (id == 'doorTwo') {
        doorNumber = 2;
    } else if (id == 'doorThree') {
        doorNumber = 3;
    }

    return doorNumber;
}

function toggleClickable(state) {
    if (state) {
        if (!doorOne.classList.contains('goat')) {
            doorOne.classList.add('clickable');
        }

        if (!doorTwo.classList.contains('goat')) {
            doorTwo.classList.add('clickable');
        }

        if (!doorThree.classList.contains('goat')) {
            doorThree.classList.add('clickable');
        }
    } else {
        doorOne.classList.remove('clickable');
        doorTwo.classList.remove('clickable');
        doorThree.classList.remove('clickable');
    }
}
