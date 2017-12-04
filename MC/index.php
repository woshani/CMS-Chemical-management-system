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
                    <span class="logo-mini"><b>Zero</b>Waste</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>ZeroWaste</b>Dashboard</span>
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
                        <li class="active" id="liListChemical"><a href="#list_chemical" role="tab" data-toggle="tab"><i class="fa fa-list"></i> <span>List Chemical</span></a></li>
                        <li class="" id="liregisChemical"><a href="#regis_chemical" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> <span>Register</span></a></li>
                        <li class=""><a href="#reuse_chemical" role="tab" data-toggle="tab"><i class="fa fa-recycle"></i> <span>Reuse</span></a></li>
                        <li class=""><a href="#return_chemical" role="tab" data-toggle="tab"><i class="fa fa-undo"></i> <span>Return</span></a></li>
                        <li class="" id="liapprovePrivate"><a href="#approve_chemical" role="tab" data-toggle="tab"><i class="fa fa-thumbs-up"></i> <span>Approve(Private)</span></a></li>
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
                                <div role="tabpanel" class="tab-pane" id="regis_chemical">
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
            // this for create object for qr scanner
            let scannerReuse = new Instascan.Scanner({ video: document.getElementById('camReuse') });
            let scannerReturn = new Instascan.Scanner({ video: document.getElementById('camReturn') });
            let scannerRegister = new Instascan.Scanner({ video: document.getElementById('camRegister') });
            /////////////////////////////////////
            $(document).ready(function(){
                $('#datetimepickerEXP').datepicker();
                $('#camRegister').hide();
                $('#camReuse').hide();
                $('#camReturn').hide();
                
                //role to show and hide functioanlity
                var role = "<?php echo $_SESSION['role'];?>";
                switch(role) {
                    case "PJ":
                        $('#ownerNamePJ').show();
                        break;
                    case "Student":
                        $('#ownerNamePJ').hide();
                        $('#liListChemical').hide();
                        $('#list_chemical').hide();

                        $('#liapprovePrivate').hide();
                        $('#approve_chemical').hide();

                        $('#regis_chemical').addClass("active");
                        $('#ownerNamePJ #ownerID').val("<?php echo $_SESSION['supervisorid'];?>");
                        break;
                    default:
                        $('#ownerNamePJ').hide();
                        $('#ownerNamePJ #ownerID').val("<?php echo $_SESSION['userid'];?>");
                }
            });
