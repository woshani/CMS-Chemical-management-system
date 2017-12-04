<?php
	include "../../connection/connection.php";

	require_once("../../plugins/phpmailer/class.phpmailer.php");
	
	
	
	$method = $_POST['method'];
	$identifyid = $_POST['identifyid'];

	if($method=="updateRole"){
		
		
			$sqlupdate = "UPDATE chemicalusage a, user b SET a.status='Approve' WHERE a.userid = b.userid AND b.identifyid='".$identifyid."';";
			$resultUpdate = mysqli_query($conn,$sqlupdate);
			if($resultUpdate){
				echo "updateSuccess";
			}else{
				echo "updateFailed";
			}
		
	mysqli_close($conn);

	}else if($method=="rejectApprove"){
		
		
			
			$sqlupdate = "UPDATE chemicalusage a, user b SET a.status='Reject' WHERE a.userid = b.userid AND b.identifyid='".$identifyid."';";
			$resultUpdate = mysqli_query($conn,$sqlupdate);
			if($resultUpdate){
				echo "updateSuccess";
			}else{
				echo "updateFailed";
			}
		
	mysqli_close($conn);
	}
?>