<?php

    include_once 'include/config.php';
    include_once 'include/admin-functions.php';
    $func = new AdminFunctions();

    $display = $func->escape_string($func->strip_all($_POST['display']));

    $query = $func->query("SELECT * FROM ".PREFIX."video_master where display_order = '".$display."' ");
    if($func->num_rows($query) > 0){
        echo "exists";
    }

?>