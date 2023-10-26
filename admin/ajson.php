<?php 
ini_set("display_errors", "1");
error_reporting(E_ALL);

$page_title = "Listen Companies";

include "membersonly.inc.php";

$fld1['sl'] = '0';
$op1['sl'] = ">, and status!='-1' and status!='-10'";

$list1  = new Init_Table();
$list1->set_table("main_service_provider", "sl");
$row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
foreach ($row as $value) {}

$json['nm']=$value['cname'];
$mjob = new StdClass;
$mjob->data_list=$json;
$mjson=json_encode($mjob);
echo $mjson;

echo "<br><br>";

$ok = '{"name": "Alice", "age": 25, "isStudent": "true"}';
$ddata = json_decode($ok);
print_r( $ddata);
?>