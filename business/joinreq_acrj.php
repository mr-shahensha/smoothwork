<?php
include "membersonly.inc.php";
$_POST['sl'] = $_REQUEST['sl'];
$_POST['status'] = $_REQUEST['val'];
$pg= $_REQUEST['pg'];
$pdo_obj  = new Init_Table();
$pdo_obj->set_table("main_service_provider", "sl");
foreach ($_POST as $key => $vl) {
    $pdo_obj->$key = $vl;
}
$pdo_obj->save();
if ($_POST['status'] == "-10") {
?>
   <span style="color:red;">Rejected succesfully</span> 
<?php
}
if ($_POST['status'] == "5" && $pg=="") {
?>
    <span style="color:green;">Accepted succesfully</span> 
<?php
}
if ($_POST['status'] == "0") {
    ?>
        <span style="color:green;">Temporary blocked</span> 
    <?php
    }
    if ($_POST['status'] == "5" && $pg!="") {
        ?>
            <span style="color:green;">Unblocked succesfully</span> 
        <?php
        }
        ?>