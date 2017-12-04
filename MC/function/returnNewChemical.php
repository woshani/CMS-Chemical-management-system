<?php 
include "../../connection/connection.php";

require_once("../../plugins/phpmailer/class.phpmailer.php");
	
	
	
	$chemicaInlId = $_POST['chemicalId'];
	$chemicalUserId = $_POST['cserId'];
	$chemicalpeminjam = $_POST['peminjam'];
	

		$query = "UPDATE chemicalusage SET status = '".$status."' ,enddate='now()' where ciid = '".$chemicaInlId."' AND cuserid = '".$chemicalpeminjam."';";
		$query .= "UPDATE chemicalIn SET status = '".$status."' AND userid = '".$chemicalUserId."';";
		$insert = mysqli_multi_query($conn,$query);
				if($insert){
					 echo "success";
				}else{
					echo "fail";
				}
	
mysqli_close($conn);
?>