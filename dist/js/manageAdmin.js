$(document).ready(function() {
    $('#tableStaff').dataTable({
    "language": {
        "emptyTable":     "No Staff registered"
    }
} );
    $('#tableChemical').dataTable({
    "language": {
        "emptyTable":     "No Chemical Added"
    }
} );
});

$('#btnregisstaff').on('click',function(e){
	e.preventDefault();
	var staffid = $('#staffid').val();
	var fname = $('#fname').val();
	var lname = $('#lname').val();
	var telno = $('#telno').val();
	var email = $('#email').val();
	var role = $('#role').val();
	var admin;

	if($('#admin').is(':checked')){
		admin = $('#admin').val();
	}else{
		admin = "No";
	}

	if(staffid===""){
		alert("Please insert the staff ID");
	}else if(fname===""){
		alert("Please insert the first name");
	}else if(lname===""){
		alert("Please insert the last name");
	}else if(telno===""){
		alert("Please insert the telephone number");
	}else if(email===""){
		alert("Please insert the Email");
	}else if(role===null){
		alert("Please choose the role");
	}else{
		var datass = {staffid:staffid,fname:fname,lname:lname,telno:telno,email:email,role:role,admin:admin};
		console.log(datass);
		$.ajax({
			type:"post",
			url:"function/functionRegisStaff.php",
			data:datass,
			success:function(datapulang){
				var x  = datapulang.trim();
				if(x === "already"){
					alert("this user already registered");
				}else if(x === "success"){
					alert("success registering");
					location.reload();
				}else if(x === "fail"){
					alert("fail to register");
				}
			}
		})
	}
});
