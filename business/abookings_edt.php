<?php
include "membersonly.inc.php";
ini_set("display_errors", "1");
error_reporting(E_ALL);

$stat = $_REQUEST['stat'];
$sl =$_REQUEST['sl'];

if ($stat == '3') {
    $pdo_obj  = new Init_Table();
    $pdo_obj->set_table("main_order_cart", "sl");
    $pdo_obj->sl=$sl;
    $pdo_obj->Delete();
    ?>
    <span style="color:red;">Deleted succcessfully</span>
    <?php
}else if ($stat == '2') {
    $fld1['sl'] = $sl;
    $op1['sl'] = "=, ";
    $list1  = new Init_Table();
    $list1->set_table("main_order_cart", "sl");
    $row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
    foreach ($row as $value) {}

    $pdo_obj  = new Init_Table();
	$pdo_obj->set_table($tbl_nm, "sl");
	foreach ($_POST as $key => $vl) {
		$pdo_obj->$key = $vl;
	}
    $pdo_obj->create();
}

?>