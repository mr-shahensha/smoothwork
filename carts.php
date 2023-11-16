<?php
include "include.class.php";
$_POST1['prchby'] = $_REQUEST['id'];
$_POST1['servnm'] = $_REQUEST['sl'];
$_POST1['assign'] = $_REQUEST['assign'];
$_POST1['bdt'] = date('Y-m-d');
$_POST1["edt"] = date('Y-m-d');
$_POST1["edtm"] = date('Y-m-d H:i:s');


$fld['sl'] = '0';
$op['sl'] = ">, ";
$list  = new Init_Table();
$list->set_table("main_cart", "sl");
$count = $list->row_count_custom($fld, $op, '', array('sl' => 'ASC'));
//adding cart id
// if (strlen($count) == 1) {
//     $_POST1['cart_id'] = 'cart000' . $count;
// }
// if (strlen($count) == 2) {
//     $_POST1['cart_id'] = 'cart00' . $count;
// }
// if (strlen($count) == 3) {
//     $_POST1['cart_id'] = 'cart0' . $count;
// }
// if (strlen($count) == 4) {
//     $_POST1['cart_id'] = 'cart' . $count;
// }

//adding price
$fld2['s_id'] = $_POST1['servnm'];
$op2['s_id'] = "=, ";
$list2  = new Init_Table();
$list2->set_table("main_service_setup", "sl");
$row2 = $list2->search_custom($fld2, $op2, '', array('sl' => 'ASC'));
$pdo2 = new MainPDO();
foreach ($row2 as $value2) {
}
$_POST1["price"] = $value2['sprc'];
$fftm1 = $value2['sftm'];
$sdr = $value2['sdr'];

//adding from time

$fld3['servnm'] = $_POST1['servnm'];
$op3['servnm'] = "=, and";
$fld3['assign'] = $_POST1['assign'];
$op3['assign'] = "=, and";
$fld3['bdt'] = $_POST1['bdt'];
$op3['bdt'] = "=, ";
$list3  = new Init_Table();
$list3->set_table("main_cart", "sl");
$count3 = $list3->row_count_custom($fld3, $op3, '', array('sl' => 'ASC'));
if ($count3 > 0) {
    $row3 = $list3->search_custom($fld3, $op3, 'limit 1', array('ttm' => 'DESC'));
    foreach ($row3 as $value3) {
    }
    $lsttm = $value3['ttm'];
    //from time
    $dateTime = new DateTime($lsttm);
    $dateTime->add(new DateInterval('PT10M'));
    $newTime = $dateTime->format('Y-m-d H:i:s');
    $_POST1["ftm"] = $newTime;

    //to time 
    $dateTime1 = new DateTime($_POST1["ftm"]);
    $ptm='PT'.$sdr.'M';
    $dateTime1->add(new DateInterval($ptm));
    $newTime1 = $dateTime1->format('Y-m-d H:i:s');
    $_POST1["ttm"] = $newTime1;
}else{
//from time
    $time2 = $fftm1;
	$timestamp2 = strtotime($time2);
	$timeFormatted2 = date("h:i A", $timestamp2);
	$dateTime2 = new DateTime('today ' . $timeFormatted2);
	$formattedDateTime2 = $dateTime2->format('Y-m-d H:i:s'); 
	$_POST1['ftm'] = $formattedDateTime2;
    
    //to time 
    $dateTime1 = new DateTime($_POST1["ftm"]);
    $ptm='PT'.$sdr.'M';
    $dateTime1->add(new DateInterval($ptm));
    $newTime1 = $dateTime1->format('Y-m-d H:i:s');
    $_POST1["ttm"] = $newTime1;
}


//submitting
$pdo_obj  = new Init_Table();
$pdo_obj->set_table("main_cart", "sl");
foreach ($_POST1 as $key => $vl) {
    $pdo_obj->$key = $vl;
}
$pdo_obj->create();

?>
donee