<?php 

include_once 'include/config.php';
include_once 'include/admin-functions.php';
$func = new AdminFunctions();

$parentPageURL = 'video-master.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $func->escape_string($func->strip_all($_GET['id']));

    $result = $func->deleteVideoDetail($id);
	header("location:".$parentPageURL."?deletesuccess");

}else{
    header("location:".$parentPageURL."?deletefail");
	exit;
}

?>