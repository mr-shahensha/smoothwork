<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
$servnm = $_REQUEST['servnm'];
$bdt = $_REQUEST['bdt'];
$assign = $_REQUEST['assign'];
if($assign!=''){
	$fld1['assign'] = $assign;
	$op1['assign'] = "=, and";
}
$fld1['bdt'] = $bdt;
$op1['bdt'] = "=, and";
$fld1['servnm'] = $servnm;
$op1['servnm'] = "=, and";
$fld1['sl'] = '0';
$op1['sl'] = ">, ";

$list1  = new Init_Table();
$list1->set_table("main_cart", "sl");
$row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
$path1 = "";
?>

<table class="table">
	<tr>
		<th width="10%">SL</th>
		<th width="15%">Assign to</th>
		<th width="15%">Service name</th>
		<th width="10%">From time</th>
		<th width="10%">To time</th>
		<th width="10%">Price</th>
		<th width="10%">Purchased by </th>
		<th width="20%">Action</th>
	</tr>
	<?php
	$cnt = 0;
	$pdo = new MainPDO();
	foreach ($row as $value) {
		$cnt++;
		$sl = $value['sl'];
	?>
		<tr>
			<td><?php echo $cnt; ?></td>
			<td><?php 
			
			$fld011['eid'] = $value['assign'];
			$op011['eid'] = "=, ";

			$list011  = new Init_Table();
			$list011->set_table("main_employee_setup", "sl");
			$row01 = $list011->search_custom($fld011, $op011, '', array('sl' => 'ASC'));
			foreach ($row01 as $value01) {
			}
			
			
			echo $value01['enm']; ?></td>
			<td><?php
				$fld11['s_id'] = $value['servnm'];
				$op11['s_id'] = "=, ";

				$list11  = new Init_Table();
				$list11->set_table("main_service_setup", "sl");
				$row1 = $list11->search_custom($fld11, $op11, '', array('sl' => 'ASC'));
				foreach ($row1 as $value1) {
				}
				echo $value1['snm'];

				?></td>
			<td><?php echo $value['ftm']; ?></td>
			<td><?php echo $value['ttm']; ?></td>
			<td><?php echo $value['price']; ?></td>
			<td><?php echo $value['prchby']; ?></td>
			<td>
				<input type="hidden" name="" id="nsl" value="<?php echo $sl; ?>">
				<div id="show<?php echo $sl; ?>">
					<input type="button" value="Edit" class="btn btn-primary btn-xs" onclick="actn('1','<?php echo  $sl; ?>')">
					<input type="button" value="Order" class="btn btn-success btn-xs" onclick="actn('2','<?php echo  $sl; ?>')">
					<input type="button" value="Delete" class="btn btn-danger btn-xs" onclick="actn('3','<?php echo  $sl; ?>')">
				</div>
			</td>
		</tr>
	<?php
	}
	?>

</table>

<script>
	function actn(stat, sl) {
		//var nsl=document.getElementById('nsl').value;
		if (stat == '3') {
			let text = "Are you sure ?";
			if (confirm(text) == true) {
				$('#show' + sl).load('abookings_edt.php?sl=' + sl + '&stat=' + stat).fadeIn('fast');
			}
		} else if (stat == '2') {
			$('#show' + sl).load('abookings_edt.php?sl=' + sl + '&stat=' + stat).fadeIn('fast');

		}
	}
</script>