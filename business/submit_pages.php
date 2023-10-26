<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);

function array_except($array, $keys)
{
	return array_diff_key($array, array_flip((array) $keys));
}
$_POST["eby"] = $Members->User_Details->username;
$_POST["edt"] = date('Y-m-d');
$_POST["edtm"] = date('Y-m-d H:i:s');


$tbl_nm = $_POST['table_name'];
$page_nm = $_POST['page_name'];
if ($page_nm == "bissignup.php") {
$page_name = '../bissignup.php';
}else{
	$page_name = $page_nm ;
}
if (isset($_POST["sl"]) != "") {
	$fld['sl'] = $_POST['sl'];
	$op['sl'] = "!=, and ";
}

if ($page_name == "category.php" && isset($_POST["sl"]) == "") {
	$fld['cat_nm'] = $_POST['cat_nm'];
	$op['cat_nm'] = "=, and ";
}


$fld['sl'] = "0";
$op['sl'] = ">,  ";

$fld1['sl'] = "0";
$op1['sl'] = ">,  ";

$list  = new Init_Table();
$list->set_table($tbl_nm, "sl");
$count = $list->row_count_custom($fld, $op, '', array('sl' => 'ASC'));
$mcount = $list->row_count_custom($fld1, $op1, '', array('sl' => 'ASC'));

$msg = "";
if ($count > 0) {
	$msg = "Data Already Exists!!!";
}
if($page_name != "bissignup.php"){
	$msg = "";
}
if ($msg == "") {

	if ($page_name == "category.php" && isset($_POST["sl"]) == "") {
		$_POST['cat_id'] = 'cat' . $mcount;
	}
	if ($page_name == "bissignup.php") {
		$_POST['bissid']=date('y').$_POST['servcat'].$count;
	   
	   }

	$exception = array('submit','submit_form', 'table_name', 'page_name', 'rttl', 'sttl', 'tttl', 'uttl', 'vttl', 'cpass', 'old_pass', 'ttl4', 'ttl5');
	$field = array_except($_POST, $exception);
	//print_r($_POST);
	$pdo_obj  = new Init_Table();
	$pdo_obj->set_table($tbl_nm, "sl");
	foreach ($field as $key => $vl) {
		$pdo_obj->$key = $vl;
	}
	if (isset($_POST["sl"]) != "") {
		$pdo_obj->save();
		$msg = "Data Update Successfully...";
	} else {

		$pdo_obj->create();
		$msg = "Data Submited Successfully...";
	}

?>
	<script>
		alert("<?php echo $msg; ?>");
		window.document.location = "<?php echo $page_name; ?>";
	</script>
<?php
} else {
?>
	<script>
		alert("<?php echo $msg; ?>");
		history.go(-1);
	</script>
<?php
}
?>