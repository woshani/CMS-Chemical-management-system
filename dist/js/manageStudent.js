 $('#userTable #btnAccept').on('click',function(e){
    e.preventDefault();
	   var row = $(this).closest('tr');
     var key = row.find('#keyStud').text();
	   var keyEmail = row.find('#keyEmali').text();
	   var datas = {method:"updateRole",identifyid:key,email:keyEmail,subject:"ZeroWaste- User Authentication Request",message:"Successfully to login into Chemical Management System, Thank You"};
     console.log(datas);
     $.ajax({
        type:"post",
        url:"function/manageStudentApprove.php",
        data: datas,
        success:function(databack){
          console.log(databack);
          if(databack.trim() === "updateSuccess"){
            alert("Student successfully approve");
          }else{
            alert("Failed to approve the student!,try again later.");
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
     var datas = {method:"rejectApprove",identifyid:key,email:keyEmail,subject:"ZeroWaste- User Authentication Request",message:"Your Request to login into Chemical Management System are Rejected Please context your supervisor / PJ, Thank You"};
     $.ajax({
        type:"post",
        url:"function/manageStudentApprove.php",
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