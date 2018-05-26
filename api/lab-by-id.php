<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

if (empty($_GET['labid'])) {
    $response_code = 400;
    $error = 'Invalid params.';
} else {
    $labid = $_GET['labid'];
    $query = "SELECT * FROM lab WHERE labid = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $labid);
        $stmt->execute();

        $result = $stmt->get_result();
        if (mysqli_num_rows($result) === 1) {
            $response = $result->fetch_assoc();
        } else {
            $response_code = 404;
            $error = 'Lab not found.';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: lab-by-id.';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
