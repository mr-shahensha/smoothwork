<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
$s_id = $_REQUEST['srv'];



?>
<select name="assign" class="form-control" size="1" id="assign" tabindex="2">
    <option value="">---SELECT---</option>
    <?php
    $fld1['s_id'] = $s_id ;
    $op1['s_id'] = "=, ";

    $list1  = new Init_Table();
    $list1->set_table("main_service_setup", "sl");
    $row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
    $path1 = "";
    foreach ($row as $value) {}

    $string = $value['sast'];
$nsast = explode(",", $string, 2);
$i=strlen($nsast);
while($i<0){

    ?>
        <option value="<?php echo $nsast[$i]; ?>"><?php echo $nsast[$i]; ?></option>
  <?php 
}$i++;
  ?>

</select>