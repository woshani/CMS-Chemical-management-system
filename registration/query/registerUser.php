<?php 
$connect = mysqli_connect("localhost", "root", "", "cms");

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

if(mysqli_query($connect,$query))
{ 
	return 0;
}

?>