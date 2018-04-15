<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

if (empty($_GET['staffid'])) {
    $error = 'Empty params';
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
            $error = 'LabOwners not found';
        }

        $stmt->close();
    } else {
        $error = 'Error in labownerbystaff';
    }
    mysqli_close($conn);
}
if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}
