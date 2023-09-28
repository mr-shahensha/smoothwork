<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include "membersonly.inc.php";
$Members  = new isLogged(1);
?>
 <?php
		

	

      $fld1['sl']='0';
      $op1['sl']=">, ";

      $list1  = new Init_Table();
      $list1->set_table("main_test","sl");
      $row=$list1->search_custom($fld1,$op1,'',array('sl' => 'ASC'));
		$path1="";
			?>
							<table class="table">
							<tr>
							<th width="10%">SL</th>
							<th width="80%">Test Type</th>
							<th width="10%" colspan="2">Action</th>
							</tr>
								<?php	
								$cnt=0;
                $pdo= new MainPDO();
								foreach ($row as $value) 
								{
									$cnt++;
									$sl=$value['sl'];
									$stat=$value['stat'];
											
	   if($stat==1)
	   {
		   $act_deact="<input type=\"button\" title=\"Click Here To Activate\" class=\"btn btn-xs btn-danger\" value=\"Deactive\" onclick=\"act('".$sl."','0','main_test')\" name=\"B2\">";
	   }
	   else
	   {
			$act_deact="<input type=\"button\" value=\"Active\" title=\"Click Here To Deactivate\" class=\"btn btn-xs btn-success\" onclick=\"act('".$sl."','1','main_test')\" name=\"B1\">";
	   }
		?>
									
									
									
									<tr>
									<td><?php echo $cnt;?></td>
                  <td><?php echo $value['ttl'];?></td>
									<td>
									<a href="test_edt.php?sl=<?php echo base64_encode($sl);?>"><input type="button" class="btn btn-primary btn-xs" value="Edit">
									</a>

									</td>
										<td class="text-center"><?php echo $act_deact;?></td>
									</tr>
									<?php
								}
							?>

</table>