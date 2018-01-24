<?php 
include "../../connection/connection.php";

	// require_once("../../plugins/phpmailer/class.phpmailer.php");
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../../plugins/phpmailerv2/Exception.php';
	require '../../plugins/phpmailerv2/PHPMailer.php';
	require '../../plugins/phpmailerv2/SMTP.php';
	
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
    $mail->addAddress($supervisorEmail);     // Add a recipient
    $mail->addReplyTo('cmsutem@gmail.com', 'Information');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = 'Student '.$Fname." ".$Lname.' with Matric Number '.$IdentifyId.' has request to register,'.$message;
    $mail->AltBody = 'This is automated E-mail,do not reply';

    $mail->send();
    		$query = "INSERT INTO 
				user (Fname, Lname, email, telno, Role, Admin, IdentifyId, password, supervisorId,status) 
				VALUES ('".$Fname."','".$Lname."','".$email."','".$telno."','".$Role."','".$Admin."','".$IdentifyId."',md5('".$password."'),'".$supervisorId."','Pending')";
		$insert = mysqli_query($conn,$query);
				if($insert){
					 echo "success";
				}else{
					echo "fail";
				}
	} catch (Exception $e) {
    	echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}

mysqli_close($conn);
?>