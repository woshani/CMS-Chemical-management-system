<?php
class ChemicalInController extends ApiController
{
/** :GET :{method} */
    public function chemicalsIn($userid)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT ciid, type, datein, expireddate, status, qrcode, sds, supliername, chemicalid, userid, labid FROM chemicalin WHERE userid = ?";
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
                        'message' => 'No Chemicals Ever Used by User',
                        'code' => 404
                    ]
                ]);
            }
        } else {
                $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In chemicalsIn Method ChemicalIn API',
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
    public function chemicalqrcode($qrcode)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * FROM chemicalin WHERE qrcode = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $qrcode);
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) >= 1) {
                $response = $result->fetch_all( MYSQLI_ASSOC );
            } else {
                $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'No Chemicalin Found For QRCode',
                        'code' => 404
                    ]
                ]);
            }
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In chemicalqrcode Method ChemicalIn API',
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
    public function updateChemicalinStatus($ciid, $status)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "UPDATE chemicalin SET status = ? WHERE ciid = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ss", $status, $ciid);
            $stmt->execute();
            if ($stmt->affected_rows >= 1) {
                $response = 'Successful';
            } else {
               $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'No Chemicalin Record is Updated',
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
