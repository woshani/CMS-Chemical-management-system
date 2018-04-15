<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

$query = "SELECT * from chemical";
if ($stmt = $conn->prepare($query)) {
    $stmt->execute();
    $result = $stmt->get_result();
    $response = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
} else {
    $error = new HttpResponse(500, 'Internal Server Error', (object) [
        'exception' => (object) [
            'type' => 'InternalServerErrorException',
            'message' => 'Error In Chemicals Method Chemical API',
            'code' => 500,
        ],
    ]);
}
mysqli_close($conn);
if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}
