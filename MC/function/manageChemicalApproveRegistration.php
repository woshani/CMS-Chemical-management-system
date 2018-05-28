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
	$ciid = $_POST['ciid'];
			if($method=="updateRole"){				
					$sqlupdate = "UPDATE chemicalin set registration_status = 'Approve' WHERE ciid = '".$ciid."';";
					$resultUpdate = mysqli_multi_query($conn,$sqlupdate);
					if($resultUpdate){
						echo "updateSuccess";
					}else{
						echo "updateFailed";
					}
				mysqli_close($conn);
			}else if($method=="rejectApprove"){
					$sqlupdate = "UPDATE chemicalin set registration_status = 'Reject' WHERE ciid = '".$ciid."';";
					$resultUpdate = mysqli_multi_query($conn,$sqlupdate);
					if($resultUpdate){
						echo "updateSuccess";
					}else{
						echo "updateFailed";
					}
				mysqli_close($conn);
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
			    $mail->Body    = $message;
			    $mail->AltBody = 'This is automated E-mail,do not reply';

			    $mail->send();
				} catch (Exception $e) {
			    	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}			
?>