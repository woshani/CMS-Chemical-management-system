<?php
class LabOwnersController extends ApiController
{
/** :GET :{method} */
    public function labowners()
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * from labowner";
        if($stmt = $conn->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            $response = $result->fetch_all( MYSQLI_ASSOC );
        } else {
            $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In labowners Method LabOnwers API',
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
    public function labownerbylab($labid)
    {
        require 'connection/connection.php';

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
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In labownerbylab Method LabOwners API',
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
    public function labownerbystaff($staffid)
    {
        require 'connection/connection.php';

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
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In labownerbystaff Method LabOwners API',
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