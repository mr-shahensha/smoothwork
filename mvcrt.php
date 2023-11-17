<?php 
include "include.class.php";
if($_REQUEST['crt']!='' && $_REQUEST['ssn']==''){
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
<?php 
}
if($_REQUEST['ssn']!='' && $_REQUEST['crt']==''){

    $fld1['sl'] = "0";
    $op1['sl'] = ">,  ";
    $list1  = new Init_Table();
    $list1->set_table("main_order", "sl");
    $mcount = $list1->row_count_custom($fld1, $op1, '', array('sl' => 'ASC'));


// $_POST1['prchby']= $_REQUEST['ssn'];
// $_POST1['stat']='1';
// $pdo_obj  = new Init_Table();
// $pdo_obj->set_table("main_cart", "prchby");
// foreach ($_POST1 as $key => $vl) {
//     $pdo_obj->$key = $vl;
// }
// $pdo_obj->save();

}
?>


    <!--<span style="color:green;">booked succesfully</span>-->
