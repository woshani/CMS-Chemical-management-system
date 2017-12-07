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
                        $('#ownerNamePJ #ownerID').val(supervisorid);
                        break;
                    default:
                        $('#ownerNamePJ').hide();
                        $('#ownerNamePJ #ownerID').val(useridxx); 
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
                var id_user = useridxx;
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
                var useridreturn = useridxx;
                 
                 $.ajax({
                    type:"post",
                    url:"function/returnChemical.php",
                    data: {'QrCode': QrCode,userid:useridreturn},
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

                 