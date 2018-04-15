<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

if (empty($_GET['userid'])) {
    $error = 'Empty params';
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
            $error = 'No request made by User';
        }

        $stmt->close();
    } else {
        $error = 'Error in chemicalUsageApprovalFromUser';
    }
    mysqli_close($conn);
}

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}
