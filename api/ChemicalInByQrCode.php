<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

$response = array();
$error = false;

if (empty($_GET['qrcode'])) {
    $error = 'Empty params';
} else {
    $qrcode = $_GET['qrcode'];
    $query = "SELECT * FROM chemicalin WHERE qrcode = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $qrcode);
        $stmt->execute();
        $result = $stmt->get_result();
        if (mysqli_num_rows($result) >= 1) {
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $error = 'No Chemicalin Found For QRCode';
        }

        $stmt->close();
    } else {
        $error = 'Error in chemicalinByQrCode';
    }
    mysqli_close($conn);
}
if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}
