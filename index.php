<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ZeroWaste | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.1.2/css/ionicons.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css" />
  <!-- iCheck -->
<!--   <link rel="stylesheet" href="plugins/iCheck/square/purple.css"> -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css" />


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
    <a href="index.html"><b>ZeroWaste Application</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Matric/Staff ID" id="userid">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="pass">
        <span class="fa fa-key form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="button" class="btn btn-primary btn-block btn-flat" id="btnSignIn">Sign In</button>
          <a href="registration/register.php" class="btn btn-default btn-block btn-flat btn-sm">Student Registration</a>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/plugins/md5/jquery.md5.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
    $('#btnSignIn').on('click',function(){
        login();
    });

    $('#pass').keypress(function(e) {
      if(e.which == 13) {
          login();
      }
    });

    function login(){
        var userid = $('#userid').val();
        var pass = $.md5($('#pass').val());
        console.log(userid + " "+pass);
        $.ajax({
          type:"post",
          url:"login.php",
          data:{'userid':userid,'password':pass},
          success:function(databack){
            console.log(databack);
            if(databack.trim()==="valid"){
              window.location.href="/dashboard/dashboard.php";
            }else if(databack.trim()==="pending"){
              alert("Your account still pending verivication from supervisor,please contact your supervisor");
            }else if(databack.trim()==="reject"){
              alert("Your account has been rejected from supervisor,please contact your supervisor");
            }else{
              alert("Wrong password or ID");
            }
          }
        })      
    }
</script>
</body>
</html>