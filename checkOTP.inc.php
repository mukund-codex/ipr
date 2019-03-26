<?php

    include('site-config.php');

    $otp = $func->escape_string($func->strip_all($_POST['code']));
    $mobile = $_SESSION['mobile'];
    if(empty($otp)){
        echo "blank";
    }
    $query = $func->query("SELECT * FROM ".PREFIX."login where mobile='".$mobile."' and otp = '".$otp."'");

    if($func->num_rows($query) > 0){
        echo "verified";
    }else{
        echo "failed";
    }


?>