<?php 
include "../../connection/connection.php";

require_once("../../plugins/phpmailer/class.phpmailer.php");
	
	$email=$_POST['email'];
	$message=$_POST['message'];
	$subject = $_POST['sub'];
	
	$status = $_POST['status'];
	$chemicaInlId = $_POST['chemicalId'];
	$chemicalUserId = $_POST['cserId'];
	$chemicalpeminjam = $_POST['peminjam'];
	
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

		$query = "UPDATE chemicalusage SET status = '".$status."' ,enddate=now() where ciid = '".$chemicaInlId."' AND userid = '".$chemicalpeminjam."';";
		$query .= "UPDATE chemicalIn SET status = '".$status."' where userid = ".$chemicalUserId." AND ciid = ".$chemicaInlId.";";
		$insert = mysqli_multi_query($conn,$query);
				if($insert){
					 echo $query;
				}else{
					echo $query;
				}
	}
mysqli_close($conn);
?>