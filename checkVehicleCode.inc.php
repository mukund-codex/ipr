<?php

    include('site-config.php');

    $vehicle_code = $func->escape_string($func->strip_all($_POST['code']));

    $query = $func->query("SELECT * FROM ".PREFIX."vehicle_master where vehicle_code = '".$vehicle_code."'");

    if($func->num_rows($query) > 0){
        echo "verified";
        $_SESSION['Login'] = 'login';
    }else{
        echo "failed";
    }


?>