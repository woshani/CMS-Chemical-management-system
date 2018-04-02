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
        <title>ZeroWaste | Dashboard</title>
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
        <link rel="stylesheet" href="../bower_components/jquery-ui/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../dist/css/loading.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
              <script type="text/javascript" src="../bower_components/scannerQR/instascan.min.js"></script>
<!--               <style type="text/css">
                .infohover .hint {
                    display:none;
                }
                .infohover:hover .hint {
                        display:block;
                }
                .hint {background:yellow;padding:.5em;opacity:.9;float:right;}
              </style> -->
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
                <a href="../dashboard/dashboard.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>Z</b>W</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Zero</b>Waste</span>
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
                            <li class="dropdown notifications-menu hidden">
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
                            <img src="<?php echo $_SESSION['picture'];?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $_SESSION['fname']." <br/>".$_SESSION['lname'];?></p>
                            <p><?php echo $_SESSION['identifyid'];?></p>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu nav nav-sidebar" data-widget="tree">
                        <li class="header">Menus</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li class="active" id="liListChemical"><a href="#list_chemical" role="tab" data-toggle="tab"><i class="fa fa-list"></i> <span>List Chemical (Registered)</span></a></li>
                        <li class="" id="liListChemicalUsing"><a href="#list_chemical_using" role="tab" data-toggle="tab"><i class="fa fa-list"></i> <span>List Chemical (Using)</span></a></li>
                        <li class="" id="liregisChemical"><a href="#regis_chemical" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> <span>Register</span></a></li>
                        <li class=""><a href="#reuse_chemical" role="tab" data-toggle="tab"><i class="fa fa-recycle"></i> <span>Use</span></a></li>
                        <li class=""><a href="#return_chemical" role="tab" data-toggle="tab"><i class="fa fa-undo"></i> <span>Return</span></a></li>
                        <li class="" id="lidispose"><a href="#dispose_chemical" role="tab" data-toggle="tab"><i class="fa fa-trash"></i> <span>Dispose</span></a></li>
                        <li class="" id="lireport"><a href="#" role="tab" data-toggle="tab" onclick="window.open('chemicalPdfReport.php')"><i class="fa fa-file"></i> <span>Report</span></a></li>
                        <li class="" id="liapprovePrivate"><a href="#approve_chemical" role="tab" data-toggle="tab"><i class="fa fa-thumbs-up"></i> <span>List Request To Use(Private)</span></a></li>
                        <li class="" id="liapproveRegisChem"><a href="#approve_chemical_regis" role="tab" data-toggle="tab"><i class="fa fa-thumbs-up"></i> <span>Registration Request List</span></a></li>
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
                                <div role="tabpanel" class="tab-pane active" id="list_chemical">
                                    <h3 style="margin: 0px; padding: 0px;">List Chemical</h3>
                                    <hr/>
                                    <?php include 'list_chemical.php';?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="list_chemical_using">
                                    <h3 style="margin: 0px; padding: 0px;">List Chemical Using</h3>
                                    <hr/>
                                    <?php include 'list_chemical_using.php';?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="regis_chemical">
                                    <h3 style="margin: 0px; padding: 0px;">Register Chemical </h3>
                                    <hr/>
                                    <?php include 'register_chemical.php';?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="reuse_chemical">
                                    <h3 style="margin: 0px; padding: 0px;">Use Chemical</h3>
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
                                    <h3 style="margin: 0px; padding: 0px;">Approve Chemical To Use (Private)</h3>
                                    <hr/>
                                    <?php include 'approve_chemical.php';?>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="approve_chemical_regis">
                                    <h3 style="margin: 0px; padding: 0px;">Approve Chemical Registration</h3>
                                    <hr/>
                                    <?php include 'approve_chemical_registration.php';?>
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
                <strong>Copyright &copy; 2017 <a href="#">ZeroWaste</a>.</strong> All rights reserved.
            </footer>

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <div class="modalloader"><!-- Place at bottom of page --></div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- JQUERY UI -->
        <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="../bower_components/jquery-ui/ui/datepicker.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../bower_components/datatables.net/js/jquery.dataTables.js"></script>
        <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <script type="text/javascript">
            var $body = $("body");
            var role = "<?php echo $_SESSION['role'];?>";
            var supervisorid = "<?php echo $_SESSION['supervisorid'];?>";
            var useridxx = "<?php echo $_SESSION['userid'];?>";
            var identifyidxx = "<?php echo $_SESSION['identifyid'];?>"; 
        </script>
        <script src="../dist/js/manageChemical.js"></script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. -->
    </body>
</html>