<?php
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';
session_start();
$userid = $_POST['userid'];
$pass = $_POST['password'];

$sql = "SELECT userid,fname,lname,email,telno,role,admin,identifyid,supervisorid,password,status,picture FROM user WHERE identifyid = '" . $userid . "' AND password='" . $pass . "';";

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["fname"] = $row['fname'];
        $_SESSION["lname"] = $row['lname'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["telno"] = $row['telno'];
        $_SESSION["role"] = $row['role'];
        $_SESSION["admin"] = $row['admin'];
        $_SESSION["identifyid"] = $row['identifyid'];
        $_SESSION["supervisorid"] = $row['supervisorid'];
        $_SESSION["password"] = $row['password'];
        $_SESSION["status"] = $row['status'];

        if ($row['picture'] == "") {
            $_SESSION["picture"] = "/img/profiledefault.png";
        } else {
            $_SESSION["picture"] = $row['picture'];
        }
        $sqlLab = "SELECT labid FROM labowner WHERE staffid =" . $_SESSION['userid'];
        $resultdua = mysqli_query($conn, $sqlLab);
        if ($resultdua->num_rows > 0) {
            while ($rowdua = mysqli_fetch_assoc($resultdua)) {
                $_SESSION['labid'] = $rowdua['labid'];
            }
        } else {
            $_SESSION['labid'] = "NOT AVAILABLE";
        }

    }

    if ($_SESSION['status'] == "Pending") {
        echo "pending";
    } else if ($_SESSION['status'] == "Reject") {
        echo "reject";
    } else if ($_SESSION['status'] == "Approve") {
        echo "valid";
    }
} else {
    echo "no data";
}
mysqli_close($conn);
