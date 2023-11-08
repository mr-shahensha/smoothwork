<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
$s_id = $_REQUEST['srv'];

if ($s_id != "") {


?>
<select name="assign" class="form-control" size="1" id="assign" tabindex="2" onchange="show()">
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
    $nsast=array();
     $nsast = explode(",", $string, 2);
     $i=sizeof($nsast);
    $x=0;
    while($x<$i){
   
    ?>
        <option value="<?php echo $nsast[$x]; ?>"><?php
        
        $fld1x['eid'] = $nsast[$x] ;
        $op1x['eid'] = "=, ";
    
        $list1x  = new Init_Table();
        $list1x->set_table("main_employee_setup", "sl");
        $rowx = $list1x->search_custom($fld1x, $op1x, '', array('sl' => 'ASC'));
        $path1 = "";
        foreach ($rowx as $valuex) {}

        echo $valuex['enm']; ?></option>
  <?php 
 $x++;
}
  ?>

</select>


<?php
}else{
  ?>
<select name="assign" class="form-control" size="1" id="assign" tabindex="2" onchange="show()">
                                                <option value="">---SELECT---</option>
                                            </select>
  <?php
}
?>
<script>
      $('#assign').chosen({
        no_results_text: "Oops, nothing found!",
    });
</script>