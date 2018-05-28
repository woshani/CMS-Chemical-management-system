<?php
header("Content-type:application/json");
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

if (empty($_GET['ciid'])) {
    $response_code = 400;
    $error = 'Invalid params.';
} else {
    $ciid = $_GET['ciid'];
    $query = "SELECT * FROM chemicalin WHERE ciid = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $ciid);
        $stmt->execute();
        
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) === 1) {
            $response = $result->fetch_assoc();
        } else {
            $response_code = 404;
            $error = 'Chemicalin cannot be found.';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: chemical-in-by-id.';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
