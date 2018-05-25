<?php
class StudentsController extends ApiController
{
/** :GET :{method}*/
    public function StudentsUnderSupervision($userid)
    {
        require '../connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT userid, fname, lname, email, telno, role, admin, identifyid, status, supervisorid FROM user WHERE supervisorid = ?";
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

            $stmt->close();
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error in: studentsUnderSupervision Method Student API',
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

    /** :POST :{method}*/
    public function UpdateStudentStatus($userid, $status)
    {
        require '../connection/connection.php';

        $response = array();
        $error = false;
        $query = "UPDATE user SET status = ? WHERE userid = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ss", $status, $userid);
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

            $stmt->close();
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error in: updateStudentStatus Method Student API',
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
