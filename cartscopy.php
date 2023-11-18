<?php
include "include.class.php";
$_POST1['prchby'] = $_REQUEST['id'];
$_POST1['servnm'] = $_REQUEST['sl'];
$_POST1['assign'] = $_REQUEST['assign'];
$_POST1['bdt'] = date('Y-m-d');
$_POST1["edt"] = date('Y-m-d');
$_POST1["edtm"] = date('Y-m-d H:i:s');


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
for ($currentTime = $startTime; $currentTime < $endTime; $currentTime += $increment) {

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
    $start2 . '------' . $end2 . "<br>";

    //(ftm <='$ftm' and ttm>='$ftm') or (ftm <='$ttm' and ttm>='$ttm')
    $servnm = $_POST1['servnm'];
    $assign = $_POST1['assign'];

    $fld2x['bdt'] = $_POST1['bdt'];
    $op2x['bdt'] = "=, and assign='$assign' and (ftm <='$start2' and ttm>='$start2') or (ftm <='$end2' and ttm>='$end2')";

    $list2x  = new Init_Table();
    $list2x->set_table("main_cart", "sl");
    $row2x = $list2x->search_custom($fld2x, $op2x, '', array('sl' => 'ASC'));

    $cnt = count($row2x);
    foreach ($row2x as $value2x) {
    }
    $senm = $value2x['servnm'];

    if ($cnt > 0 && $senm == $servnm) {
       // echo '******'.$start2 .'------' . $end2 . "<br>";
       $fld20['sl'] = '0';
       $op20['sl'] = ">, ";
       $list20  = new Init_Table();
       $list20->set_table("main_cart", "sl");
       $row20 = $list20->search_custom($fld20, $op20, 'limit 1', array('sl' => 'DESC'));
       $pdo20 = new MainPDO();
       foreach ($row20 as $value20) {
       }
       $currentTime = strtotime($value20['ttm'])+600;
    } else {
        $_POST1['ftm']=$start2;
        $_POST1["ttm"]=$end2;
        $pdo_obj  = new Init_Table();
        $pdo_obj->set_table("main_cart", "sl");
        foreach ($_POST1 as $key => $vl) {
            $pdo_obj->$key = $vl;
        }
        $pdo_obj->create();
        echo "success";
        break;
    }
}
