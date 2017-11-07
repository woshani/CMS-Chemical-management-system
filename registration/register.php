<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CMS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
<!--   <link rel="stylesheet" href="plugins/iCheck/square/purple.css"> -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page skin-purple">
<div class="login-box">
  <div class="login-logo">
    <a href="index.html"><b>CMS-</b>Chemical Management System</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Registration</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Matric ID" id="identifyId">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="First Name" id="fname">
        <span class=" form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Last Name" id="lname">
        <span class=" form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Supervisor/Lecturer Name" id="supervisorId">
        <input type="hidden" class="form-control"  id="supervisor" value="0">
        <input type="hidden" class="form-control"  id="admin" value="no">
        <input type="hidden" class="form-control"  id="role" value="pending">
        <span class=" form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password">
        <span class="fa fa-key form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button id="btnRegister" name="btnRegister" type="submit" class="btn btn-success btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="../index.html" class="text-center">Back to Sign In</a>

  </div>
  <!-- /.login-box-body -->
</div>

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>



	<script>
            $('#btnRegister').on('click',function(){
                
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var role = $('#role').val();
                var admin = $('#admin').val();
                var identifyId = $('#identifyId').val();
                var password = $('#password').val();
                var supervisorId = $('#supervisorId').val();
          
                $.ajax({
                   type:"post",
                   url:"query/registerUser.php",
                   data:{"fname":fname,"lname":lname,"role":role,"admin":admin,"identifyId":identifyId,"password":password,"supervisorId":supervisorId},
                   success:function(databack){
                       console.log(databack);
                       if(databack.trim()==="1"){
                           alert("berjaya");
                       }else{
                           alert("gagal");
                       }
                   }
                });
            });
	</script>
</body>
</html>