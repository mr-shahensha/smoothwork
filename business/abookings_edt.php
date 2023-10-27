<?php
include "membersonly.inc.php";
ini_set("display_errors", "1");
error_reporting(E_ALL);

$stat = $_REQUEST['stat'];
$sl = base64_decode($_REQUEST['sl']);

if ($stat == '3') {
    $pdo_obj  = new Init_Table();
    $pdo_obj->set_table("main_order_cart", "sl");
    $pdo_obj->sl=$sl;
    $pdo_obj->Delete();
    ?>
    <script>
        alert("Deleted succesfully")
        window.document.location = "abookings.php";
    </script>
    <?php
}else if ($stat == '2') {

}

?>