<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    lastModified(getPageModTime());

    $skeletonDescription = 'Oft gestellte Fragen zum Umgang mit Github und Eclipse';
    $skeletonFeatures = ['lcl/ext/css', 'lcl/ext/js'];
    $skeletonContent = '
    <section id="configuration" class="section scrollspy">
        <h2>
            How to con&shy;fi&shy;gure e&shy;clipse?
        </h2>
        <ol>
            <li>
                Open EGit: Window -> Open Perspective -> Other -> Git.
            </li>
            <li>
                Import project:
                <ol>
                    <li>
                        Click File.
                    </li>
                    <li>
                        Click Import.
                    </li>
                    <li>
                        Click Git.
                    </li>
                    <li>
                        Click Projects from Git.
                    </li>
                    <li>
                        Click Next.
                    </li>
                    <li>
                        Select "Clone URI".
                    </li>
                    <li>
                        Click Next.
                    </li>
                    <li>
                        Enter the adress from the repository code page. ("HTTPS clone URL")
                    </li>
                    <li>
                        Click Next.
                    </li>
                    <li>
                        Select the branches you want to pull. (You can also pull them later)
                    </li>
                    <li>
                        Click Next.
                    </li>
                    <li>
                        Choose a directory to save the local repository.
                    </li>
                    <li>
                        Click Next.
                    </li>
                    <li>
                        Choose "Import existing projects".
                    </li>
                    <li>
                        Click Next.
                    </li>
                    <li>
                        Click Finish.
                    </li>
                </ol>
            </li>
            <li>
                Perspective Settings:
                <ol>
                    <li>
                        Open Java Perspective.
                    </li>
                    <li>
                        Open Package Explorer.
                    </li>
                    <li>
                        Click "Open Menu". (Arrow to the bottom)
                    </li>
                    <li>
                        Select Package Presentation -> Hierarchical.
                    </li>
                    <li>
                        You now see the package structure as at file explorer.
                    </li>
                </ol>
            </li>
            <li>
                Git Settings:
                <ol>
                    <li>
                        Click Menu Window.
                    </li>
                    <li>
                        Click Preferences.
                    </li>
                    <li>
                        Click Team.
                    </li>
                    <li>
                        Click Git.
                    </li>
                    <li>
                        Click Configuration.
                    </li>
                    <li>
                        If key "user" is available store your username and your GitHub mail address here.
                        If not add keys "user.name" and "user.email".
                    </li>
                </ol>
            </li>
        </ol>
        In the preferences menu, you can set many different settings.
        These are documented in the eclipse help (Help -> Help Contents).
    </section>
    <section id="githubtools" class="section scrollspy">
        <h2>
            How to work with Git&shy;Hub Tools?
        </h2>
        <ol>
            <li>
                The usage of all tools is described in our <a href="https://github.com/FG-Team/HCJ-Website-Builder/wiki/Project-Workflow">project workflow wiki page</a>.
            </li>
            <li>
                In addition to that, you can use issues to discuss the project and ask general questions.
            </li>
        </ol>
    </section>
    <section id="createpullrequest" class="section scrollspy">
        <h2>
            How to cre&shy;ate a Pull Re&shy;quest?
        </h2>
        Only possible via the GitHub interface.
        <ol class=AnswerList>
            <li>
                Open GitHub-Repository.
            </li>
            <li>
                Open Tab "&lt;&gt; Code".
            </li>
            <li>
                Click "(X) branches". (Status line at the top, second field)
            </li>
            <li>
                Within the concerning branch click "New Pull Request".
            </li>
        </ol>
    </section>
    <section id="updatelocalrepository" class="section scrollspy">
        <h2>
            How to up&shy;date my lo&shy;cal re&shy;po&shy;si&shy;to&shy;ry?
        </h2>
        <ol>
            <li>
                Open EGit-Perspective.
            </li>
            <li>
                Open Repositories View.
            </li>
            <li>
                Right-click on repository name.
                <ol>
                    <li>
                        Option Fetch from Upstream: Only update the <i>remote branches</i> (the representation of the server branches).
                    </li>
                    <li>
                        Option Pull: Also update the <i>local branches</i> (the branches where you commit your changes).
                        The two different versions might have to merge.
                    </li>
                </ol>
            </li>
        </ol>
    </section>
    <section id="checkoutbranch" class="section scrollspy">
        <h2>
            How to ckeck&shy;out a branch?
        </h2>
        <ol>
            <li>
                Open EGit-Perspective.
            </li>
            <li>
                Open Repositories View.
            </li>
            <li>
                Right-click on the branch to checkout.
            </li>
            <li>
                Click on "Checkout" or "Checkout as New Local Branch" if you checkout a remote branch.
            </li>
        </ol>
    </section>
    <section id="writecode" class="section scrollspy">
        <h2>
            How to write code?
        </h2>
        <ol>
            <li>
                Open Package View.
            </li>
            <li>
                Open a file by clicking on it.
            </li>
            <li>
                Edit and save the file.
            </li>
            <li>
                Observe the <a href="https://github.com/FG-Team/HCJ-Website-Builder/wiki/Code-Conventions" title="Die Code Conventions des FG-Teams auf Github">Code Conventions</a>.
            </li>
        </ol>
    </section>
    <section id="sendchanges" class="section scrollspy">
        <h2>
            How to send my chan&shy;ges to Git&shy;Hub?
        </h2>
        <ol>
            <li>
                Open Egit-Perspective.
            </li>
            <li>
                Open view "Git Staging".
            </li>
            <li>
                Drop all files you want to commit from "Unstaged Changes" to "Staged Changes".
            </li>
            <li>
                Write a description of your changes and click to "Commit".
                <br>
                <i>The changes are now in your local repository.</i>
            </li>
            <li>
                In Repositories View, right-click on repository name.
            </li>
            <li>
                Click "Push to upstream".
            </li>
        </ol>
    </section>
    <section id="reviewchanges" class="section scrollspy">
        <h2>
            How to re&shy;view chan&shy;ges?
        </h2>
        See <a href="https://github.com/FG-Team/HCJ-Website-Builder/wiki/Review-Workflow">our review workflow wiki page</a> for details.
    </section>
    <section id="chatexample" class="section scrollspy">
        <h2>
            E&shy;xem&shy;pla&shy;ry chat his&shy;to&shy;ry
        </h2>
        <p>
            From 16th October 2014 between Lukas Mentel and Jonas Thelemann.
        </p>
        <div>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Ich verstehe nicht ganz wie man Eclipse auf Github einstellt.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Wenn ich mich nicht irre, ist eGit (was man doch braucht) schon dabei oder?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Genau.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Ich kenne mich mit Eclipse noch nicht so aus, ich habe bisher nur ein "Hello World"-Projekt erstellt.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Du öffnest es über Window -> Open Perspective -> Other -> Git.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Es gibt zusätzlich noch ein Plugin für Github.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Okay, also noch eins? :D<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Dieses kann zum Beispiel auch Issues in Eclipse importieren.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Wie heißt das?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Moment...<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Obwohl ich das dann doch erstmal lieber im Browser mache.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Hauptsache ich kann da jetzt mal noch was übersetzen :D<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Kennst du Dich schon mit git aus?<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Im Webbrowser auf Github kann man sich keine Nachrichten direkt schicken, oder?<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Nicht wirklich ;)<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Die Pull-/Push-/Commit-Befehle erreichst du über das Rechtsklick-Kontextmenü.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ich glaube, Nachrichten kann man sich nur indirekt schicken (wie wir das eben getan haben).<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Okay^^<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ich arbeite übrigens gerade am Inhaltsverzeichnis (ContentBar).<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Gut :)<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Unser Repository habe ich glaube ich schon reinbekommen in Eclipse.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Kann ich das irgendwie updaten?<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Dass die lokalen Dateien aktualisiert werden.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Über fetch vielleicht?<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Ich glaube, das hab ich hinbekommen.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Genau!<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>:D<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>fetch aktualisiert nur deine lokalen Branches, pull hingegen auch die working copy.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Jetzt habe ich die Dateien in der working directory. Wie kann ich meine Bearbeitungen push-requesten?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Den pull request musst du auf Github erstellen.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Den Branch bekommst du mit Rechtsklick -> Push to upstream zu GitHub.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Beim Erstellen des pull requests wählst du dann den betreffenden Branch aus.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Aber nicht, dass der dann gleich hinzugefügt wird. Der soll ja noch reviewt werden, oder wie geht das?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Über push aktualisierst du nur den betreffenden branch bei Github, nicht den master-branch.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>branch master -> Push to upstream -> bei Github wird eine identische Kopie deines lokalen Branches angelegt.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Das Hinzufügen ginge über die Option merge, dann würdest du es ohne pull request direkt in den master schieben.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Deshalb die Option merge nicht benutzen!<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Okay.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Soll ich jetzt eigentlich einen neuen Branch erstellen? Ich will ja nur andere bearbeiten oder verstehe ich das mit den Branches falsch?<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Ist ein branch nicht eine Kopie des masters?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Doch, erstelle einen neuen Branch.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ein branch ist am Anfang eine Kopie des masters, solange, bis irgendetwas geändert wird.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Also muss ich unter HCJ-Website-Builder->Branches->Local mit Rechtsklick einen neuen Branch erstellen?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Genau. master -> Create branch<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>also master dc415c1 Merge Pul... usw?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Damit würdest du einen branch wieder in den master überführen.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Nimm stattdessen "Create branch"<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Wenn du den branch erstellt hast, pushe ihn erstmal.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Also auf "local" rechtsklick -> switch to new branch oder wo?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Nein, du musst auf den lokalen branch klicken, aus dem du einen anderen branch erstellen willst.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Also Rechtsklick auf Local/master -> Create branch.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Finde ich nicht :D<br>
            <div class="center-align"><em>*** Jonas hat einen Screenshot gesendet ***</em></div><br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Da steht master und irgendwas anderes, ist das egal?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Klicke auf den branch master im Ordner "Local", der bei dir markiert ist, mit der rechten Maustaste.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ich mache einen Screenshot...<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Okay das meinte ich, nur war ich unsicher, weil da eben nicht master sondern master xyz steht.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Oh, dann habe ich dich falsch verstanden...<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>:D<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Du brauchst also keinen Screenshot mehr?<br>
            <div class="center-align"><em>*** Jonas hat einen Screenshot gesendet ***</em></div><br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Wenn du noch einen haben willst^^ :D<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Welche checkboxen soll ich denn aktivieren?<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>configure upstream for p&p und checkout new branch. Was bewirken die denn?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Der upstream ist der "Kanal" über den die Informationen zu GitHub übertragen werden.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Die Checkbox bedeutet also:<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Gebe diesem branch die Möglichkeit, dass man ihn mit seinem branch bei GitHub verbinden kann.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ich lasse diese Checkbox immer deaktiviert und konfiguriere den upstream, wenn ich das erste Mal pushe.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Dann wirst du dazu aufgefordert.#<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Okay, gut :)<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Aber checkouten kann ich ruhig oder mache ich da auch was kaputt? :D<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Nein. Solange du in deiner working copy keine Dateien geändert hast, machst du nichts kaputt.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ansonsten ersetzt du deine Änderungen mit dem Inhalt des branches, den du auscheckst.<br>
            <div class="center-align"><em>*** Jonas hat einen Screenshot gesendet ***</em></div><br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>So lassen?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ja.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Und jetzt direkt den branch einmal pushen.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Hab.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Sehr gut, hat funktioniert!<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>*freu*<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Jetzt stell sicher, dass du ihn ausgecheckt hast, und fang an.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ich kopiere mir mal die komplette Unterhaltung und bastle daraus ein FAQ.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Wenn du nichts dagegen hast...<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Rechtsklick auf den neuen Eintrag in remote tracking und dann checkout as new local branch?<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Okay.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ja.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ich erstelle branches immer über den lokalen master, dann muss ich es nur noch pushen.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Aber der existed schon ... irgendwie logisch :D<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ok.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Dann bist du ja startklar :)<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Fängst du heute noch an?<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Ja.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Wie bearbeite ich den denn jetzt? :D<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Einfach die working directory bearbeiten und dann pushen?<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Du musst die Java-Perspektive öffnen.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Dann Menü File -> Import -> Git -> Projects from Git.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Dann Existing local repository.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Dort sollte der HCJ-Editor angezeigt werden. Den wählst du aus.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Dann wählst du "Import existing Projects".<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>... und klickst Next.<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Dann selektierst du erneut den HCJ-Editor und klickst auf "Finish".<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Und jetzt rate mal, wie lange ich gebraucht habe, um das rauszufinden, als ich es das erste Mal versucht habe :)<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Okay, hab ich. Sieht gut aus :) Hab mein "Hello World"-Projekt jetzt gelöscht. Sollte aber nur aus dem workspace gelöscht worden sein und sich noch auf der Festplatte befinden oder?<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Jaaaaaaa.... 2 Tage? :D<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Eigentlich schon.<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>;)<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Ich bin mir da aber nicht sicher...<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Arbeite seit Monaten nur noch mit Repositories :)<br>
            <div class="chip"><img src="/layout/images/logo.png" alt="Logo">Jonas</div>Merkt man an deinen Kenntnissen :D<br>
            <div class="chip"><img src="../layout/images/grhcj.png" alt="GRHCJ">Lukas</div>Danke :)<br>
        </div>
    </section>';

    outputHtml($skeletonDescription, $skeletonContent, $skeletonFeatures);
