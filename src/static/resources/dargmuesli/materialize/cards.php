<?php
    function getCardHtml($id, $title, $content)
    {
        $cardHtml = null;

        if (isCardOpen($id)) {
            $cardHtml = '
            <div class="card light-blue grey-text text-lighten-4" id="'.$id.'">
                <div class="card-content">
                    <span class="card-title">
                        '.$title.'
                    </span>
                    <button class="card-close">
                        <i class="material-icons">
                            close
                        </i>
                    </button>
                    <p>
                        '.$content.'
                    </p>
                </div>
            </div>';
        }

        return $cardHtml;
    }

    function isCardOpen($cardId)
    {
        if (isset($_COOKIE['closedCards'])) {
            $closedCards = json_decode($_COOKIE['closedCards'], true);

            if (isset($closedCards['cards']) && in_array($cardId, $closedCards['cards'])) {
                return false;
            } else {
                return true;
            }
        } else {
            setcookie('closedCards', json_encode(['cards' => [], 'lastupdate' => date('U')]), time() + (60 * 60 * 24 * 150), '/'); //'D, d M Y H:i:s T'

            return true;
        }
    }
