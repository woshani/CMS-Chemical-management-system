<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php
  session_start();
  if(!isset($_SESSION['userid']))
{
    header("Location: ../index.html");
    exit;
} 
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CMS | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="../dashboard.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>C</b>MS</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>CMS</b>Dashboard</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Notifications Menu -->
                            <li class="dropdown notifications-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- Inner Menu: contains the notifications -->
                                        <ul class="menu">
                                            <li><!-- start notification -->
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <!-- end notification -->
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Sign Out Button -->
                            <li>
                                <a href="../out.php" class="btn"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Sign out</a>
                            </li>
                            <!-- End of Sign Out -->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></p>
                            <p><?php echo $_SESSION['identifyid'];?></p>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu nav nav-sidebar" data-widget="tree">
                        <li class="header">Menus</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li class="active"><a href="#regis_chemical" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> <span>Register</span></a></li>
                        <li class=""><a href="#reuse_chemical" role="tab" data-toggle="tab"><i class="fa fa-recycle"></i> <span>Reuse</span></a></li>
                        <li class=""><a href="#return_chemical" role="tab" data-toggle="tab"><i class="fa fa-undo"></i> <span>Return</span></a></li>
                        <li class=""><a href="#dispose_chemical" role="tab" data-toggle="tab"><i class="fa fa-trash"></i> <span>Dispose</span></a></li>
                        <li class=""><a href="#approve_chemical" role="tab" data-toggle="tab"><i class="fa fa-thumbs-up"></i> <span>Approve(Private)</span></a></li>
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Chemical
                        <small>Chemical Management System</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <div class="row col-md-12">
                        <div class="thumbnail">
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="regis_chemical">
                                    <h3 style="margin: 0px; padding: 0px;">Register Chemical </h3>
                                    <hr/>
                                    <?php include 'register_chemical.php';?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="reuse_chemical">
                                    <h3 style="margin: 0px; padding: 0px;">Reuse Chemical</h3>
                                    <hr/>
                                    <?php include 'reuse_chemical.php';?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="return_chemical">
                                    <h3 style="margin: 0px; padding: 0px;">Return Chemical</h3>
                                    <hr/>
                                    <?php include 'return_chemical.php';?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="dispose_chemical">
                                    <h3 style="margin: 0px; padding: 0px;">Dispose Chemical</h3>
                                    <hr/>
                                    <?php include 'dispose_chemical.php';?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="approve_chemical">
                                    <h3 style="margin: 0px; padding: 0px;">Approve Chemical</h3>
                                    <hr/>
                                    <?php include 'approve_chemical.php';?>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    Chemical Management System
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2017 <a href="#">Company SPM</a>.</strong> All rights reserved.
            </footer>

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- JQUERY UI -->
        <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>

		<script type="text/javascript">
            $(document).ready(function(){
                $('#datetimepickerIN').datepicker();
                $('#datetimepickerEXP').datepicker();

            });

             $("#owner").on('keyup', function () { 
                    var input = $(this).val(); 
                    if (input.length >= 2) { 
                        $('#matchOwner').html('<img src="../img/LoaderIcon.gif"/>'); 
                        var dataFields = {'input': input};
                        $.ajax({
                            type: "POST",
                            url: "function/searchOwner.php",
                            data: dataFields, 
                            timeout: 3000,
                            success: function (dataBack) { 
                                $('#matchOwner').html(dataBack); 
                                $('#matchListOwner li').on('click', function () { 
                                    $('#owner').val($(this).text());
                                    $('#matchOwner').text('');
                                    searchOwnerid(); 
                                });
                            },
                            error: function () { 
                                $('#matchOwner').text('Problem!');
                            }
                        });
                    } else {
                        $('#matchOwner').text('');
                    }
            });

             function searchOwnerid() {
                var id = $.trim($('#matchOwner').val());
                console.log(id);
                $.ajax({
                    type: 'post',
                    url: 'function/searchOwnerID.php',
                    data: {'input': id},
                    success: function (reply_data) {
                      console.log(reply_data);
                      var array_data = reply_data.split("|");
                      var email = array_data[1];
                      var userid = array_data[0];
                      $('#ownerID').val(userid.trim());
                    }
                });

            }

            $("#Chemicalname").on('keyup', function () { 
                    var input = $(this).val(); 
                    if (input.length >= 2) { 
                        $('#matchChemical').html('<img src="../img/LoaderIcon.gif"/>'); 
                        var dataFields = {'input': input};
                        $.ajax({
                            type: "POST",
                            url: "function/searchChemical.php",
                            data: dataFields, 
                            timeout: 3000,
                            success: function (dataBack) { 
                                $('#matchChemical').html(dataBack); 
                                $('#matchListChemical li').on('click', function () { 
                                    $('#Chemicalname').val($(this).text());
                                    $('#matchChemical').text('');
                                    searchChemicalid(); 
                                });
                            },
                            error: function () { 
                                $('#matchChemical').text('Problem!');
                            }
                        });
                    } else {
                        $('#matchChemical').text('');
                    }
            });

             function searchChemicalid() {

                var id = $.trim($('#Chemicalname').val());
                console.log(id);
                $.ajax({
                    type: 'post',
                    url: 'function/searchChemicalID.php',
                    data: {'input': id},
                    success: function (reply_data) {
                      console.log(reply_data);
                      var array_data = reply_data.split("|");
                      var name = array_data[1];
                      var id = array_data[0];
                      var typeC = array_data[2];
                      var physicalType = array_data[3];
                      var engcontrol = array_data[4];
                      var ppe = array_data[5];
                      $('#chemicalID').val(id.trim());
                      $('#type').val(typeC.trim());
                      $('input[name=eng][value=' + engcontrol.trim() + ']').prop('checked',true);
                      $('input[name=ppe][value=' + ppe.trim() + ']').prop('checked',true);
                    }
                });

            }

            $('#insert_btn').on('click',function(e){
                e.preventDefault();
                var id_chemical = $('#chemicalID').val();
                var id_owner  = $('#ownerID').val();
                var id_lab = $('#lab').val();
                var datein = $('#datein').val();
                var dateexp = $('#expired').val();
                var status = $('#status').val();
                var chemical_type = $('#type').val();

            });    
        </script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. -->
    </body>
</html>