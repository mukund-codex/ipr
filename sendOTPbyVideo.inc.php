<?php

include('site-config.php');

$mobile = $func->escape_string($func->strip_all($_POST['mobile']));

$query = $func->query("SELECT a.*, b.* FROM ".PREFIX."vehicle_master a JOIN ".PREFIX."login b ON a.vehicle_code = b.vehicle_code order by b.created DESC limit 1");
$res = $func->fetch($query);
$driver_mobile = $res['driver_mobile'];
$digits = 4;
$msg = rand(pow(10, $digits-1), pow(10, $digits)-1);
echo $msg;
//$msg = "5678";
$smsMsg = 'http://sms.businesskarma.in/api?method=sms.normal&api_key=2bb02d3223f91802a5974ee056e5b997&to='.$mobile.'&sender=TXTSMS&message='.$msg;
$sms_delivery = file_get_contents($smsMsg);
$smsMsg1 = 'http://sms.businesskarma.in/api?method=sms.normal&api_key=2bb02d3223f91802a5974ee056e5b997&to='.$driver_mobile.'&sender=TXTSMS&message='.$msg;
$sms_delivery = file_get_contents($smsMsg1);

$query = "UPDATE ".PREFIX."login SET otp = '".$msg."' WHERE mobile = '".$mobile."' order by created DESC";
$func->query($query);

?>