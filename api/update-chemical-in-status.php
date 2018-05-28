<?php
header("Content-type:application/json");
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

if (empty($_POST['status']) || empty($_POST['ciid'])) {
    $response_code = 400;
    $error = 'Invalid params.';
} else {
    $status = $_POST['status'];
    $ciid = $_POST['ciid'];
    $query = "UPDATE chemicalin SET status = ? WHERE ciid = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ss", $status, $ciid);
        $stmt->execute();
        
        if ($stmt->affected_rows >= 1) {
            $response = 'Successful';
        } else {
            $response_code = 404;
            $error = 'No Chemicalin record is updated.';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: update-chemical-in-status.';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
