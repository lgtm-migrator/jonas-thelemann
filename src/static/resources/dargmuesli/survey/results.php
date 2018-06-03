<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/text/markuplanguage.php';

    function getSurveyResultCard($result)
    {
        $cardData = null;

        switch ($result) {
            case 'closed':
                $cardData = [
                    'warning',
                    'Ge&shy;schlos&shy;sen!',
                    'Diese Umfrage ist leider schon beendet.'
                ];
                break;
            case 'failure':
                $cardData = [
                    'error',
                    'Feh&shy;ler!',
                    'Es kam zu einem internen Fehler.'
                ];
                break;
            case 'invalid':
                $cardData = [
                    'error',
                    'Ein&shy;ga&shy;be&shy;pro&shy;blem!',
                    'Die abgeschickten Daten waren ungültig.'
                ];
                break;
            case 'success':
                $cardData = [
                    'success',
                    'Vie&shy;len Dank!',
                    'Deine Antwort wurde erfasst.'
                ];
                break;
            default:
                return;
        }

        return getIndentedML('
            <div class="row">
                <div class="col s12">
                    <div class="card '.$cardData[0].'">
                        <div class="card-content">
                            <span class="card-title">
                                '.$cardData[1].'
                            </span>
                            <p>
                                '.$cardData[2].'
                            <p>
                        </div>
                    </div>
                </div>
            </div>');
    }

    function getSurveyResultForm($result, $action = '../../index.php')
    {
        return getIndentedML('
            <html>
                <body>
                    <form action="'.$action.'" id="resultform" method="post">
                        <input name="result" type="hidden" value="'.$result.'">
                    </form>
                    <script src="'.$_SERVER['SERVER_ROOT_URL'].'/resources/dargmuesli/survey/submit.js'.'"></script>
                </body>
            </html>');
    }
