<?php
include "membersonly.inc.php";
$_POST['sl'] = $_REQUEST['sl'];
$_POST['status'] = $_REQUEST['val'];
$pg = $_REQUEST['pg'];
$pdo_obj  = new Init_Table();
$pdo_obj->set_table("main_service_provider", "sl");

foreach ($_POST as $key => $vl) {
    $pdo_obj->$key = $vl;
}
$pdo_obj->save();
$fld10['sl'] = $_POST['sl'];
$op10['sl'] = "=, ";

$list10  = new Init_Table();
$list10->set_table("main_service_provider", "sl");
$row0 = $list10->search_custom($fld10, $op10, '', array('sl' => 'ASC'));
foreach ($row0 as $value1) {
}
if ($_POST['status'] == "-10") {
?>
    <span style="color:red;">Rejected succesfully</span>
<?php
}
if ($_POST['status'] == "5" && $pg == "") {

    $_POST2['username'] = $value1['offcnum'];
    $_POST2['password'] = $value1['logpas'];
    $_POST2['pass'] = md5($value1['logpas']);
    $_POST2['name'] = $value1['cname'];
    $_POST2['fnm'] = $value1['oname'];
    $_POST2['mob'] = $value1['offcnum'];
    $_POST2['edt'] = $value1['edt'];
    $_POST2['edtm'] = $value1['edtm'];
    $_POST2['userlevel'] = '5';
    //print_r($_POST2);
    $pdo_obj2  = new Init_Table();
    $pdo_obj2->set_table("main_signup", "sl");
    foreach ($_POST2 as $key2 => $vl2) {
        $pdo_obj2->$key2 = $vl2;
    }
    $pdo_obj2->create();


?>
    <span style="color:green;">Accepted succesfully</span>
<?php
}
if ($_POST['status'] == "0") {
    $_POST1['username'] = $value1['offcnum'];
    $_POST1['actnum'] = '1';
    $pdo_obj1  = new Init_Table();
    $pdo_obj1->set_table("main_signup", "username");
    foreach ($_POST1 as $key1 => $vl1) {
        $pdo_obj1->$key1 = $vl1;
    }
    $pdo_obj1->save();
?>
    <span style="color:green;">Temporary blocked</span>
<?php
}
if ($_POST['status'] == "5" && $pg != "") {
    $_POST1['username'] = $value1['offcnum'];
    $_POST1['actnum'] = '0';
    $pdo_obj1  = new Init_Table();
    $pdo_obj1->set_table("main_signup", "username");
    foreach ($_POST1 as $key1 => $vl1) {
        $pdo_obj1->$key1 = $vl1;
    }
    $pdo_obj1->save();
?>
    <span style="color:green;">Unblocked succesfully</span>
<?php
}
?>