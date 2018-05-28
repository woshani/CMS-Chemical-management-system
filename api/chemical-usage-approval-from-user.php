<?php
header("Content-type:application/json");
include '../connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

if (empty($_GET['userid'])) {
    $response_code = 400;
    $error = 'Invalid params.';
} else {
    $userid = $_GET['userid'];
    $query = "SELECT cu.cuid, ci.ciid, c.name chemicalname, CONCAT(r.fname, ' ', r.lname) AS requestor, cu.startdate, cu.status FROM chemicalusage cu INNER JOIN chemicalin ci ON ci.ciid = cu.ciid INNER JOIN chemical c ON c.chemicalid = ci.chemicalid INNER JOIN user r ON r.userid = cu.userid WHERE ci.type = 'Private' AND ci.userid = ? ORDER BY cu.startdate DESC";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $userid);
        $stmt->execute();

        $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response_code = 404;
            $error = 'No usage approval found.';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: chemical-usage-approval-from-user.';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
