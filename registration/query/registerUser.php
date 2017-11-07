<?php 
include "../../connection/connection.php";

$Fname = $_POST['fname'];
$Lname = $_POST['lname'];
$Role = $_POST['role'];
$Admin = $_POST['admin'];
$IdentifyId = $_POST['identifyId'];
$password = $_POST['password'];
$supervisorId = $_POST['supervisorId'];

$query = "INSERT INTO 
		user (Fname, Lname, Role, Admin, IdentifyId, password, supervisorId) 
		VALUES ('".$Fname."','".$Lname."','".$Role."','".$Admin."','".$IdentifyId."',md5('".$password."'),'".$supervisorId."')";
$insert = mysqli_query($conn,$query);
		if($insert){
             echo "success";
        }else{
            echo "fail";
        }
mysqli_close($conn);
?>