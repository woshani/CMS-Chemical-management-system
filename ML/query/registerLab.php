<?php 
include '../../connection/connection.php';

$LabName = $_POST['labname'];

$query = "INSERT INTO 
		lab (name) 
		VALUES ('".$LabName."')";
$insert = mysqli_query($conn,$query);
		if($insert){
             echo "success";
        }else{
            echo "fail";
        }
mysqli_close($conn);
?>