<?php 
include "../../connection/connection.php";
	
	$chemicaInlId = $_POST['chemicalId'];
	$chemicalUserId = $_POST['cserId'];
	
	
		$query = "UPDATE chemicalin set status = 'In Use' WHERE ciid = '".$chemicaInlId."';";
		$query .= "INSERT INTO 
				chemicalusage (startdate, status, userid, ciid) 
				VALUES (now(), 'Pending' , '".$chemicalUserId."', '".$chemicaInlId."');";
		$insert = mysqli_multi_query($conn,$query);
				if($insert){
					 echo "success";
				}else{
					echo $query;
				}
mysqli_close($conn);
?>