<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

if (empty($_POST['status']) || empty($_POST['userid'])) {
    $response_code = 400;
    $error = 'Invalid params';
} else {
    $status = $_POST['status'];
    $userid = $_POST['userid'];
    $query = "UPDATE user SET status = ? WHERE userid = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ss", $status, $userid);
        $stmt->execute();
        
        if ($stmt->affected_rows >= 1) {
            $response = 'Successful';
        } else {
            $response_code = 404;
            $error = 'No student record is updated';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: update-student-status';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
