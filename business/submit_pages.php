<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
$tbl_nm = $_POST['table_name'];
$page_nm = $_POST['page_name'];
function array_except($array, $keys)
{
	return array_diff_key($array, array_flip((array) $keys));
}
if ($page_nm == "empsetup.php") {
	$_POST["eby"] = $Members->User_Details->username;
}else{
	$_POST["eby"] = $Members->User_Details->username;
}

$_POST["edt"] = date('Y-m-d');
$_POST["edtm"] = date('Y-m-d H:i:s');





if ($page_nm  == "service_setup.php") {
	$sast = $_POST['sast1'];

	$_POST['sast'] = implode(',', $sast);

	$time = $_POST['sftm1'];
	$timestamp = strtotime($time);
	$timeFormatted = date("h:i A", $timestamp);

	$_POST['sftm'] = $timeFormatted;
	//sttm
	$time2 = $_POST['sttm1'];
	$timestamp2 = strtotime($time2);
	$timeFormatted2 = date("h:i A", $timestamp2);

	$_POST['sttm'] = $timeFormatted2;
}


if ($page_nm == "bissignup.php") {

	$page_name = '../bissignup.php';
} else {
	$page_name = $page_nm;
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
if ($page_nm == "empsetup.php") {
	$dateString =$_POST['jdt'];
$parts = explode("-", $dateString);
$year = $parts[0];

	$fld1['jdt'] = $year.'-%';
	$op1['jdt'] = "LIKE,  and";
}
$fld1['sl'] = "0";
$op1['sl'] = ">,  ";

$list  = new Init_Table();
$list->set_table($tbl_nm, "sl");
$count = $list->row_count_custom($fld, $op, '', array('sl' => 'ASC'));
$mcount = $list->row_count_custom($fld1, $op1, '', array('sl' => 'ASC'));
if ($page_nm  == "service_setup.php") {
$_POST['s_id']='s'.$count;
}

if ($page_nm == "empsetup.php") {
	$newDate = date("y", strtotime($_POST['jdt']));
	if(strlen($mcount)=='1'){
		$mmcount='0'.$mcount;
	}
	$comnm=$_POST["eby"];

	$bnm=$Members->User_Details->name;
	$three = substr($bnm, 0, 3);
	$_POST['eid']=$three.$newDate.$mmcount.date('y').date('m').date('d');
}

$msg = "";
if ($count > 0) {
	$msg = "Data Already Exists!!!";
}
if ($page_name != "bissignup.php") {
	$msg = "";
}
if ($msg == "") {

	if ($page_name == "category.php" && isset($_POST["sl"]) == "") {
		$_POST['cat_id'] = 'cat' . $mcount;
	}
	if ($page_name == "bissignup.php") {
		$_POST['bissid'] = date('y') . $_POST['servcat'] . $count;
	}

	$exception = array('submit', 'submit_form', 'table_name', 'page_name', 'rttl', 'sttl', 'tttl', 'uttl', 'vttl', 'cpass', 'old_pass', 'ttl4', 'ttl5', 'sast1', 'sftm1', 'sttm1','ftm1','ttm1');
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
	if ($page_nm == "empsetup.php") {
		$_P['username']=$_POST['eid'];
		$_P['password']=$_POST['enum'];
		$_P['name']=$Members->User_Details->name;;
		$_P['fnm']=$_POST['enm'];
		$_P['mob']=$_POST['enum'];
		$_P['userlevel']='10';
		$_P['eby']=$_POST["eby"];
		$_P['edt']=$_POST["edt"];
		$_P['edtm']=$_POST["edtm"];
		$_P['pass']=md5($_POST['enum']);

		$pdo_obj1  = new Init_Table();
		$pdo_obj1->set_table("main_signup", "sl");
		foreach ($_P as $key1 => $vl1) {
			$pdo_obj1->$key1 = $vl1;
		}
		$pdo_obj1->create();

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