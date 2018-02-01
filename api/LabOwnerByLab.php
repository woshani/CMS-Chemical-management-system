<?php

require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

if (empty($_GET['labid'])) {
    $error = 'Empty params';
} else {
	$labid = $_GET['labid'];
    $query = "SELECT * FROM labowner WHERE labid = ?";
    if($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $labid);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all( MYSQLI_ASSOC );
        } else {
            $error = 'LabOwners not found';
        }

        $stmt->close();
    } else {
         $error = 'Error in labownerbylab';
    }
    mysqli_close($conn);
}
if ($error) {
	echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}