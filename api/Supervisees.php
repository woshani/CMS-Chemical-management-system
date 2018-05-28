<?php
header("Content-type:application/json");
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

if (empty($_GET['userid'])) {
    $response_code = 400;
    $error = 'Invalid params.';
} else {
    $userid = $_GET['userid'];
    $query = "SELECT userid, fname, lname, email, telno, role, admin, identifyid, status, supervisorid FROM user WHERE supervisorid = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $userid);
        $stmt->execute();
        
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response_code = 404;
            $error = 'No student under supervision.';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: supervisees.';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
