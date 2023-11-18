<?php
include "include.class.php";
$_POST1['prchby'] = $_REQUEST['id'];
$_POST1['servnm'] = $_REQUEST['sl'];
$_POST1['assign'] = $_REQUEST['assign'];
$_POST1['bdt'] = date('Y-m-d');
$_POST1["edt"] = date('Y-m-d');
$_POST1["edtm"] = date('Y-m-d H:i:s');


$fld2x['servnm'] = $_POST1['servnm'];
$op2x['servnm'] = "=, and";
$fld2x['assign'] = $_POST1['assign'];
$op2x['assign'] = "=, and";
$fld2x['bdt'] = $_POST1['bdt'];
$op2x['bdt'] = "=,";
$list2x  = new Init_Table();
$list2x->set_table("main_cart", "sl");
// $row2x = $list2x->search_custom($fld2x, $op2x, '', array('sl' => 'ASC'));
$count = $list2x->row_count_custom($fld2x, $op2x, '', array('sl' => 'ASC'));
if($count>0){


    $fld2['s_id'] = $_POST1['servnm'];
    $op2['s_id'] = "=, ";
    $list2  = new Init_Table();
    $list2->set_table("main_service_setup", "sl");
    $row2 = $list2->search_custom($fld2, $op2, '', array('sl' => 'ASC'));
    $pdo2 = new MainPDO();
    foreach ($row2 as $value2) {
    }
    $sdr = $value2['sdr'];
    
    $frtm = $value2['sftm'];
    $nfrtm = date("H:i", strtotime($frtm));
    $totm = $value2['sttm'];
    $ntotm = date("H:i", strtotime($totm));
    
    $startTime = strtotime($nfrtm);
    $endTime = strtotime($ntotm);
    $increment = $sdr * 60;
    
    for ($currentTime = $startTime; $currentTime <= $endTime; $currentTime += $increment) {
        $start = date('H:i:s', $currentTime);
        //
        $timestamp = strtotime($start);
        $timeFormatted = date("h:i A", $timestamp);
        $dateTime = new DateTime('today ' . $timeFormatted);
        $start2 = $dateTime->format('Y-m-d H:i:s');
        //
    
        $s = $currentTime + $increment;
        $end = date('H:i:s', $s);
    
        //
        $timestamp2 = strtotime($end);
        $timeFormatted2 = date("h:i A", $timestamp2);
        $dateTime2 = new DateTime('today ' . $timeFormatted2);
        $end2 = $dateTime2->format('Y-m-d H:i:s');
        //
        echo $start2 . '------' . $end2 . "<br>";
    }


    echo  "data ache";
}else{
    echo  "data nei";
}