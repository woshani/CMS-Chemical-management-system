<?php 
include "../../connection/connection.php";

require_once("../../plugins/phpmailer/class.phpmailer.php");
	
	
	$status = $_POST['status'];
	$chemicaInlId = $_POST['chemicalId'];
	$chemicalUserId = $_POST['cserId'];
	$chemicalpeminjam = $_POST['peminjam'];
	

		$query = "UPDATE chemicalusage SET status = '".$status."' ,enddate=now() where ciid = '".$chemicaInlId."' AND userid = '".$chemicalpeminjam."';";
		$query .= "UPDATE chemicalIn SET status = '".$status."' where userid = ".$chemicalUserId." AND ciid = ".$chemicaInlId.";";
		$insert = mysqli_multi_query($conn,$query);
				if($insert){
					 echo $query;
				}else{
					echo $query;
				}
	
mysqli_close($conn);
?>