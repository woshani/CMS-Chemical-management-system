<?php

include '../../connection/connection.php';
$idstaff = $_POST['staffid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$telno = $_POST['telno'];
$role = $_POST['role'];
$admin = $_POST['admin'];
$sqlSelect = "SELECT identifyid FROM user WHERE identifyid='" . $idstaff . "';";
$resultSelect = mysqli_query($conn, $sqlSelect);
if ($resultSelect->num_rows < 1) {
    $queryTwo = "INSERT INTO user(fname,lname,email,telno,role,admin,identifyid,status) VALUES('" . $fname . "','" . $lname . "','" . $email . "','" . $telno . "','" . $role . "','" . $admin . "','" . $idstaff . "','Approve');";
    $resultInsertTwo = mysqli_query($conn, $queryTwo);
    if ($resultInsertTwo) {
        echo 'success';
    } else {
        echo 'fail';
    }
} else {
    echo 'already';
}
mysqli_close($conn);
