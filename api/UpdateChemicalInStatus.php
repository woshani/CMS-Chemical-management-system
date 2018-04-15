<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

if (empty($_POST['status']) || empty($_POST['ciid'])) {
    $error = 'Empty params';
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
            $error = 'No Chemicalin Record is Updated';
        }

        $stmt->close();
    } else {
        $error = 'Error in updateChemicalinStatus';
    }
    mysqli_close($conn);
}
if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}
