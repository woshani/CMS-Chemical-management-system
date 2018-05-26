<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

$query = "SELECT userid, fname, lname, email, telno, role, admin, identifyid, supervisorid from user";
if ($stmt = $conn->prepare($query)) {
    $stmt->execute();

    $result = $stmt->get_result();
    $response = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
} else {
    $response_code = 500;
    $error = 'Error in: staffs.';
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
