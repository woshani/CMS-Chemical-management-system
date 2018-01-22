<?php 
include "../../connection/connection.php";

	require_once("../../plugins/phpmailer/class.phpmailer.php");
	
	$supervisorEmail=$_POST['supervisorEmail'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$subject = $_POST['sub'];
	
	$Fname = $_POST['fname'];
	$Lname = $_POST['lname'];
	$telno = $_POST['telno'];
	$Role = $_POST['role'];
	$Admin = $_POST['admin'];
	$IdentifyId = $_POST['identifyId'];
	$password = $_POST['password'];
	$supervisorId = $_POST['supervisorId'];

  
	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->Host = 'ssl://smtp.gmail.com:465';
	$mailer->SMTPAuth = TRUE;
	$mailer->Username = 'cmsutem@gmail.com';  // Change this to your gmail adress
	$mailer->Password = 'cmsUTeM1234';  // Change this to your gmail password
	$mailer->From = 'cmsutem@gmail.com';  // This HAVE TO be your gmail adress
	$mailer->FromName = 'CMSUTeM'; // This is the from name in the email, you can put anything you like here
	$mailer->Subject = $subject;
	$mailer->Body = $message;
	$mailer->AddAddress($supervisorEmail); 

	// if(!$mailer->Send())
	// {
	// echo "fail";

	// }
	// else
	// {

		$query = "INSERT INTO 
				user (Fname, Lname, email, telno, Role, Admin, IdentifyId, password, supervisorId,status) 
				VALUES ('".$Fname."','".$Lname."','".$email."','".$telno."','".$Role."','".$Admin."','".$IdentifyId."',md5('".$password."'),'".$supervisorId."','Pending')";
		$insert = mysqli_query($conn,$query);
				if($insert){
					 echo "success";
				}else{
					echo "fail";
				}
			
	// }

mysqli_close($conn);
?>