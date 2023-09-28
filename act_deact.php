<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
	
function array_except($array, $keys) 
{
  return array_diff_key($array, array_flip((array) $keys));   
}
	$tbl=$_REQUEST['tbl'];
	$sl=$_REQUEST['sl'];
	$val=$_REQUEST['val'];

	$_POST81['sl']=$sl;
	$_POST81['stat']=$val;	
	


	$exception71=array('submit_form','page_name');
	$field11=array_except($_POST81,$exception71);
			$pdo_obj8881  = new Init_Table();
			$pdo_obj8881->set_table($tbl,"sl");
			foreach($field11 as $key1=>$vl1)
			{
			$pdo_obj8881->$key1=$vl1;	
			}
			$pdo_obj8881->save();
?>
<script type="text/javascript">show();</script>