<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../../plugins/phpmailerv2/Exception.php';
	require '../../plugins/phpmailerv2/PHPMailer.php';
	require '../../plugins/phpmailerv2/SMTP.php';
	
	$email = $_POST['email'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	
	$method = $_POST['method'];
	$identifyid = $_POST['identifyid'];
	$mail = new PHPMailer(true);    
	if($method=="updateRole"){
		
		                          // Passing `true` enables exceptions
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
		    $mail->Body    = 'Dear Student,Your Registration has been Approve by Supervisor,and you can login by using your Matric number';
		    $mail->AltBody = 'This is automated E-mail,do not reply';

		    $mail->send();
		    	$sqlupdate = "UPDATE user SET status='Approve' WHERE identifyid='".$identifyid."';";
					$resultUpdate = mysqli_query($conn,$sqlupdate);
					if($resultUpdate){
						echo "updateSuccess";
					}else{
						echo "updateFailed";
					}
			} catch (Exception $e) {
		    	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}

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
			
			
		// }

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
		    $mail->Body    = 'Dear Student,Your Registration has been Rejected by Supervisor,Please contact your supervisor for clarification';
		    $mail->AltBody = 'This is automated E-mail,do not reply';

		    $mail->send();
		    	$sqlupdate = "UPDATE user SET status='Reject' WHERE identifyid='".$identifyid."';";
					$resultUpdate = mysqli_query($conn,$sqlupdate);
					if($resultUpdate){
						echo "updateSuccess";
					}else{
						echo "updateFailed";
					}
				
			} catch (Exception $e) {
		    	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}

	mysqli_close($conn);
	}
?>