<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);
$val = $_REQUEST['val'];
$sl = $_REQUEST['sl'];
include "membersonly.inc.php";
$_POST['status'] = $val;
$_POST['sl'] = $sl;
$pdo_obj  = new Init_Table();
$pdo_obj->set_table("main_service_setup", "sl");
foreach ($_POST as $key => $vl) {
    $pdo_obj->$key = $vl;
}
$pdo_obj->save();

if ($val == 1) {
?>
    <button class="btn btn-success btn-sm" onclick="acdc('0',<?php echo $sl; ?>)">Active</button>

<?php
}
if ($val == 0) {
?>
    <button class="btn btn-danger btn-sm" onclick="acdc('1',<?php echo $sl; ?>)">Deactive</button>
<?php
}
?>