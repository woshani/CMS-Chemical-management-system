<?php
class StudentsController extends ApiController
{
/** :GET :{method}*/
    public function studentsUnderSupervision($userid)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT userid, fname, lname, email, telno, role, admin, identifyid, supervisorid FROM user WHERE supervisorid = ?";
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
                        'message' => 'No Student Under Supervision',
                        'code' => 404
                    ]
                ]);
            }
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In studentsUnderSupervision Method Student API',
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

    /** :POST :{method}*/
    public function updateStudentStatus($userid, $role)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "UPDATE user SET role = ? WHERE userid = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ss", $role, $userid);
            $stmt->execute();
            if ($stmt->affected_rows >= 1) {
                $response = 'Successful';
            } else {
               $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'No Student Record is Updated',
                        'code' => 404
                    ]
                ]); 
            }
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In updateStudentStatus Method Student API',
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
