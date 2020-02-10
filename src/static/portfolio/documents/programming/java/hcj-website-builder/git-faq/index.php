<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

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
                Observe the <a href="../code-conventions/" title="Die Code Conventions des FG-Teams auf Github">Code Conventions</a>.
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
    </section>';

    output_html($skeletonDescription, $skeletonContent, $skeletonFeatures);
