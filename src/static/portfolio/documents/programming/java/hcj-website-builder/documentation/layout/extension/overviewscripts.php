<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/cache/enabled.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/resources/dargmuesli/header/application/javascript.php';

    if (isset($_GET['i'])) {
        if ($_GET['i'] == 1) {
            ?>
//<script>
    try {
        if (location.href.indexOf('is-external=true') == -1) {
            parent.document.title="Overview";
        }
    }
    catch(err) {
    }
//</script>
<?php

        } elseif ($_GET['i'] == 2) {
            ?>
//<script>
    allClassesLink = document.getElementById("allclasses_navbar_top");
    if(window==top) {
        allClassesLink.style.display = "block";
    }
    else {
        allClassesLink.style.display = "none";
    }
//</script>
<?php

        } elseif ($_GET['i'] == 3) {
            ?>
//<script>
    allClassesLink = document.getElementById("allclasses_navbar_bottom");
    if(window==top) {
        allClassesLink.style.display = "block";
    }
    else {
        allClassesLink.style.display = "none";
    }
//</script>
<?php

        }
    }
?>
