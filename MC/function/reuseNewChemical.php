<?php 
include "../../connection/connection.php";
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../../plugins/phpmailerv2/Exception.php';
	require '../../plugins/phpmailerv2/PHPMailer.php';
	require '../../plugins/phpmailerv2/SMTP.php';

	$email=$_POST['email'];
	$message=$_POST['message'];
	$subject = $_POST['sub'];
	$ctype = $_POST['type'];
	$ownerid = $_POST['ownerid'];
	$quantity = $_POST['quantity'];
	
	$messagepublic = $_POST['messagepublic'];
	$realmessage = "";
	$chemicaInlId = $_POST['chemicalId'];
	$chemicalUserId = $_POST['cserId'];
	$statusUsage="";
	$statusUserRequesttouse = "";
	
	if($ownerid==$chemicalUserId){
		$statusUsage = "In Use";
		$statusUserRequesttouse = "Approve";
		$realmessage = $messagepublic;
	}else{
		if($ctype=="Public"){
			$statusUsage = "In Use";
			$statusUserRequesttouse = "Approve";
			$realmessage = $messagepublic;

		}else if($ctype=="Private"){
			$statusUsage = "Available";
			$statusUserRequesttouse = "Pending";
			$realmessage = $message;
		}
	}
		

		$query = "UPDATE chemicalin set status = '".$statusUsage."' WHERE ciid = '".$chemicaInlId."';";
		$query .= "INSERT INTO 
				chemicalusage (startdate, status, userid, ciid,initial_quantity) 
				VALUES (now(), '".$statusUserRequesttouse."' , '".$chemicalUserId."', '".$chemicaInlId."','".$quantity."');";
		$insert = mysqli_multi_query($conn,$query);
				if($insert){
					 echo "success";
				}else{
					echo "fail";
				}
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			try {
			    //Server settings
			    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
			    $mail->isSMTP();                                      // Set mailer to use SMTP
			    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                               // Enable SMTP authentication
			    $mail->Username = 'cmsutem@gmail.com';                 // SMTP username
			    $mail->Password = 'cmsUTeM1234';                           // SMTP password
			    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			    $mail->Port = 465;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom('cmsutem@gmail.com', 'ZeroWaste Chemical Management System');
			    $mail->addAddress($email);     // Add a recipient
			    $mail->addReplyTo('cmsutem@gmail.com', 'Information');

			    //Attachments
			    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    //Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = $subject;
			    $mail->Body    = $realmessage;
			    $mail->AltBody = 'This is automated E-mail,do not reply';

			    $mail->send();
				} catch (Exception $e) {
			    	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}			

mysqli_close($conn);
?>