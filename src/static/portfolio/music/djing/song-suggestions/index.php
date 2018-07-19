<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Eine einfache Möglichkeit, mir deine Musikwünsche zu übermitteln';
    $skeletonFeatures = ['pkg/jqv/js', 'pkg/jqv/de.js', 'lcl/ext/js'];
    $skeletonContent = '
    <section class="section scrollspy" id="form">
        <h2>
            Formular
        </h2>
        <p>
            Hier kannst du deinen Musikwunsch eingeben.
        </p>
        <div class="row">
            <form action="layout/extension/extension.php" class="col row s12" id="songform" method="post">
                <div class="col l2 m3 radio-input-field s12">
                    <fieldset>
                        <div>
                            <input checked class="with-gap" data-error="#album-group-error" id="single" name="album-group" required type="radio" value="single">
                            <label for="single">
                                Single
                            </label>
                        </div>
                        <div>
                            <input class="with-gap" data-error="#album-group-error" id="album" name="album-group" required type="radio" value="album">
                            <label for="album">
                                Album
                            </label>
                        </div>
                        <div class="form-error" id="album-group-error">
                        </div>
                    </fieldset>
                </div>
                <div class="col input-field l5 m5 s12">
                    <input data-error="#title-error" id="title" name="title" placeholder="Dancing Queen" type="text">
                    <label for="title">
                        Titel
                    </label>
                    <div class="form-error" id="title-error">
                    </div>
                </div>
                <div class="col input-field l5 m4 s12">
                    <input data-error="#artist-error" id="artist" name="artist" placeholder="Abba" type="text">
                    <label for="artist">
                        Künstler
                    </label>
                    <div class="form-error" id="artist-error">
                    </div>
                </div>
                <div class="col input-field s12">
                    <textarea class="materialize-textarea" data-error="#comment-error" data-length="200" id="comment" name="comment"></textarea>
                    <label for="comment">
                        Kommentar
                    </label>
                    <div class="form-error" id="comment-error">
                    </div>
                </div>
                <div class="col s12 right-align submit">
                    <button class="btn submit waves-effect waves-light" type="submit" name="action">
                        Senden
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
        <div id="result-modal" class="modal">
            <div class="modal-content">
                <h4 id="result-modal-heading">
                </h4>
                <p id="result-modal-content">
                </p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">
                    OK
                </a>
            </div>
        </div>
    </section>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);
