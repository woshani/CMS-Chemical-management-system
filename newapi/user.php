<?php

require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

if (empty($_GET['userid'])) {
    $error = 'Empty params';
} else {
	$userid = $_GET['userid'];
    $query = "SELECT userid, fname, lname, email, telno, role, admin, identifyid, status, supervisorid FROM user WHERE userid = ?";
    if($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all( MYSQLI_ASSOC );
        } else {
            $error = 'User not found';
        }

        $stmt->close();
    } else {
         $error = 'Error in user';
    }
    mysqli_close($conn);
}
if ($error) {
	echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}