<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members = new isLogged(1);

$pdo = new MainPDO();

function array_except($array, $keys)
{
	return array_diff_key($array, array_flip((array) $keys));
}
$tstmp=date('YmdHis');

$tbl_nm = "main_test_photo";
$page_name = $_POST["page_name"];

if (isset($_POST["sl"])) {
	$fld['sl'] = $_POST['sl'];
	$op['sl'] = "!=, and";
}

$fld['ttl'] = $_POST['ttl'];
$op['ttl'] = "=, ";

$list = new Init_Table();
$list->set_table($tbl_nm, "sl");
$count = $list->row_count_custom($fld, $op, '', array('sl' => 'ASC'));
$msg = "";
$lvl = "";
$alise = "";
if ($count > 0) {
	$msg = "Data Already Exists!!!";
}

if ($msg == "") {


	$_POST["edt"] = date('Y-m-d');
	$_POST["edtm"] = date('Y-m-d h:i:s A');
	$_POST["eby"] = $Members->User_Details->username;

	$exception2 = array('submit_form', 'table_name', 'page_name', 'fileToUpload');
	$field2 = array_except($_POST, $exception2);
	$pdo_obj2 = new Init_Table();
	$pdo_obj2->set_table($tbl_nm, "sl");
	foreach ($_POST as $key2 => $vl2) {
		$pdo_obj2->$key2 = $vl2;
	}

	if (isset($_POST["sl"])) {
		$pdo_obj2->save();

		$filename = $_FILES["fileToUpload"]["name"];
		$tempname = $_FILES["fileToUpload"]["tmp_name"];
		$folder = "images/banner/" . $tstmp."_".$_POST["sl"] . ".png";

		if (move_uploaded_file($tempname, $folder)) {
		

		$_POST19['sl'] = $_POST['sl'];
		$_POST19['url'] = $folder;

		$exception15 = array('submit_form', 'page_name', 'table_name');
		$field15 = array_except($_POST19, $exception15);
		$pdo_obj15 = new Init_Table();
		$pdo_obj15->set_table($tbl_nm, "sl");
		foreach ($field15 as $key15 => $vl1) {
			$pdo_obj15->$key15 = $vl1;
		}
		$pdo_obj15->save();
		
		}

		$msg = "Data Update Successfully...";

	} else {


		$last_sl = $pdo_obj2->create();

		$filename = $_FILES["fileToUpload"]["name"];
		$tempname = $_FILES["fileToUpload"]["tmp_name"];
		$folder = "images/banner/" . $tstmp."_".$last_sl . ".png";

		if (move_uploaded_file($tempname, $folder)) {
			
		

		$_POST9['sl'] = $last_sl;
		$_POST9['url'] = $folder;

		$exception1 = array('submit_form', 'page_name', 'table_name');
		$field1 = array_except($_POST9, $exception1);
		$pdo_obj1 = new Init_Table();
		$pdo_obj1->set_table($tbl_nm, "sl");
		foreach ($field1 as $key1 => $vl1) {
			$pdo_obj1->$key1 = $vl1;
		}
		$pdo_obj1->save();
	}

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
		history.go(-1);;
	</script>
	<?php
}
?>