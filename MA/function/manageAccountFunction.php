<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';
$method = $_POST['method'];
$key = $_POST['key'];
$userid = $_POST['userid'];

if($method=="updateUser"){
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$notel = $_POST['notel'];
	$img = $_POST['img'];

	$sqlupdate = "UPDATE user SET fname='".$fname."',lname='".$lname."',email='".$email."',telno='".$notel."',picture='".$img."' WHERE userid='".$key."' AND identifyid='".$userid."';";
	$resultUpdate = mysqli_query($conn,$sqlupdate);
	if($resultUpdate){
    	echo "updateSuccess";
    	session_start();
    	$_SESSION['fname'] = $fname;
    	$_SESSION['lname'] = $lname;
    	$_SESSION['email'] = $email;
    	$_SESSION['telno'] = $notel;
    	$_SESSION['picture'] = $img;
	}else{
	    echo $sqlupdate;
	}
mysqli_close($conn);

}elseif ($method=="updatePass") {
	$newpass = $_POST['new'];
	$sqlchangepass = "UPDATE user SET password='".$newpass."' WHERE userid='".$key."' AND identifyid='".$userid."';";
	$resultChange = mysqli_query($conn,$sqlchangepass);
	if($resultChange){
    	echo "updateSuccess";
    	session_start();
    	$_SESSION['password'] = $newpass;
	}else{
	    echo "updateFailed";
	}
mysqli_close($conn);
}

?>