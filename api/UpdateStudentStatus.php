<?php

require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

if (empty($_POST['status']) || empty($_POST['userid'])) {
    $error = 'Empty params';
} else {
    $status = $_POST['status'];
    $userid = $_POST['userid'];
    $query = "UPDATE user SET status = ? WHERE userid = ?";
    if($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ss", $status, $userid);
        $stmt->execute();
        if ($stmt->affected_rows >= 1) {
            $response = 'Successful';
        } else {
           $error = 'No student record is updated'; 
        }

        $stmt->close();
    } else {
         $error = 'Error in updateStudentStatus';
    }
    mysqli_close($conn);
}
if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}