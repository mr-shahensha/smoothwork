<?php
include "membersonly.inc.php";

ini_set("display_errors", "1");
error_reporting(E_ALL);
$_POST['sl'] = $_REQUEST['sl'];
$pdo_obj  = new Init_Table();
$pdo_obj->set_table("main_service_setup", "sl");
foreach ($_POST as $key => $vl) {
    $pdo_obj->$key = $vl;
}
$pdo_obj->delete();
?>

<span style="color:red;">Deleted successfully</span>
