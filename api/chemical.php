<?php

require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

if (empty($_GET['chemicalid'])) {
    $error = 'Empty params';
} else {
    $chemicalid = $_GET['chemicalid'];
    $query = "SELECT * FROM chemical WHERE chemicalid = ?";
    if($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $chemicalid);
        $stmt->execute();
         $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all( MYSQLI_ASSOC );
        } else {
            $error = 'Chemical not found';
        }

        $stmt->close();
    } else {
         $error = 'Error in chemical';
    }
    mysqli_close($conn);
}
if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}