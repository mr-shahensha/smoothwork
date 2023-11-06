<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
if (isset($_REQUEST['pnm'])) {
    $page_title = base64_decode($_REQUEST['pnm']);
} else {
    $page_title = "View Services";
}
include "membersonly.inc.php";
$Members  = new isLogged(1);
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
                <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
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
    <!-- Main content -->
    <style>

        .wrapper {
            width: 100%;
            height: 100%;

        }

        .banner-image {
            background-image: url(https://images.unsplash.com/photo-1641326201918-3cafc641038e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80);
            background-position: center;
            background-size: cover;
            height: 250px;
            width: 100%;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.255)
        }

        h1 {
            font-family: 'Righteous', sans-serif;
            color: rgba(255, 255, 255, 0.98);
            text-transform: uppercase;
            font-size: 2.4rem;
        }

        p {
            color: #fff;
            font-family: 'Lato', sans-serif;
            text-align: center;
            font-size: 0.8rem;
            line-height: 150%;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .button-wrapper {
            margin-top: 18px;
        }

        .btn {
            border: none;
            padding: 12px 24px;
            border-radius: 24px;
            font-size: 12px;
            font-size: 0.8rem;
            letter-spacing: 2px;
            cursor: pointer;
        }

        .btn+.btn {
            margin-left: 10px;
        }

        .outline {
            background: transparent;
            color: rgba(0, 212, 255, 0.9);
            border: 1px solid rgba(0, 212, 255, 0.6);
            transition: all .3s ease;

        }

        .outline:hover {
            transform: scale(1.125);
            color: rgba(255, 255, 255, 0.9);
            border-color: rgba(255, 255, 255, 0.9);
            transition: all .3s ease;
        }

        .fill {
            background: rgba(0, 212, 255, 0.9);
            color: rgba(255, 255, 255, 0.95);
            filter: drop-shadow(0);
            font-weight: bold;
            transition: all .3s ease;
        }

        .fill:hover {
            transform: scale(1.125);
            border-color: rgba(255, 255, 255, 0.9);
            filter: drop-shadow(0 10px 5px rgba(0, 0, 0, 0.125));
            transition: all .3s ease;
        }
    </style>




    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $page_title; ?> List</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body" id="show">



                                <div class="row">
                                    <div class="col-md-12">

                                    
                                        <div class="col-md-4">
                                            <div class="wrapper">
                                                <div class="banner-image"> </div>
                                                <h1 class="text-center"> Toyota Supra</h1>
                                                <p>Lorem ipsum dolor sit amet, <br />
                                                    consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="button-wrapper">
                                                <button class="btn outline">DETAILS</button>
                                                <button class="btn fill">BUY NOW</button>
                                                <button class="btn fill">BUY NOW</button>
                                            </div>
                                        </div>
                             
                                 
                                    </div>
                                </div>





                        <?php
                        $fld1['sl'] = '0';
                        $op1['sl'] = ">, ";

                        $list1  = new Init_Table();
                        $list1->set_table("main_service_setup", "sl");
                        $row = $list1->search_custom($fld1, $op1, '', array('sl' => 'ASC'));
                        $path1 = "";
                        $cnt = 0;
                        $pdo = new MainPDO();
                        foreach ($row as $value) {
                        ?>
                            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                                <div class="card card-inverse card-info">
                                    <img class="card-img-top" src="https://picsum.photos/200/150/?random">
                                    <div class="card-block">
                                        <figure class="profile profile-inline">
                                            <img src="https://picsum.photos/200/150/?random" class="profile-avatar" alt="">
                                        </figure>
                                        <h4 class="card-title"><?php echo $value['snm']; ?></h4>
                                        <div class="card-text">
                                            <?php echo $value['sdsc']; ?>
                                            <?php
                                            $string = $value['sast'];
                                            $nsast = array();
                                            $nsast = explode(",", $string, 2);
                                            $i = sizeof($nsast);
                                            $x = 0;
                                            while ($x < $i) {
                                                $fld1x['eid'] = $nsast[$x];
                                                $op1x['eid'] = "=, ";

                                                $list1x  = new Init_Table();
                                                $list1x->set_table("main_employee_setup", "sl");
                                                $rowx = $list1x->search_custom($fld1x, $op1x, '', array('sl' => 'ASC'));
                                                $path1 = "";
                                                foreach ($rowx as $valuex) {
                                                }

                                                echo "<p>" . $valuex['enm'] . "</p>";
                                                $x++;
                                            } ?>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <div class="col-md-4 pr-50">
                                            <a href="edt_service_setup.php?sl=<?php echo $value['sl']; ?>" target="_blank" class="btn btn-info btn-sm">Edit</a>
                                        </div>
                                        <div id="acdc<?php echo $value['sl']; ?>">
                                            <?php
                                            if ($value['status'] == 0) {
                                            ?>
                                                <div class="col-md-4 pr-50">
                                                    <button class="btn btn-danger btn-sm" onclick="acdc('1',<?php echo $value['sl']; ?>)">Deactive</button>
                                                </div>
                                            <?php
                                            } else if ($value['status'] == 1) {
                                            ?>
                                                <div class="col-md-4 pr-50">
                                                    <button class="btn btn-success btn-sm" onclick="acdc('0',<?php echo $value['sl']; ?>)">Active</button>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <button class="btn btn-primary btn-sm" onclick="delcard(<?php echo $value['sl']; ?>)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>



                    <!-- /.box body -->
                </div>
                <!-- /.box -->
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


<style>
    html {
        font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
        font-size: 14px;
    }

    h5 {
        font-size: 1.28571429em;
        font-weight: 700;
        line-height: 1.2857em;
        margin: 0;
    }

    .card {
        font-size: 1em;
        overflow: hidden;
        padding: 0;
        border: none;
        border-radius: .28571429rem;
        box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
    }

    .card-block {
        font-size: 1em;
        position: relative;
        margin: 0;
        padding: 1em;
        border: none;
        border-top: 1px solid rgba(34, 36, 38, .1);
        box-shadow: none;
    }

    .card-img-top {
        display: block;
        width: 100%;
        height: auto;
    }

    .card-title {
        font-size: 1.28571429em;
        font-weight: 700;
        line-height: 1.2857em;
    }

    .card-text {
        clear: both;
        margin-top: .5em;
        color: rgba(0, 0, 0, .68);
    }

    .card-footer {
        font-size: 1em;
        position: static;
        top: 0;
        left: 0;
        max-width: 100%;
        padding: .75em 1em;
        color: rgba(0, 0, 0, .4);
        border-top: 1px solid rgba(0, 0, 0, .05) !important;
        background: #fff;
    }

    .card-inverse .btn {
        border: 1px solid rgba(0, 0, 0, .05);
    }

    .profile {
        position: absolute;
        top: -12px;
        display: inline-block;
        overflow: hidden;
        box-sizing: border-box;
        width: 25px;
        height: 25px;
        margin: 0;
        border: 1px solid #fff;
        border-radius: 50%;
    }

    .profile-avatar {
        display: block;
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }

    .profile-inline {
        position: relative;
        top: 0;
        display: inline-block;
    }

    .profile-inline~.card-title {
        display: inline-block;
        margin-left: 4px;
        vertical-align: top;
    }

    .text-bold {
        font-weight: 700;
    }

    .meta {
        font-size: 1em;
        color: rgba(0, 0, 0, .4);
    }

    .meta a {
        text-decoration: none;
        color: rgba(0, 0, 0, .4);
    }

    .meta a:hover {
        color: rgba(0, 0, 0, .87);
    }
</style>
<script>
    function acdc(v, sl) {
        if (confirm("are you sure") == true) {
            $('#acdc' + sl).load('clacdc.php?val=' + v + '&sl=' + sl).fadeIn('fast');
            if (v == 0) {
                alert('successfully deactivated');

            } else {
                alert('successfully activated');

            }
        }
    }

    function delcard(sl) {
        if (confirm("are you sure") == true) {
            $('#del' + sl).load('delcard.php?&sl=' + sl).fadeIn('fast');
        }
    }
</script>


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

<link rel="stylesheet" href="chosen.css">
<script src="chosen.jquery.js" type="text/javascript"></script>
<script src="prism.js" type="text/javascript" charset="utf-8"></script>

</body>

</html>