<?php
class LabsController extends ApiController
{
/** :GET :{method} */
    public function labs()
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * from lab";
        if($stmt = $conn->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            $response = $result->fetch_all( MYSQLI_ASSOC );
        } else {
            $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In labs Method Lab API',
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
    public function lab($labid)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * FROM lab WHERE labid = ?";
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
                        'message' => 'Lab not found',
                        'code' => 404
                    ]
                ]);
            }
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In lab Method Lab API',
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
