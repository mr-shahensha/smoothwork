<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members = new isLogged(1);
$pdo = new MainPDO();

$fld1['sl'] = '0';
$op1['sl'] = ">, ";

$list1 = new Init_Table();
$list1->set_table("main_test_photo", "sl");
$group = $list1->search_custom($fld1, $op1, '', array('sl' => 'DESC'));

?>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>#</th>
			<td align=""><b>Title</b></td>
			<td align="center"><b>Images</b></td>
			<td align="center"><b>Edit</b></td>
			<td align=""><b>Action</b></td>

		</tr>
	</thead>
	<tbody>
		<?php
		$sln = 0;
		foreach ($group as $key => $ptp) {
			$x = $ptp['sl'];
			$stat = $ptp['stat'];
			$title = $ptp['ttl'];
			$url = $ptp['url'];
			
			if($url!=""){
			$path=$url; 
			}else{$path="images/blnk.png";}
			$sln++;

			if ($stat == 1) {
				$act_deact = "<input type=\"button\" title=\"Click Here To Activate\" class=\"btn btn-xs btn-danger\" value=\"Deactive\" onclick=\"act('" . $x . "','0','main_test_photo')\" name=\"B2\">";
			} else {
				$act_deact = "<input type=\"button\" value=\"Active\" title=\"Click Here To Deactivate\" class=\"btn btn-xs btn-success\" onclick=\"act('" . $x . "','1','main_test_photo')\" name=\"B1\">";
			}
			?>
			<tr>
				<td>
					<?php echo $sln; ?>
				</td>
				<td>
					<?php echo $title; ?>
				</td>
				<td align="center"><img src="<?php echo $path;?>" width="270" height="70"></td>

				<td class="text-center"><a href="test_photo_edit.php?sl=<?php echo base64_encode($x); ?>">
						<button class="btn btn-xs btn-warning"> Edit</button></a>
				</td>
				<td>
					<?php echo $act_deact; ?>
				</td>



			</tr>
			<?php
		}
		?>
	</tbody>
</table>