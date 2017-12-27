$(document).ready(function() {
	$('#tableStaff').DataTable({"language": {"emptyTable":"No Staff registered"}});

	$('#tableChemical').DataTable({"language": {"emptyTable":"No Chemical Added"}});
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

$('#addnewchem').on('click',function(e){
	e.preventDefault();
	var chem_name = $('#chem_name').val();
	var phystype = $('#phystype').val();
	var engControl = $('#engControl').val();
	var ppe = $('#ppe').val();
	var classses = $('#classses').val();
	var ghs = $('#ghs').val();

	if(chem_name===""){
		alert("Please insert the Chemical Name");
	}else if(phystype===null){
		alert("Please choose the Physical Yype");
	}else if(engControl===null){
		alert("Please choose the Eng Control");
	}else if(ppe===null){
		alert("Please choose the PPE");
	}else if(classses===null){
		alert("Please choose the Class");
	}else if(ghs===null){
		alert("Please choose the GHS");
	}else{
		var datass = {chem_name:chem_name,phystype:phystype,engControl:engControl,ppe:ppe,classses:classses,ghs:ghs};
		console.log(datass);
		$.ajax({
			type:"post",
			url:"function/functionAddChem.php",
			data:datass,
			success:function(datapulang){
				var x  = datapulang.trim();
				if(x === "already"){
					alert("this chemical already Added into the list");
				}else if(x === "success"){
					alert("success adding into the list!");
					location.reload();
				}else if(x === "fail"){
					alert("fail to add into the list");
				}
			}
		})
	}
});
