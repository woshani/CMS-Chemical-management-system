<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ZeroWaste | Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.1.2/css/ionicons.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css" />
  <!-- iCheck -->
<!--   <link rel="stylesheet" href="plugins/iCheck/square/purple.css"> -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css" />
  <link rel="stylesheet" href="../dist/css/loading.css" />

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
    <p class="login-box-msg">New Student Registration</p>

    <form>
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
        <input type="text" class="form-control" placeholder="Email" id="email">
		<input type="hidden" class="form-control"  id="sub" value="ZeroWaste - User Authentication Request">
        <input type="hidden" class="form-control"  id="message" value="Please Check ZeroWaste account to accept / reject user autentication request">
        <span class=" form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Phone No" id="telno">
        <span class=" form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Supervisor/Lecturer Name" id="supervisorId">
        <input type="hidden" class="form-control"  id="supervisor">
		<input type="hidden" class="form-control"  id="supervisorEmail">
        <input type="hidden" class="form-control"  id="admin" value="No">
        <input type="hidden" class="form-control"  id="role" value="Student">
        <span class=" form-control-feedback"></span>
        <div id="matchSupervisor"></div>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password">
        <span class="fa fa-key form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button id="btnRegister" name="btnRegister" class="btn btn-success btn-block btn-flat">Register</button>
          <a href="../index.html" class="btn btn-default btn-block btn-flat btn-sm">Back to Sign In</a>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<div class="modalloader"><!-- Place at bottom of page --></div>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>


	<script>
    var $body = $("body");
            $('#btnRegister').on('click',function(e){
                $body.addClass("loading");
                e.preventDefault();
                var fname = $('#fname').val();
                var lname = $('#lname').val();
				var email = $('#email').val();
                var telno = $('#telno').val();
                var role = $('#role').val();
                var admin = $('#admin').val();
                var identifyId = $('#identifyId').val();
                var password = $('#password').val();
                var supervisorId = $('#supervisor').val();
				var supervisorEmail = $('#supervisorEmail').val();
				var sub = $('#sub').val();
                var message = $('#message').val();
                
                if(identifyId==="" || password==="" || fname==="" || lname==="" || email==="" || telno==="" || supervisorId==""){
                  alert("Please fill in all fields to proceed with registration");
                }else{
                    $.ajax({
                     type:"post",
                     url:"query/registerUser.php",
                     data:{"fname":fname,"lname":lname,"email":email,"telno":telno,"role":role,"admin":admin,"identifyId":identifyId,"password":password,"supervisorId":supervisorId,"sub":sub,"message":message,"supervisorEmail":supervisorEmail},
                     success:function(databack){
                      $body.removeClass("loading");
                         console.log(databack);
                         if(databack.trim()==="success"){
                             alert("Registration succeed!,Please wait for supervisor approval to Log in.");
                             window.location = "../index.html";
                         }else{
                             alert("Registration Fail,Something wrong and please try again later");
                         }
                     }
                    });
                }
            });


 $("#supervisorId").on('keyup', function () { 
        var input = $(this).val(); 
        if (input.length >= 2) { 
            $('#matcEMPoccu').html('<img src="../img/LoaderIcon.gif"/>'); 
            var dataFields = {'input': input};
            $.ajax({
                type: "POST",
                url: "query/searchSupervisor.php",
                data: dataFields, 
                timeout: 3000,
                success: function (dataBack) { 
                    $('#matchSupervisor').html(dataBack); 
                    $('#matchListSupervisor li').on('click', function () { 
                        $('#supervisorId').val($(this).text());
                        $('#matchSupervisor').text('');
                        searchSVid(); 
                    });
                },
                error: function () { 
                    $('#matchSupervisor').text('Problem!');
                }
            });
        } else {
            $('#matchSupervisor').text('');
        }
});

 function searchSVid() {

    var id = $.trim($('#supervisorId').val());
    console.log(id);
    $.ajax({
        type: 'post',
        url: 'query/searchSupervisorID.php',
        data: {'input': id},
        success: function (reply_data) {
          console.log(reply_data);
          var array_data = reply_data.split("|");
          var email = array_data[1];
          var userid = array_data[0];
          $('#supervisor').val(userid.trim());
		      $('#supervisorEmail').val(email.trim());
        }
    });

}

	</script>
</body>
</html>