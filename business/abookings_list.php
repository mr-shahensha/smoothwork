<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);

$fld1['sl'] = '0';
$op1['sl'] = ">, ";

$list1  = new Init_Table();
$list1->set_table("main_order_cart", "sl");
$row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
$path1 = "";
?>
<style>
    th{
        text-align: center;
    }
    td{
        text-align: center;
    }
</style>
<table class="table">
	<tr>
		<th width="10%">SL</th>
		<th width="15%">Assign to</th>
		<th width="15%">Service name</th>
		<th width="10%">From time</th>
		<th width="10%">To time</th>
		<th width="10%">Price</th>
		<th width="10%">Purchased by </th>
		<th width="20%" >Action</th>
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
			<td><?php echo $value['bast']; ?></td>
			<td><?php echo $value['bsnm']; ?></td>
			<td><?php echo $value['bftm']; ?></td>
			<td><?php echo $value['bttm']; ?></td>
			<td><?php echo $value['bprc']; ?></td>
			<td><?php echo $value['bpby']; ?></td>
			<td>
				<a href="abookings_edt.php?stat=1&sl=<?php echo base64_encode($sl); ?>" class="btn btn-primary btn-xs" >Edit
				</a>
                <a href="abookings_edt.php?stat=2&sl=<?php echo base64_encode($sl); ?>" class="btn btn-success btn-xs" >Order
				</a><a href="abookings_edt.php?stat=3&sl=<?php echo base64_encode($sl); ?>" class="btn btn-danger btn-xs" >Delete
				</a>
			</td>
		</tr>
	<?php
	}
	?>

</table>