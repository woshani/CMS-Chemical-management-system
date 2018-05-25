<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;
$response_code = 200;

if (empty($_GET['userid'])) {
    $response_code = 400;
    $error = 'Invalid params';
} else {
    $userid = $_GET['userid'];
    $query = "SELECT ci.ciid, c.name chemicalname, CONCAT(o.fname, ' ', o.lname) AS owner, ci.expireddate, l.name location, CONCAT(cu.startdate, ' - ', CASE WHEN cu.enddate = CONVERT(0,DATETIME) THEN 'Today' ELSE cu.enddate END) AS usedaterange FROM chemicalusage cu INNER JOIN chemicalin ci ON ci.ciid = cu.ciid INNER JOIN chemical c ON c.chemicalid = ci.chemicalid INNER JOIN user o ON o.userid = ci.userid INNER JOIN lab l ON l.labid = ci.labid WHERE cu.status = 'Approve' AND cu.userid = ? ORDER BY cu.startdate DESC, cu.enddate";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $userid);
        $stmt->execute();

        $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response_code = 404;
            $error = 'No Usage made by User';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: chemicalUsageByUser';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
