<?php
class StaffsController extends ApiController
{
/** :GET :{method} */
    public function staffs()
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT userid, fname, lname, email, telno, role, admin, identifyid, supervisorid from user";
        if($stmt = $conn->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            $response = $result->fetch_all( MYSQLI_ASSOC );
        } else {
            $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In staffs Method Staffs API',
                    'code' => 500
                ]
            ]);
        }
        $stmt->close();
        mysqli_close($conn);
        if ($error) {
            return $error;
        } else {
            return $response;
        }
    }

/** :GET :{method}*/
    public function staff($userid)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT fname, lname, email, telno, role, admin, identifyid, supervisorid FROM user WHERE userid = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $userid);
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) >= 1) {
                $response = $result->fetch_all( MYSQLI_ASSOC );
            } else {
                $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'Staff not found',
                        'code' => 404
                    ]
                ]);
            }
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In staff Method Staffs API',
                    'code' => 500
                ]
            ]);
        }
        $stmt->close();
        mysqli_close($conn);
        if ($error) {
            return $error;
        } else {
            return $response;
        }
    }
}
