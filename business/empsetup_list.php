<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);

$fld1['sl'] = '0';
$op1['sl'] = ">, ";

$list1  = new Init_Table();
$list1->set_table("main_employee_setup", "sl");
$row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
$path1 = "";
?>
<table class="table">
	<tr>
		<th width="10%">SL</th>
		<th width="15%">Name</th>
		<th width="15%">Number</th>
		<th width="10%">Adhaar Number</th>
		<th width="10%">Experience</th>
		<th width="20%">Adress</th>
		<th width="10%">Estimated salary</th>
		<th width="10%">Action</th>
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
			<td><?php echo $value['enm']; ?></td>
			<td><?php echo $value['enum']; ?></td>
			<td><?php echo $value['eadnum']; ?></td>
			<td><?php echo $value['eex']; ?></td>
			<td><?php echo $value['eadrs']; ?></td>
			<td><?php echo $value['ees']; ?></td>
			<td>
				<a href="empsetup_edt.php?sl=<?php echo base64_encode($sl); ?>" class="btn btn-primary btn-xs" target="_blank">Edit
				</a>
			</td>
		</tr>
	<?php
	}
	?>

</table>