<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
$_POST['stat']=$_REQUEST['stat'];
$_POST['sl']=$_REQUEST['sl'];

$pdo_obj  = new Init_Table();
$pdo_obj->set_table('main_order_cart', "sl");
foreach ($_POST as $key => $vl) {
    $pdo_obj->$key = $vl;
}

if($_POST['stat']==1){
    $pdo_obj->save();
?>
<span style="color:green;">Order Deliverd Succesfull</span>
<?php
}else if($_POST['stat']==10){
    $pdo_obj->save();
?>
<span style="color:red;">Order Rejected Succesfull</span>
<?php
}
?>