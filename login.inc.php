<?php

    include('site-config.php');
    $to = $func->escape_string($func->strip_all($_POST['mobile']));
    $msg = "1234";
    // $smsMsg = 'http://sms.businesskarma.in/api?method=sms.normal&api_key=2bb02d3223f91802a5974ee056e5b997&to='.$to.'&sender=TXTSMS&message='.$msg;
    // $sms_delivery = file_get_contents($smsMsg);
    $query = "insert into ".PREFIX."login(mobile, otp) values ('".$to."', '".$msg."')";
    $func->query($query);
    echo "sent";
?>