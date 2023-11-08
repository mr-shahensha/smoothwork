<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "admin/common.php";
include "admin/include.class.php";

function array_except($array, $keys)
{
	return array_diff_key($array, array_flip((array) $keys));
}
$_POST["edt"] = date('Y-m-d');
$_POST["edtm"] = date('Y-m-d H:i:s');


$tbl_nm = $_POST['table_name'];
$page_name = $_POST['page_name'];

if (isset($_POST["sl"]) != "") {
	$fld['sl'] = $_POST['sl'];
	$op['sl'] = "!=, and ";
}



$fld['sl'] = "0";
$op['sl'] = ">,  ";

$fld1['sl'] = "0";
$op1['sl'] = ">,  ";

$list  = new Init_Table();
$list->set_table($tbl_nm, "sl");
$count = $list->row_count_custom($fld, $op, '', array('sl' => 'ASC'));
$mcount = $list->row_count_custom($fld1, $op1, '', array('sl' => 'ASC'));
if(strlen($mcount)=='1'){
	$nmcount='0000'.$mcount;
}
if(strlen($mcount)=='2'){
	$nmcount='000'.$mcount;
}if(strlen($mcount)=='3'){
	$nmcount='00'.$mcount;
}if(strlen($mcount)=='4'){
	$nmcount='0'.$mcount;
}if(strlen($mcount)=='5'){
	$nmcount=$mcount;
}
$msg = "";
if ($count > 0 && $page_name != "bissignup.php") {
	$msg = "Data Already Exists!!!";
}
if ($page_name == "custsignup.php") {
	$msg = "";
}
if ($msg == "") {

	if ($page_name == "bissignup.php") {
		$_POST['bissid'] = date('y') . $_POST['servcat'] . $count;
	}
	if ($page_name == "custsignup.php") {
		$_POST['cust_id'] = 'cust' .$nmcount;
	}

	$exception = array('submit', 'submit_form', 'table_name', 'page_name', 'rttl', 'sttl', 'tttl', 'uttl', 'vttl', 'cpass', 'old_pass', 'ttl4', 'ttl5', 'eby');
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


		if ($page_name == "custsignup.php") {
			$_POST1['username'] = $_POST['custnum'];
			$_POST1['name'] = $_POST['custnm'];
			$_POST1['fnm'] = $_POST['custnm'];
			$_POST1['mob'] = $_POST['custnum'];
			$_POST1['mailadres'] = $_POST['custeml'];
			$_POST1['userlevel'] = '20';
			$_POST1['password'] = $_POST['logpas'];
			$_POST1['pass'] = md5($_POST['logpas']);

			$pdo_obj1  = new Init_Table();
			$pdo_obj1->set_table('main_signup', "sl");
			foreach ($_POST1 as $key1 => $vl1) {
				$pdo_obj1->$key1 = $vl1;
			}
			$pdo_obj1->create();

		}
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