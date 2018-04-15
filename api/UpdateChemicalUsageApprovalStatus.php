<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

if (empty($_POST['status']) || empty($_POST['cuid'])) {
    $error = 'Empty params';
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
            $error = 'No Chemicalin Record is Updated';
        }

        $stmt->close();
    } else {
        $error = 'Error in updateChemicalUsageApprovalStatus';
    }
    mysqli_close($conn);
}
if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}
