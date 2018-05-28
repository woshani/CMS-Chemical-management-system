<?php 
include '../../connection/connection.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../../plugins/phpmailerv2/Exception.php';
	require '../../plugins/phpmailerv2/PHPMailer.php';
	require '../../plugins/phpmailerv2/SMTP.php';
	
	$email=$_POST['email'];
	$message=$_POST['message'];
	$subject = $_POST['sub'];
	$cuid = $_POST['cuid'];
	$status = $_POST['status'];
	$chemicaInlId = $_POST['chemicalId'];
	$chemicalUserId = $_POST['cserId'];
	$chemicalpeminjam = $_POST['peminjam'];
	$remaining = $_POST['remaining'];
	$realremain = "";



	if($status==="Empty"){
		$realremain = $status;
	}else if($status==="Available"){
		$realremain = $remaining;
	}

		$query = "UPDATE chemicalusage SET enddate=now(),remaining_quantity='".$realremain."',status ='Return' where ciid = ".$chemicaInlId." AND userid = ".$chemicalpeminjam." and cuid = ".$cuid.";";
		$query .= "UPDATE chemicalIn SET status = '".$status."',remaining_quantity='".$realremain."' where userid = ".$chemicalUserId." AND ciid = ".$chemicaInlId.";";

		$insert = mysqli_multi_query($conn,$query);
				if($insert){
					 echo "success";
					 //echo $query;
				}else{
					echo "fail";
					//echo $query;
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

mysqli_close($conn);
?>