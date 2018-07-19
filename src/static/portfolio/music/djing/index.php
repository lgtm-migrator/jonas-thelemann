<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Geschichten und Erfahrungen über Dinge, die ich als DJ erlebe';
    $skeletonContent = '
    <section id="mixcloud" class="section scrollspy">
        <h2>
            Mixcloud
        </h2>
        <p>
            Hier eine Auswahl meiner zu <a href="https://www.mixcloud.com/" target="_blank" title="Mixcloud">Mixcloud</a> hochgeladenen Sets.
        </p>
        <p>
            <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2Fcreal%2Fcreal-trap-nation-mix-2018-05%2F" frameborder="0" >
            </iframe>
            <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2Fcreal%2Fcreal-future-house-mix-arm-2018-07-01%2F" frameborder="0" >
            </iframe>
            <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2Fcreal%2Fcreal-trap-nation-mix-2018-04%2F" frameborder="0" >
            </iframe>
            <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2Fcreal%2Fcreal-trap-nation-mix-2018-03%2F" frameborder="0" >
            </iframe>
            <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2Fcreal%2Fcreal-trap-nation-mix-2018-02%2F" frameborder="0" >
            </iframe>
            <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2Fcreal%2Fmuesli-mix-2-v2%2F" frameborder="0" >
            </iframe>
            <iframe width="100%" height="120" src="https://www.mixcloud.com/widget/iframe/?hide_cover=1&feed=%2Fcreal%2Fmuesli-mix-1-v2%2F" frameborder="0" >
            </iframe>
        </p>
    </section>';

    output_html($skeletonDescription, $skeletonContent);
