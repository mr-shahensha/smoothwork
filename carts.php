<?php 
include "include.class.php";
$_POST1['prchby']=$_REQUEST['id'];
$_POST1['servnm']=$_REQUEST['sl'];
$_POST1['assign']=$_REQUEST['assign'];
$_POST1['bdt']=date('Y-m-d');
$_POST1["edt"] = date('Y-m-d');
$_POST1["edtm"] = date('Y-m-d H:i:s');


$fld['s_id'] = $_POST1['servnm'];
$op['s_id'] = "=, ";
$list  = new Init_Table();
$list->set_table("main_service_setup", "sl");


$fld20['s_id'] = $_POST1['servnm'];
$op20['s_id'] = "=, ";
$list20  = new Init_Table();
$list20->set_table("main_service_setup", "sl");
$row20 = $list20->search_custom($fld20, $op20, '', array('sl' => 'ASC'));
$pdo20 = new MainPDO();
foreach ($row20 as $value20) {
}
$_POST1["price"] = $value20['sprc'];


// $pdo_obj  = new Init_Table();
// $pdo_obj->set_table("main_cart", "sl");
// foreach ($_POST1 as $key => $vl) {
//     $pdo_obj->$key = $vl;
// }

?>