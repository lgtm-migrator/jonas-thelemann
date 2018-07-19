<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/base/skeleton.php';

    last_modified(get_page_mod_time());

    $skeletonDescription = 'Alle Projekte, in denen Text das primäre Medium ist';
    $skeletonContent = '
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus accumsan dolor quis nisl ornare feugiat. Vestibulum ac tempus augue, in posuere lacus. Ut luctus lectus vel posuere sollicitudin. Phasellus bibendum convallis feugiat. Suspendisse velit orci, tincidunt vitae sem at, auctor facilisis elit. In hac habitasse platea dictumst. Nullam turpis purus, aliquet ut magna tincidunt, scelerisque congue urna. Nulla facilisi. Nunc pharetra leo nec suscipit efficitur.
    </p>
    <p>
        Proin eu nisi metus. In odio massa, sagittis quis porta eu, laoreet quis neque. Fusce enim lectus, volutpat id viverra a, viverra vel justo. Vivamus id dolor purus. Suspendisse metus massa, commodo tempor nisl et, bibendum hendrerit nisi. Sed ullamcorper facilisis nunc, dignissim fringilla neque interdum id. Morbi laoreet quis nisi vitae eleifend. Sed vel risus sed nisi semper volutpat a at tortor.
    </p>
    <p>
        Nam vitae vulputate magna, eu lacinia eros. Nam vitae ultricies arcu. Nunc lobortis volutpat turpis, nec molestie turpis convallis et. Etiam rutrum quam at magna posuere, at sagittis ante laoreet. In non imperdiet ligula. Proin arcu metus, semper ut scelerisque vitae, tempus at mi. Vivamus in eros ac ex bibendum luctus sed rutrum risus. Cras in condimentum magna. Morbi ipsum mauris, interdum eget convallis in, ornare quis est. Mauris bibendum felis tortor, vel egestas nibh eleifend vitae. Duis ut cursus eros. Quisque varius, dolor sed tincidunt blandit, tellus ipsum suscipit nunc, nec malesuada quam lorem vitae ex. Etiam pellentesque velit in metus tempor sagittis in ac arcu. Nam venenatis luctus metus, quis luctus ligula eleifend et. Pellentesque venenatis semper pretium. In et lacus ornare, pulvinar lorem eget, efficitur nunc.
    </p>
    <p>
        Aliquam erat volutpat. Integer ac nisi nulla. Suspendisse turpis est, cursus ut est a, accumsan bibendum urna. In ut placerat nisi. Vivamus sodales dui sed dolor semper, ut aliquam augue viverra. Praesent imperdiet euismod blandit. Maecenas at nisl pharetra, aliquam erat non, luctus arcu. Morbi ex ligula, elementum ut nunc et, placerat vestibulum augue. Suspendisse rhoncus purus eros, vitae fermentum mauris tincidunt vel. Nulla facilisi. Vivamus lobortis mauris vel hendrerit aliquet. Nunc posuere urna vel mattis finibus. Phasellus eget enim eu dui euismod volutpat.
    </p>
    <p>
        Nulla quis dolor et sem mattis dictum eget et purus. Nunc viverra ullamcorper velit, egestas lobortis sapien lacinia blandit. Donec posuere pulvinar mi, vel elementum lectus imperdiet sed. Ut sed risus dolor. Aliquam vel purus nec ante sagittis tristique eget vel nisl. Vestibulum commodo egestas purus. Aliquam eros lacus, pulvinar in tortor a, commodo pharetra turpis.
    </p>
    <p>
        Integer tempor ligula nec blandit convallis. Aliquam non hendrerit diam. Sed venenatis nisi at velit consequat scelerisque in id lacus. Nunc sollicitudin tortor odio, et euismod ipsum consequat eu. In hac habitasse platea dictumst. Mauris pellentesque eros eros, vitae consequat erat cursus ut. Quisque tellus quam, tincidunt sit amet iaculis quis, ultrices vitae nunc.
    </p>
    <p>
        Integer rutrum eu mauris consequat vulputate. Quisque magna arcu, maximus eu lectus nec, rutrum cursus ex. Nam maximus placerat quam, eu hendrerit lorem. Mauris vulputate eros tincidunt iaculis aliquam. In vitae nibh orci. Morbi non purus ut mi bibendum laoreet. Integer vel sem venenatis, egestas ante sed, pretium tortor. Morbi dapibus lorem quis lectus condimentum fringilla id ac nisi. Quisque varius eros at molestie convallis.
    </p>
    <p>
        Nulla facilisi. Cras vehicula nec nisl commodo pharetra. Nulla vel suscipit sapien. Sed sed pellentesque ante, at accumsan lacus. Maecenas et semper ipsum. Nunc et suscipit nibh, ut dictum dolor. Proin aliquam mauris at est pretium viverra. Aenean tincidunt malesuada porttitor. Sed euismod est pellentesque lectus tempus, sit amet porta nisl cursus. Suspendisse aliquam iaculis dui. Cras convallis molestie ex, sit amet laoreet metus pellentesque non. Sed consectetur lacus ante, non sagittis urna mattis eu. Phasellus aliquam pellentesque nibh, ut imperdiet est aliquet id. Curabitur rutrum ipsum quis suscipit vehicula.
    </p>
    <p>
        Nunc dolor lectus, porta id venenatis sit amet, iaculis vel felis. Fusce a mauris blandit, tristique tortor ac, venenatis odio. Maecenas sit amet viverra justo. Donec vel viverra lorem. In malesuada lacus turpis, non congue mi tincidunt ac. Vivamus porta elementum mauris ac faucibus. Maecenas bibendum in massa egestas dictum. Nulla sapien erat, ultrices sed magna eget, feugiat pharetra purus. Nullam bibendum vulputate felis sit amet feugiat. Etiam tempor scelerisque felis quis molestie. Aenean laoreet felis sit amet vehicula dignissim. Etiam eget pretium lacus. Donec nulla lacus, varius feugiat tellus non, sollicitudin hendrerit sem.
    </p>
    <p>
        Integer ut lacus blandit, ultrices orci ac, imperdiet quam. Donec interdum ligula sed risus efficitur laoreet. Nulla rhoncus consectetur turpis, sollicitudin bibendum felis sollicitudin vitae. Proin a ex consequat nisl ultrices lobortis. Proin congue, lorem vitae ultricies pharetra, sem lectus blandit massa, in aliquam ex turpis a ex. Pellentesque suscipit ipsum nulla, vitae viverra nunc sodales vitae. Donec in lectus sem. Maecenas cursus bibendum eros, vitae auctor lectus bibendum nec. Vivamus ut nibh non mi porta semper hendrerit nec quam. Duis aliquam ut tortor a sollicitudin. Nam mattis purus et urna convallis gravida. Aliquam non eros sit amet diam commodo accumsan. Ut placerat ante sed metus commodo sollicitudin.
    </p>';

    output_html($skeletonDescription, $skeletonContent);
