<?php

require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

if (empty($_GET['ciid'])) {
    $error = 'Empty params';
} else {
	$ciid = $_GET['ciid'];
    $query = "SELECT * FROM chemicalin WHERE ciid = ?";
    if($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $ciid);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all( MYSQLI_ASSOC );
        } else {
            $error = 'No Chemicalin Found For QRCode';
        }

        $stmt->close();
    } else {
         $error = 'Error in chemicalin';
    }
    mysqli_close($conn);
}
if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}
