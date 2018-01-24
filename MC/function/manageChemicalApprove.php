<?php
	include "../../connection/connection.php";

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
	$selectfirst = "select status from chemicalin where ciid = ".$ciid.";";
	$selectResult = mysqli_query($conn,$selectfirst);
	$cidstatus = "";
	$cuid = $_POST['ciud'];

	if(mysqli_num_rows($selectResult) > 0){
		while($row = mysqli_fetch_array($selectResult)){
			$cidstatus = $row['status'];
		}
		if($cidstatus=="Available"){
			if($method=="updateRole"){
					$sqlupdate = "UPDATE chemicalusage a, user b SET a.status='Approve' WHERE a.userid = b.userid AND b.identifyid='".$identifyid."' and a.cuid = ".$cuid.";";
					$sqlupdate .= "UPDATE chemicalin set status = 'In Use' WHERE ciid = '".$ciid."';";
					$resultUpdate = mysqli_multi_query($conn,$sqlupdate);
					if($resultUpdate){
						echo "updateSuccess";
					}else{
						echo "updateFailed";
					}
				mysqli_close($conn);
			}else if($method=="rejectApprove"){
					$sqlupdate = "UPDATE chemicalusage a, user b SET a.status='Reject' WHERE a.userid = b.userid AND b.identifyid='".$identifyid."' and a.cuid = ".$cuid.";";
					$sqlupdate .= "UPDATE chemicalin set status = 'Available' WHERE ciid = '".$ciid."';";
					$resultUpdate = mysqli_multi_query($conn,$sqlupdate);
					if($resultUpdate){
						echo "updateSuccess";
					}else{
						echo "updateFailed";
					}

				mysqli_close($conn);
			}
		}else if($cidstatus=="In Use"){
			echo "chemicalused";
		}
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