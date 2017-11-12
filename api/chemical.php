<?php
class ChemicalsController extends ApiController
{
/** :GET :{method} */
    public function chemicals()
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * from chemical";
        if($stmt = $conn->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            $response = $result->fetch_all( MYSQLI_ASSOC );
        } else {
            $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In Chemicals Method Chemical API',
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
    public function chemical($chemicalid)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * FROM chemical WHERE chemicalid = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $chemicalid);
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) >= 1) {
                $response = $result->fetch_all( MYSQLI_ASSOC );
            } else {
                $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'Chemical not found',
                        'code' => 404
                    ]
                ]);
            }
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In chemical Method Chemical API',
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
