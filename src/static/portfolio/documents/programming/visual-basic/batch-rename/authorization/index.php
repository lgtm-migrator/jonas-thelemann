<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Infomationen über das Projekt \'Batch Rename\' von Jonas Thelemann';
    $skeletonContent = '
    <p>
        Schade, dass du BatchRename nicht einfach mit Facebook verknüpfen willst.
    </p>
    <p>
        Die App verlangt nur die Minimalanforderungen von Facebook für den Support!
    </p>
    <p>
        Wenn du es doch nochmal versuchen willst kannst du auf den Link hier klicken:
    </p>
    <p>
        <a href="https://www.facebook.com/dialog/oauth?&amp;client_id=444612865654728&amp;redirect_uri=https://www.batchrename.jimdo.com&amp;response_type=token&amp;scope=email" title="BatchRename mit Facebook verknüpfen.">
            BatchRename mit Facebook verknüpfen
        </a>
    </p>';

    output_html($skeletonDescription, $skeletonContent);
