<?php
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require '../../plugins/phpmailerv2/Exception.php';
require '../../plugins/phpmailerv2/PHPMailer.php';
require '../../plugins/phpmailerv2/SMTP.php';

$id_chemical = $_POST['id_chemical'];
$id_owner = $_POST['id_owner'];
$id_lab = $_POST['id_lab'];
$dateexp = $_POST['dateexp'];
$status = $_POST['status'];
$supplier = $_POST['supplier'];
$stats = $_POST['stats'];
$qrcode = $_POST['qrcode'];
$sds = $_POST['sds'];
$identifyid = $_POST['identifyid'];
$id_user = $_POST['id_user'];
$quantity = $_POST['quantity'];
$emaiowner = $_POST['email'];
$statususer = '';
$subjectemail = '';
$messageemail = '';
$ciid = "";
$staffidarray = "";
$sqlpj = 'SELECT labid,staffid FROM labowner WHERE labid =' . $id_lab;
$resultSelect2 = mysqli_query($conn, $sqlpj);
if ($resultSelect2->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($resultSelect2)) {
        $staffidarray .= $row['staffid'] . ',';
    }

    $sqlselectemailpj = "select email from user where userid in (" . $staffidarray . $id_owner . ")";
    $resultSelect3 = mysqli_query($conn, $sqlselectemailpj);
    if ($resultSelect3->num_rows > 0) {
        while ($row2 = mysqli_fetch_assoc($resultSelect3)) {
            $staffemailarray[] = $row2['email'];
        }
    }
}

$sqlSelect = "SELECT ciid FROM chemicalin WHERE qrcode='" . $qrcode . "';";
$resultSelect = mysqli_query($conn, $sqlSelect);
if ($resultSelect->num_rows > 0) {
    echo "qrcode";
} else {
    if ($id_owner == $id_user) {
        $query = "INSERT INTO chemicalin(type,datein,expireddate,status,qrcode,sds,supliername,chemicalid,userid,labid,register_by,registration_status,quantity,remaining_quantity) VALUES('" . $status . "',now(),'" . $dateexp . "','" . $stats . "','" . $qrcode . "','" . $sds . "','" . $supplier . "','" . $id_chemical . "','" . $id_owner . "','" . $id_lab . "','" . $identifyid . "','Approve','" . $quantity . "','" . $quantity . "');";
    } else {
        $statususer = "pj";
        $query = "INSERT INTO chemicalin(type,datein,expireddate,status,qrcode,sds,supliername,chemicalid,userid,labid,register_by,quantity,remaining_quantity) VALUES('" . $status . "',now(),'" . $dateexp . "','" . $stats . "','" . $qrcode . "','" . $sds . "','" . $supplier . "','" . $id_chemical . "','" . $id_owner . "','" . $id_lab . "','" . $identifyid . "','" . $quantity . "','" . $quantity . "');";
    }

    $resultInsert = mysqli_query($conn, $query);
    if ($resultInsert) {
        echo "success";

    } else {
        echo "fail";
    }
}

$mail = new PHPMailer(true); // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'cmsutem@gmail.com'; // SMTP username
    $mail->Password = 'cmsUTeM1234'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to

    //Recipients
    $mail->setFrom('cmsutem@gmail.com', 'ZeroWaste Chemical Management System');
    $amount = count($staffemailarray); //amount shows the number of data I want to repeat
    for ($i = 0; $i < $amount; $i++) {
        $mail->addAddress($staffemailarray[$i]);
    }

    // Add a recipient
    $mail->addReplyTo('cmsutem@gmail.com', 'Information');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);
    $subjectemail = 'Registration Chemical';
    $messageemail = 'New chemical has been registered into a lab under your supervision/into under owner list'; // Set email format to HTML
    $mail->Subject = $subjectemail;
    $mail->Body = $messageemail;
    $mail->AltBody = 'This is automated E-mail,do not reply';
    $mail->send();

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

mysqli_close($conn);
