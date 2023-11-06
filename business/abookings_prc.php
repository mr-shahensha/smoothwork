<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
$s_id = $_REQUEST['srv'];
if ($s_id != "") {
   $fld1['s_id'] = $s_id;
   $op1['s_id'] = "=, ";

   $list1  = new Init_Table();
   $list1->set_table("main_service_setup", "sl");
   $row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
   $path1 = "";
   foreach ($row as $value) {
   }
   $tm = $value['sftm'];
   $etm = $value['sttm'];
   $minutes_to_add = 50;


?>


   <div class="form-group col-md-3">
      <label>
         <b>
            <font color="#ed2618"></font>Price :
         </b>
      </label>

      <input type="text" id="" name="price" class="form-control" value="<?php echo $value['sprc']; ?>" style="width:100%" placeholder="Type here" readonly>


   </div>

 
<?php
} else {
?>

   <div class="form-group col-md-3">
      <label>
         <b>
            <font color="#ed2618"></font>Price :
         </b>
      </label>

      <input type="text" id="" name="price" class="form-control" value="" style="width:100%" placeholder="Type here" readonly>

   </div>
<?php
}
?>