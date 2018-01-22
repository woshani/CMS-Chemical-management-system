<?php
	include "../../connection/connection.php";

	require_once("../../plugins/phpmailer/class.phpmailer.php");
	
	$email = $_POST['email'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	
	$method = $_POST['method'];
	$identifyid = $_POST['identifyid'];

	if($method=="updateRole"){
		
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

		// if(!$mailer->Send())
		// {
		// echo "updateFailed";
		// }
		// else
		// {
			$sqlupdate = "UPDATE user SET status='Approve' WHERE identifyid='".$identifyid."';";
			$resultUpdate = mysqli_query($conn,$sqlupdate);
			if($resultUpdate){
				echo "updateSuccess";
			}else{
				echo "updateFailed";
			}
		// }
	mysqli_close($conn);

	}else if($method=="rejectApprove"){
		
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

		// if(!$mailer->Send())
		// {
		// echo "updateFailed";
		// }
		// else
		// {
			
			$sqlupdate = "UPDATE user SET status='Reject' WHERE identifyid='".$identifyid."';";
			$resultUpdate = mysqli_query($conn,$sqlupdate);
			if($resultUpdate){
				echo "updateSuccess";
			}else{
				echo "updateFailed";
			}
		// }
	mysqli_close($conn);
	}
?>