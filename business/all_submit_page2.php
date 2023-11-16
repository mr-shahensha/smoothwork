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
$_POST["edtm"] = date('Y-m-d H:i:s A');

$tbl_nm = $_POST['table_name'];
$page_nm = $_POST['page_name'];

if (isset($_POST["sl"]) != "") {
	$fld['sl'] = $_POST['sl'];
	$op['sl'] = "!=,and";
}
if ($page_nm  == "abookings.php") {
	$time = $_POST['ftm1'];
	$timestamp = strtotime($time);
	$timeFormatted = date("h:i A", $timestamp);
	$dateTime = new DateTime('today ' . $timeFormatted);
	$formattedDateTime = $dateTime->format('Y-m-d H:i:s'); 
	$_POST['ftm'] = $formattedDateTime;
	$ftm = $_POST['ftm'];
	//sttm

	$time2 = $_POST['ttm1'];
	$timestamp2 = strtotime($time2);
	$timeFormatted2 = date("h:i A", $timestamp2);
	$dateTime2 = new DateTime('today ' . $timeFormatted2);
	$formattedDateTime2 = $dateTime2->format('Y-m-d H:i:s'); 
	$_POST['ttm'] = $formattedDateTime2;
	$ttm = $_POST['ttm'];
	
}
if ($page_nm  == "abookings.php") {
	$bdt=$_POST['bdt'];
	$asn=$_POST['assign'];

	$fld['bdt'] = $bdt;
	$op['bdt'] = "=, and";
	$fld['assign'] =  $asn;
	$op['assign'] = "=, and (ftm <='$ftm' and ttm>='$ftm') or (ftm <='$ttm' and ttm>='$ttm')";
} else {
	$fld['sl'] = "0";
	$op['sl'] = ">,  ";
}

$list  = new Init_Table();
$list->set_table($tbl_nm, "sl");
$count = $list->row_count_custom($fld, $op, '', array('sl' => 'ASC'));

$fld1['sl'] = "0";
$op1['sl'] = ">,  ";
$list1  = new Init_Table();
$list1->set_table($tbl_nm, "sl");
$mcount = $list1->row_count_custom($fld1, $op1, '', array('sl' => 'ASC'));

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
if ($count > 0 && $page_nm  == "abookings.php") {
	$msg = "This time slot is booked!!!";
}

if ($msg == "") {
if ($page_nm  == "abookings.php") {
	$_POST['cart_id'] = 'crt' . $nmcount;
	$exception = array('submit_form', 'table_name', 'page_name', 'rttl', 'ftm1', 'ttm1', 'sttl', 'tttl', 'ttl', 'uttl', 'vttl', 'cpass', 'old_pass','eby');
}
if ($page_nm  != "abookings.php") {
	$exception = array('submit_form', 'table_name', 'page_name', 'rttl', 'ftm1', 'ttm1', 'sttl', 'tttl', 'ttl', 'uttl', 'vttl', 'cpass', 'old_pass');
}
	$field = array_except($_POST, $exception);
	//print_r($_POST);
	$pdo_obj  = new Init_Table();
	$pdo_obj->set_table($tbl_nm, "sl");
	foreach ($field as $key => $vl) {
		$pdo_obj->$key = $vl;
	}

	if (isset($_POST["sl"])) {

		$pdo_obj->save();
		$msg = "Data Updated Successfully...";
	} else {
		$pdo_obj->create();
		$msg = "Data Submited Successfully...";
	}

?>
	<script>
		alert("<?php echo $msg; ?>");
		window.document.location = "<?php echo $page_nm; ?>";
	</script>
<?php
} else {
?>
	<script>
		alert("<?php echo $msg; ?>");
		history.go(-1);;
	</script>
<?php
}
?>