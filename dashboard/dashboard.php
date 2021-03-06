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
<!-- <?php echo $_SESSION['role'];?>
 --><html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ZeroWaste | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.1.2/css/ionicons.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css" />
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css" />

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
    <a href="dashboard.php" class="logo">
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
          <img src="<?php echo $_SESSION['picture'];?>" class="img-circle" height="45" width="45" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['fname'];?></p>
          <?php echo $_SESSION['identifyid'];?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menus</li>
        <li><a href="../MA/index.php"><i class="fa fa-user-circle"></i> <span>Manage Account</span></a></li>
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
        Dashboard
        <small>Chemical Management System</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="row">
        <div class="col-md-12">
            <div class="col-xs-6 col-sm-6 col-md-3" id="MSM">
              <a href="../MS/index.php" class="thumbnail">
                <div class="text-center">
                  <i class="fa fa-users" aria-hidden="true" style="color: gray;font-size: 4em;"></i>
                  <h3>Manage Students</h3>
                </div>
              </a>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3" id="MCM">
              <a href="../MC/index.php" class="thumbnail">
                <div class="text-center">
                  <i class="fa fa-flask" aria-hidden="true" style="color: green;font-size: 4em;"></i>
                  <h3>Manage Chemicals</h3>
                </div>
              </a>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3" id="MLM">
              <a href="../ML/index.php" class="thumbnail">
                <div class="text-center">
                  <i class="fa fa-building-o" aria-hidden="true" style="color: #337ab7;font-size: 4em;"></i>
                  <h3>Manage Labs</h3>
                </div>
              </a>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3" id="ADM">
              <a href="../AD/index.php" class="thumbnail">
                <div class="text-center">
                  <i class="fa fa-unlock-alt" aria-hidden="true" style="color: #337ab7;font-size: 4em;"></i>
                  <h3>Admin Menu</h3>
                </div>
              </a>
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
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var role = "<?php echo $_SESSION['role'];?>";
    var admin = "<?php echo $_SESSION['admin'];?>";
    console.log(role);
        switch(role) {
        case "Student":
            $('#MSM').hide();
            $('#MLM').hide();
            $('#ADM').hide();
            $('#MCM').show();
            break;
        case "Lecturer":
            if(admin==="No"){
              $('#MLM').hide();
              $('#ADM').hide();
              $('#MSM').show();
              $('#MCM').show();
            }else{
              $('#MLM').show();
              $('#MSM').show();
              $('#MCM').show();
              $('#ADM').show();
            }
            
            break;
        case "PJ":
            if(admin==="No"){
              $('#MLM').show();
              $('#MSM').hide();
              $('#ADM').hide();
              $('#MCM').show();
            }else{
              $('#MLM').show();
              $('#MSM').hide();
              $('#MCM').show();
              $('#ADM').show();
            }
            break;
        default:
            $('#MSM').hide();
            $('#MLM').show();
            $('#MCM').show();
            $('#ADM').show();
          }
  });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>