<?php 
include "../../connection/connection.php";
	
require_once("../../plugins/phpmailer/class.phpmailer.php");

	$email=$_POST['email'];
	$message=$_POST['message'];
	$subject = $_POST['sub'];
	$ctype = $_POST['type'];
	
	
	$chemicaInlId = $_POST['chemicalId'];
	$chemicalUserId = $_POST['cserId'];
	$statusUsage="";
	$statusUserRequesttouse = "";
	
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
	// echo "fail";

	// }
	// else
	// {
		if($ctype=="Public"){
			$statusUsage = "In Use";
			$statusUserRequesttouse = "Approve";
		}else if($ctype=="Private"){
			$statusUsage = "Available";
			$statusUserRequesttouse = "Pending";
		}
		$query = "UPDATE chemicalin set status = '".$statusUsage."' WHERE ciid = '".$chemicaInlId."';";
		$query .= "INSERT INTO 
				chemicalusage (startdate, status, userid, ciid) 
				VALUES (now(), '".$statusUserRequesttouse."' , '".$chemicalUserId."', '".$chemicaInlId."');";
		$insert = mysqli_multi_query($conn,$query);
				if($insert){
					 echo "success";
				}else{
					echo $query;
				}
	// }
mysqli_close($conn);
?>