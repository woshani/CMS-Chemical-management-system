<?php
header("Content-type:application/json");
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

if (empty($_POST['status']) || empty($_POST['cuid'])) {
    $response_code = 400;
    $error = 'Invalid params.';
} else {
    $status = $_POST['status'];
    $cuid = $_POST['cuid'];
    $query = "UPDATE chemicalusage SET status = ? WHERE cuid = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ss", $status, $cuid);
        $stmt->execute();

        if ($stmt->affected_rows >= 1) {
            $response = 'Successful';
        } else {
            $response_code = 404;
            $error = 'No ChemicalIn record is updated.';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: update-chemical-usage-approval-status.';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
