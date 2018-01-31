<?php
require __DIR__ . '/../connection/connection.php';
	
$response = array();
$error = false;

if (empty($_GET['userid']) || empty($_GET['status'])) {
	$error = 'Empty params';
} else {
	$userid = $_GET['userid'];
	$status = $_GET['status'];
    $query = "SELECT ci.ciid, ci.type, ci.status, c.name FROM chemicalin ci INNER JOIN chemical c ON ci.chemicalid = C.chemicalid WHERE userid = ? AND status = ?";
    if($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ss", $userid, $status);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all( MYSQLI_ASSOC );
        } else {
            $error = 'No Chemicals With for this Status was Founded: ' . $status;
        }
        
        $stmt->close();
    } else {
        $error = 'Error In chemicalsIn Method ChemicalIn API';
    }
    mysqli_close($conn);
}

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}
