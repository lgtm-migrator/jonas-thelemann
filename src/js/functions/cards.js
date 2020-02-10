/////////////////////////////////////////////////
// cards.js
/////////////////////////////////////////////////

import { destroyPushPin, setUpPushPin } from './setup.js';

/**
 * Lets cards disappear.
 *
 * @param {*} cardToClose - The card to close.
 */
export function closeCard(cardToClose) {

    // Validate parameters
    if (!cardToClose) {
        return;
    }

    // Add event listener to slide up after fade-out
    cardToClose.addEventListener('transitionend', function (event) {
        if (event.propertyName == 'opacity') {

            // Fade up, remove the element and update the navigation pushpin
            $(cardToClose).slideUp(400, function () {
                cardToClose.remove();

                destroyPushPin('navigation');
                setUpPushPin('navigation');
            });
        }
    });

    // Set opacity to 0
    cardToClose.classList.add('invisible');

    // Get already closed cards from cookie
    var closedCards = Cookies.getJSON('closedCards');

    // Check if cookie already exists
    if (closedCards && 'cards' in closedCards) {

        // Get cookie's "cards" property
        closedCards = closedCards['cards'];

        // Add card id to cookie array if it wasn't added already
        if (!closedCards.includes(cardToClose.id)) {
            closedCards.push(cardToClose.id);
        }
    } else {

        // Initialize cookie array
        closedCards = [cardToClose.id];
    }

    // Write cookie with "cards" and "lastupdate" property, that expires in 150 days
    Cookies.set(
        'closedCards', {
            cards: closedCards,
            lastupdate: Math.round(new Date().getTime() / 1000)
        }, {
            expires: 150
        }
    );
}

/**
 * Initializes event listeners for card closing.
 *
 * @see {@link closeCard}
 */
export function setupCardClosers() {

    // Get all cards' close buttons
    var cardCloseButtons = document.getElementsByClassName('card-close');

    // Add event listeners to the buttons, that call their corresponding function
    for (var i = 0, ccbl = cardCloseButtons.length; i < ccbl; i++) {
        (function (i) {
            cardCloseButtons[i].addEventListener('click', function () {
                closeCard(cardCloseButtons[i].parentElement.parentElement.parentElement);
            });
        }(i));
    }
}
