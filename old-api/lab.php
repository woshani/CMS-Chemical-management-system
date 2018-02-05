<?php
class LabsController extends ApiController
{
/** :GET :{method} */
    public function Labs()
    {
        require '../connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * from lab";
        if($stmt = $conn->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            $response = $result->fetch_all( MYSQLI_ASSOC );
            $stmt->close();
        } else {
            $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In labs Method Lab API',
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
    public function Lab($labid)
    {
        require '../connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * FROM lab WHERE labid = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $labid);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($labid, $name);
                $stmt->fetch();
                $response['labid'] = $labid;
                $response['name'] = $name;
            } else {
                $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'Lab not found',
                        'code' => 404
                    ]
                ]);
            }
        
            $stmt->close();
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In lab Method Lab API',
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
