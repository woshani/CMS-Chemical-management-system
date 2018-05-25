<?php
class LabOwnersController extends ApiController
{
/** :GET :{method} */
    public function LabOwners()
    {
        require '../connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * from labowner";
        if($stmt = $conn->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            $response = $result->fetch_all( MYSQLI_ASSOC );
            $stmt->close();
        } else {
            $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error in: labowners Method LabOnwers API',
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
    public function LabOwnerByLab($labid)
    {
        require '../connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * FROM labowner WHERE labid = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $labid);
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) >= 1) {
                $response = $result->fetch_all( MYSQLI_ASSOC );
            } else {
                $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'LabOwners not found',
                        'code' => 404
                    ]
                ]);
            }

            $stmt->close();
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error in: labownerbylab Method LabOwners API',
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
    public function LabOwnerByStaff($staffid)
    {
        require '../connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * FROM labowner WHERE staffid = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $staffid);
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) >= 1) {
                $response = $result->fetch_all( MYSQLI_ASSOC );
            } else {
                $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'LabOwners not found',
                        'code' => 404
                    ]
                ]);
            }

            $stmt->close();
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error in: labownerbystaff Method LabOwners API',
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
