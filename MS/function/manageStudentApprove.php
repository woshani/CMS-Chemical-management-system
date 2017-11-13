<?php
	include "../../connection/connection.php";
	
$method = $_POST['method'];
$identifyid = $_POST['identifyid'];

if($method=="updateRole"){
	
	$sqlupdate = "UPDATE user SET role='Student' WHERE identifyid='".$identifyid."';";
	$resultUpdate = mysqli_query($conn,$sqlupdate);
	if($resultUpdate){
    	echo "updateSuccess";
	}else{
	    echo "updateFailed";
	}
mysqli_close($conn);
}else if($method=="rejectApprove"){
	$sqlupdate = "UPDATE user SET role='Rejected' WHERE identifyid='".$identifyid."';";
	$resultUpdate = mysqli_query($conn,$sqlupdate);
	if($resultUpdate){
    	echo "updateSuccess";
	}else{
	    echo "updateFailed";
	}
mysqli_close($conn);
}
?>