// upload SDS function---------------------------------------------------------------------
            function uploadFile(){
              var input = document.getElementById("sdsfile");
              file = input.files[0];           
                formData= new FormData();
                  formData.append("PDF", file);
                  $.ajax({
                    url: "function/upload.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                    }
                  });
                return file.name;
            }
            //----------------------------------------------------------------------
            //----- seach owner name n id ------------------------------------------

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
            //-------------------------------------------------------------------------------------------------
            //--------------- search chemical name ---------------------------------
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
                      $('#chemicalIDRegis').val(id.trim());
                      $('#type').val(typeC.trim());
                      $('input[name=eng][value=' + engcontrol.trim() + ']').prop('checked',true);
                      $('input[name=ppe][value=' + ppe.trim() + ']').prop('checked',true);
                    }
                });

            }

            $('#btn_register_chemical').on('click',function(e){
                var id_chemical = $.trim($('#chemicalIDRegis').val());
                var id_owner  = $.trim($('#ownerID').val());
                var id_user = '<?php echo $_SESSION["userid"];?>';
                var id_lab = $.trim($('#lab').val());
                var dateexp = $.trim($('#expired').val());
                var splitdate = dateexp.split("/");
                var newDate = splitdate[2]+"-"+splitdate[0]+"-"+splitdate[1];
                var status = $.trim($('#statusChemicalPrivatePublic').val());
                var supplier = $.trim($('#supplier').val());
                var qrcode = $.trim($('#qrcodeRegisterID').val());
                var stats = "";
                var sds = uploadFile();
                console.log("id chemicals "+id_chemical);
                if($("#REGtypechemical").is(':checked')){
                    stats = "In Use";
                }else{
                    stats = "Available";
                }
                console.log("stats :" + stats);
                console.log("status :" + status);

                if(id_chemical==""){
                    alert("Please make sure you entered the correct chemical name");
                }else if(id_owner==""){
                    alert("Please make sure you entered the correct owner name");
                }else if(id_lab==""){
                    alert("Please make sure you select the lab");
                }else if(dateexp==""){
                    alert("Please make sure you select the expired date for this chemical");
                }else if(status==""){
                    alert("Please make sure you select the type of chemical for public or private");
                }else if(qrcode==""){
                    alert("Please make sure you scan the qrcode first");
                }else if(sds==""){
                    alert("Please make sure you upload SDS first");
                }else{
                    $.ajax({
                        type:"post",
                        url:"function/registerChemical.php",
                        data:{id_chemical:id_chemical,id_owner:id_owner,id_lab:id_lab,dateexp:newDate,status:status,supplier:supplier,qrcode:qrcode,stats:stats,sds:sds},
                        success:function(databack){
                            if($.trim(databack)==="success"){
                                console.log(stats);
                                if(stats=="In Use"){
                                    $.ajax({
                                    type:"post",
                                    url:"function/registerChemicalUsage.php",
                                    data:{id_chemical:id_chemical,id_owner:id_user,id_lab:id_lab,dateexp:newDate,status:status,supplier:supplier,qrcode:qrcode,stats:stats,sds:sds},
                                    success:function(data){
                                        console.log(data);
                                        if($.trim(data)==="success"){
                                            alert("Registration succeed");
                                            location.reload();
                                        }
                                    }
                                });
                                }else{
                                    alert("Registration succeed");
                                    location.reload();
                                }
                                
                            }else{
                                 alert("Registration failed");
                            }
                        }
                    })
                }
                

            });    
			
	
			  $('#userTable #btnAccept').on('click',function(e){
				e.preventDefault();
				   var row = $(this).closest('tr');
				 var key = row.find('#keyStud').text();
				 var keyEmail = row.find('#keyEmali').text();
				 // alert(key);
				   var datas = {method:"updateRole",identifyid:key,email:keyEmail,subject:"CMS- User Reuse Chemical Request",message:"Your Request to used the chemical are Successfully, Thank You"};
				 $.ajax({
					type:"post",
					url:"function/manageChemicalApprove.php",
					data: datas,
					success:function(databack){
					  if(databack.trim() === "updateSuccess"){
						alert("Student successfully approve");
					  }else{
						alert("Failed to approve the studet!,try again later.");
					  }
					  location.reload();
					}
				 });
				
			  });

				$('#userTable #btnReject').on('click',function(e){
				e.preventDefault();
				 var row = $(this).closest('tr');
				 var key = row.find('#keyStud').text();
				 var keyEmail = row.find('#keyEmali').text();
				 // alert(key);
				 var datas = {method:"rejectApprove",identifyid:key,email:keyEmail,subject:"CMS- User Reuse Chemical Request",message:"Your request to used the chemical are Rejected Please context your supervisor / PJ, Thank You"};
				 $.ajax({
					type:"post",
					url:"function/manageChemicalApprove.php",
					data: datas,
					success:function(databack){
					  if(databack.trim() === "updateSuccess"){
						alert("Student rejected");
					  }else{
						alert("Failed to reject the studet!,try again later.");
					  }
					  location.reload();
					}
				 });
			  
			  });	
              $('#qrcodeReuse').on('click',function(){
                $('#camReuse').toggle(function(){
                    if($(this).is(':visible')){
                        scannerReuse.addListener('scan', function (content) {
                            console.log(content);
                            //document.getElementById("qrcodeReuse").value=content;
                            // $('#qrcodeReuse').val(content);
                            document.getElementById("qrcodeReuseInput").value=content;
                            scannerReuse.stop();
                            getReuse();
                            $('#camReuse').hide();
                            
                          });
                          Instascan.Camera.getCameras().then(function (cameras) {
                            if (cameras.length > 0) {
                              scannerReuse.start(cameras[0]);
                            } else {
                              console.error('No cameras found.');
                            }
                          }).catch(function (e) {
                            console.error(e);
                          });
                    }else if($(this).is(':hidden')){
                        scannerReuse.stop();
                    }
                });
                  
            });

            $('#qrcodeReturn').on('click',function(){
                $('#camReturn').toggle(function(){
                    if($(this).is(':visible')){
                        scannerReturn.addListener('scan', function (content) {
                            console.log(content);
                            //document.getElementById("qrcodeReuse").value=content;
                            // $('#qrcodeReuse').val(content);
                            document.getElementById("qrcodeReturnInput").value=content;
                            scannerReturn.stop();
                            getReturn();
                            $('#camReturn').hide();
                            
                          });
                          Instascan.Camera.getCameras().then(function (cameras) {
                            if (cameras.length > 0) {
                              scannerReturn.start(cameras[0]);
                            } else {
                              console.error('No cameras found.');
                            }
                          }).catch(function (e) {
                            console.error(e);
                          });
                    }else if($(this).is(':hidden')){
                        scannerReturn.stop();
                    }
                });
            });

            function getReuse(){
                var QrCode = $('#qrcodeReuseInput').val();
				 $.ajax({
					type:"post",
					url:"function/reuseChemical.php",
					data: {'QrCode': QrCode},
					success:function(databack){
                        $('#reuseData').html(databack);
                        $('#insert_btnReuse').prop('disabled', false);
					}
				 });
            }
            function getReturn(){
                var QrCode = $('#qrcodeReturnInput').val();
                var userid = "<?php echo $_SESSION['userid']?>";
                 
                 $.ajax({
                    type:"post",
                    url:"function/returnChemical.php",
                    data: {'QrCode': QrCode,userid:userid},
                    success:function(databack){
                        $('#returnData').html(databack);
                        $('#insert_btnReturn').prop('disabled', false);
                    }
                 });
            }

               $('#insert_btnReuse').on('click',function(e){
                var chemicalId = $('#chemicalInId').val();
                var cserId = $('#chemicalUserId').val();
				var email = $('#email').val();
				var sub = $('#sub').val();
				var message = $('#message').val();
				
				  //alert("test");
				 
				 $.ajax({
					type:"post",
					url:"function/reuseNewChemical.php",
					data: {'chemicalId': chemicalId, 'cserId':cserId, 'email':email, 'sub':sub, 'message':message},
					success:function(databack){
                        if(databack.trim() === "success"){
						alert("Request success");
					  }else{
						alert("Request failed! Please request later");
                        console.log(databack);
					  }
					  //location.reload();
					}
				 });
			  
			  });

               $('#insert_btnReturn').on('click',function(e){
                var chemicalId = $('#chemicalInId').val();
                var cserId = $('#chemicalUserId').val();
                var userchemicalid = $('#chemicalUserIdPeminjam').val();
                var email = $('#email').val();
                var sub = $('#sub').val();
                var message = $('#message').val();
                var status = $('#returnStatus').val();
                
                  //alert("test");
                 
                 $.ajax({
                    type:"post",
                    url:"function/returnNewChemical.php",
                    data: {'chemicalId': chemicalId, 'cserId':cserId, 'email':email, 'sub':sub, 'message':message,status:status,peminjam :userchemicalid },
                    success:function(databack){
                        console.log(databack);
                        if(databack.trim() === "success"){
                        alert("Request success");
                      }else{
                        alert("Request failed! Please request later");
                      }
                      // location.reload();
                    }
                 });
              
              });                 	

            $('#qrcodeRegister').on('click',function(){
                $('#camRegister').toggle(function(){
                    if($(this).is(':visible')){
                        scannerRegister.addListener('scan', function (content) {
                            console.log(content);
                            //document.getElementById("qrcodeReuse").value=content;
                            // $('#qrcodeReuse').val(content);
                            document.getElementById("qrcodeRegisterID").value=content;
                            scannerRegister.stop();
                            $('#camRegister').hide();
                            
                          });
                          Instascan.Camera.getCameras().then(function (cameras) {
                            if (cameras.length > 0) {
                              scannerRegister.start(cameras[0]);
                            } else {
                              console.error('No cameras found.');
                            }
                          }).catch(function (e) {
                            console.error(e);
                          });
                    }else if($(this).is(':hidden')){
                        scannerRegister.stop();
                    }
                });
            });


			
			$('#viewTable #btnView').on('click',function(e){
				e.preventDefault();
				
				 var row = $(this).closest('tr');
				  var id = row.find('#id').val();
                  var name = row.find('#chemical').text();
                  var type = row.find('#type').val();
                  var status = row.find('#status').val();
                  var datein = row.find('#datein').val();
                  var expdate = row.find('#expdate').text();
                  var supliername = row.find('#supliername').val();
                  var qrcode = row.find('#qrcode').val();
                  var nameSv = row.find('#name').val();
				  // console.log("Value: "+id+" "+name+" "+type+" "+status+" "+datein+" "+supliername+" "+qrcode+" "+nameSv);
				 $('#modalDetailChemical #tbleDetails td#LIchemicalName').html(name);
                 $('#modalDetailChemical #tbleDetails td#LItypeChemical').html(type);
                 $('#modalDetailChemical #tbleDetails td#LIstatusChemical').html(status);
                 $('#modalDetailChemical #tbleDetails td#LIdate').html(datein);
                 $('#modalDetailChemical #tbleDetails td#LIsupplierName').html(supliername);
                 $('#modalDetailChemical #tbleDetails td#LIqrcode').html(qrcode);
                 $('#modalDetailChemical #tbleDetails td#LIlab').html(nameSv);
                 $('#modalDetailChemical #tbleDetails td#LIexpdate').html(expdate);
			 
				 });

                 
        </script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. -->
    </body>
</html>