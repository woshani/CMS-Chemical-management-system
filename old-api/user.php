<?php
class UsersController extends ApiController
{
    /** :POST :{method} */
    public function Login($identifyid, $password)
    {
        require '../connection/connection.php';
        require 'api/jwt_helper.php';

        $response = array();
        $error = false;
        $query = "SELECT userid, fname, lname, email, telno, role, admin, identifyid, status, supervisorid FROM user WHERE identifyid = ? AND password = ?";
        if($stmt = $conn->prepare($query)) {
            $md5password = md5($password);
            $stmt->bind_param("ss", $identifyid, $md5password);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows >= 1) {
                $stmt->bind_result($userid, $fname, $lname, $email, $telno, $role, $admin, $identifyid, $status, $supervisorid);
                $stmt->fetch();
                $token = array();
                $token['userid'] = $userid;
                $jwt = JWT::encode($token, JWT::$secret);
                if ($status != 'Approve') {
                    $error = new HttpResponse(401, 'Unauthorized', (object)[
                        'exception' => (object)[
                            'type' => 'UnauthorizedException',
                            'message' => 'Account Status: ' . $status,
                            'code' => 401
                        ]
                    ]);
                } else {
                    $response['token'] = $jwt;
                    $response['userid'] = $userid;
                    $response['fname'] = $fname;
                    $response['lname'] = $lname;
                    $response['email'] = $email;
                    $response['telno'] = $telno;
                    $response['role'] = $role;
                    $response['admin'] = $admin;
                    $response['identifyid'] = $identifyid;
                    $response['status'] = $status;
                    $response['supervisorid'] = $supervisorid;
                }
            } else {
                $error = new HttpResponse(401, 'Unauthorized', (object)[
                    'exception' => (object)[
                        'type' => 'UnauthorizedException',
                        'message' => 'Invalid Credentials',
                        'code' => 401
                    ]
                ]);
            }

            $stmt->close();
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error in: login Method User API',
                    'code' => 500
                ]
            ]);
        }
        mysqli_close($conn);
        if ($error) {
            return $error;
        } else {
            return $response;
        }
    }

/** :GET :{method}*/
public function User($userid)
{
    require '../connection/connection.php';

    $response = array();
    $error = false;
    $query = "SELECT userid, fname, lname, email, telno, role, admin, identifyid, status, supervisorid FROM user WHERE userid = ?";
    if($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $userid);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($userid, $fname, $lname, $email, $telno, $role, $admin, $identifyid, $status, $supervisorid);
            $stmt->fetch();
            $response['userid'] = $userid;
            $response['fname'] = $fname;
            $response['lname'] = $lname;
            $response['email'] = $email;
            $response['telno'] = $telno;
            $response['role'] = $role;
            $response['admin'] = $admin;
            $response['identifyid'] = $identifyid;
            $response['status'] = $status;
            $response['supervisorid'] = $supervisorid;
        } else {
            $error = new HttpResponse(404, 'Not Found', (object)[
                'exception' => (object)[
                    'type' => 'NotFoundApiException',
                    'message' => 'Staff not found',
                    'code' => 404
                ]
            ]);
        }

        $stmt->close();
    } else {
         $error = new HttpResponse(500, 'Internal Server Error', (object)[
            'exception' => (object)[
                'type' => 'InternalServerErrorException',
                'message' => 'Error in: staff Method Staffs API',
                'code' => 500
            ]
        ]);
    }
    mysqli_close($conn);
    if ($error) {
        return $error;
    } else {
        return $response;
    }
}
}
