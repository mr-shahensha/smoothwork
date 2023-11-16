<?php 
include "include.class.php";
 $_POST1['cart_id']=$_REQUEST['crt'];
$_POST1['stat']='-1';
$pdo_obj  = new Init_Table();
$pdo_obj->set_table("main_cart", "cart_id");
foreach ($_POST1 as $key => $vl) {
    $pdo_obj->$key = $vl;
}
$pdo_obj->save();
?>
<span style="color:red;">Cart deleted succesfully</span>