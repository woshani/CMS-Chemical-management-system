<?php 
include "../../connection/connection.php";

require_once("../../plugins/phpmailer/class.phpmailer.php");
	
	$email=$_POST['email'];
	$message=$_POST['message'];
	$subject = $_POST['sub'];
	
	$chemicaInlId = $_POST['chemicalId'];
	$chemicalUserId = $_POST['cserId'];
	
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
	$mailer->AddAddress($email); 

	if(!$mailer->Send())
	{
	echo "fail";

	}
	else
	{

		$query = "INSERT INTO 
				chemicalusage (startdate, status, userid, ciid) 
				VALUES (now(), 'Pending' , '".$chemicalUserId."', '".$chemicaInlId."')";
		$insert = mysqli_query($conn,$query);
				if($insert){
					 echo "success";
				}else{
					echo "fail";
				}
	}
mysqli_close($conn);
?>