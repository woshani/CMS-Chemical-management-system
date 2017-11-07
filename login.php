<?php 
include 'connection/connection.php';
$userid = $_POST['userid'];
$pass = $_POST['password'];

$sql = "SELECT userid,fname,lname,email,telno,role,admin,identifyid,supervisorid,password FROM user WHERE identifyid = '".$userid."' AND password='".$pass."' AND !role='Pending';";

$result = mysqli_query($conn,$sql);
if($result->num_rows > 0){
	session_start();
    while($row = mysqli_fetch_assoc($result)){
    	$_SESSION["userid"]=$row['userid'];
    	$_SESSION["fname"]=$row['fname'];
    	$_SESSION["lname"]=$row['lname'];
    	$_SESSION["email"]=$row['email'];
    	$_SESSION["telno"]=$row['telno'];
    	$_SESSION["role"]=$row['role'];
    	$_SESSION["admin"]=$row['admin'];
    	$_SESSION["identifyid"]=$row['identifyid'];
    	$_SESSION["supervisorid"]=$row['supervisorid'];
        $_SESSION["password"]=$row['password'];
    }
    echo "valid";
}else{
    echo "no data";
}
mysqli_close($conn);
?>