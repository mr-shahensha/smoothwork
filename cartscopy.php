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

for ($currentTime = $startTime; $currentTime <= $endTime; $currentTime += $increment) {
        $formattedTime = date('H:i:s', $currentTime);

    if($formattedTime=='12:00:00'){
        continue;
    }
    echo $formattedTime . "<br>";
}
