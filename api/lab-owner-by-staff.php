<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

if (empty($_GET['staffid'])) {
    $response_code = 400;
    $error = 'Invalid params.';
} else {
    $staffid = $_GET['staffid'];
    $query = "SELECT * FROM labowner WHERE staffid = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $staffid);
        $stmt->execute();
        
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response_code = 404;
            $error = 'Lab owners not found.';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: lab-owner-by-staff.';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
