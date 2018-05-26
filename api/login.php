<?php
header("Content-type:application/json");
require __DIR__ . '/../connection/connection.php';

/**
 * simple method to encrypt or decrypt a plain text string
 * initialization vector(IV) has to be the same when encrypting and decrypting
 *
 * @param string $action: can be 'encrypt' or 'decrypt'
 * @param string $string: string to encrypt or decrypt
 *
 * @return string
 */
function encrypt_decrypt($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'ZWSK';
    $secret_iv = 'ZWSIV';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

$response = [];
$error = false;
$response_code = 200;

if (empty($_POST['identifyid']) || empty($_POST['password'])) {
    $response_code = 400;
    $error = 'Invalid params.';
} else {
    $identifyid = $_POST['identifyid'];
    $password = $_POST['password'];
    $query = "SELECT userid, fname, lname, email, telno, role, admin, identifyid, status, supervisorid, picture FROM user WHERE identifyid = ? AND password = md5(?)";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ss", $identifyid, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        if (mysqli_num_rows($result) === 1) {
            $response = $result->fetch_assoc();
            $response["token"] = encrypt_decrypt('encrypt', $result->fetch_assoc()["userid"]);
        } else {
            $response_code = 404;
            $error = 'User cannot be found.';
        }

        $stmt->close();
    } else {
        $response_code = 500;
        $error = 'Error in: login.';
    }
}

http_response_code($response_code);

if ($error) {
    echo json_encode(array('error' => $error));
} else {
    echo json_encode($response);
}

mysqli_close($conn);
