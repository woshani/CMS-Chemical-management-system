<?php 
include "../../connection/connection.php";

$chemicaInlId = $_POST['chemicalId'];
$chemicalUserId = $_POST['cserId'];

$query = "INSERT INTO 
		chemicalusage (startdate, status, userid, ciid) 
		VALUES (now(), 'Pending' , '".$chemicalUserId."', '".$chemicaInlId."')";
$insert = mysqli_query($conn,$query);
		if($insert){
             echo "success";
        }else{
            echo "fail";
        }
mysqli_close($conn);
?>