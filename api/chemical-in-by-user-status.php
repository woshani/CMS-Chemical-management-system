<?php
header("Content-type:application/json");
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

if (empty($_GET['userid']) || empty($_GET['status'])) {
    $response_code = 400;
    $error = 'Invalid params.';
} else {
    $userid = $_GET['userid'];
    $status = $_GET['status'];
    $query = "SELECT ci.ciid, ci.type, ci.status, c.name FROM chemicalin ci INNER JOIN chemical c ON ci.chemicalid = C.chemicalid WHERE userid = ? AND status = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ss", $userid, $status);
        $stmt->execute();

        $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response_code = 404;
            $error = 'No Chemicals with this status was founded.';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: chemical-in-by-user-status.';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
