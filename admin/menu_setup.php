<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);
if (isset($_REQUEST['pnm'])) {
	$page_title = base64_decode($_REQUEST['pnm']);
} else {
	$page_title = "Dashboard";
}
include "membersonly.inc.php";
$Members  = new isLogged(1);
$pdo = new MainPDO();
include "header.php";
function searchForId($id, $array, $chkfld, $sendfld)
{

	foreach ($array as $val) {
		if ($val[$chkfld] == $id) {
			return $val[$sendfld];
		}
	}
	return 'root';
}
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="dist/img/sw.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo $Members->User_Details->name; ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<?php echo include "left_bar.php"; ?>
	</section>
	<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $page_title; ?>
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><?php echo $page_title; ?></li>
		</ol>
	</section>
	<?php

	$adtl  = new Init_Table();
	$adtl->set_table("main_menu", "sl");
	$row = $adtl->all();

	$adtl_signup  = new Init_Table();
	$adtl_signup->set_table("main_signup", "username");
	$row_signup = $adtl_signup->all();
	?>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Menu Setup</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<form class="form-inline form-bordered" action="submit.php" method="POST">

							<div class="row">
								<div class="form-group col-md-3">
									<label>
										<b>
											<font color="#ed2618"></font> Menu :
										</b>
									</label>
									<select id="rmsl" name="rmsl" class="form-control" style="width:100%">
										<option value="">---Select---</option>
										<option value="0">root</option>
										<?php
										foreach ($row as $value) {
											$mnm = $value['mnm'];
											$sl = $value['sl'];
										?>
											<option value="<?php echo $sl; ?>"><?php echo $mnm; ?></option>
										<?php
										}

										?>
									</select>
								</div>

								<div class="form-group col-md-3">
									<label>
										<b>
											<font color="#ed2618"></font> Menu Name :
										</b>
									</label>
									<input type="text" id="mnm" name="mnm" class="form-control" value="" style="width:100%">
								</div>
								<div class="form-group col-md-3">
									<label>
										<b>
											<font color="#ed2618"></font> Page Name :
										</b>
									</label>
									<input type="text" id="page" name="page" class="form-control" value="" style="width:100%">
								</div>
								<div class="form-group col-md-3">
									<label>
										<b>
											<font color="#ed2618"></font> Order :
										</b>
									</label>
									<input type="number" id="ordr" name="ordr" class="form-control" value="" style="width:100%">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-md-12" style="text-align:right;">
									<p>
										<br>
										<input type="submit" class="btn btn-primary" value="Submit">
									</p>
								</div>
							</div>
							<input type="hidden" name="table_name" value="main_menu" class="form-control" placeholder="Form Description" />
						</form>


					</div>
					<!-- /.box body -->
				</div>

				<!-- /.box -->
			</div>
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Menu List</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<table class="table">
							<tr>
								<th>SL</th>
								<th>Main Menu Name</th>
								<th>Menu Name</th>
								<th>Page Name</th>
								<th>Order</th>
								<th>Assign To</th>
								<th>Action</th>
							</tr>
							<?php
							$cnt = 0;
							foreach ($row as $value) {
								$cnt++;
								$mnm = $value['mnm'];
								$sl = $value['sl'];
								$page = $value['page'];
								$ordr = $value['ordr'];
								$rmsl = $value['rmsl'];
								$user = $value['user'];
								$zz = searchForId($rmsl, $row, 'sl', 'mnm');
							?>
								<tr>
									<td><?php echo $cnt; ?></td>
									<td><?php echo $zz; ?></td>
									<td><?php echo $mnm; ?></td>
									<td><?php echo $page; ?></td>
									<td><?php echo $ordr; ?></td>
									<td><?php
										$xsd = explode(',', $user);
										$mntt = 0;
										for ($ii = 0; $ii < count($xsd); $ii++) {
											$mntt++;
											$xsd_user = $xsd[$ii];
											$zzg = $pdo->get_value('main_user_typ', 'typ', array('lvl' => $xsd_user));

											//	$zzg=searchForId($xsd_user,$row_signup,'username','name');
											if ($zzg == 'root') {
												$zzg1 = "";
											} else {
												$zzg1 = $mntt . ")" . $zzg;
											}
											echo $zzg1 . "<br>";
										}


										?></td>
									<td>
										<input type="button" onclick="assign('<?php echo base64_encode($sl); ?>')" class="btn btn-success btn-xs" value="Assign">
										<a href="menu_edit.php?sl=<?php echo base64_encode($sl); ?>"><input type="button" class="btn btn-primary btn-xs" value="Edit">
										</a>
									</td>
								</tr>
							<?php
							}
							?>

						</table>

					</div>
					<!-- /.box body -->
				</div>

				<!-- /.box -->
			</div>

		</div>
		<div class="modal fade" id="modal1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Choose User</h4>
					</div>
					<div class="modal-body" id="cnt1">

					</div>

					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>

					</div>
				</div>
			</div>
		</div>


	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">

	<strong>Copyright &copy; 2019-2020 </strong> All rights reserved. Designed & Developed By <a href="http://onnetsolution.com">Onnet Solution Infotech Pvt. Ltd.</a>.
</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script>
	function assign(sl) {

		$('#cnt1').load('assign.php?sl=' + sl).fadeIn("fast");
		$('#modal1').modal('show');
	}
</script>


</body>

</html>