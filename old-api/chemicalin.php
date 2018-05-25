<?php
class ChemicalInController extends ApiController
{
/** :GET :{method} */
    public function ChemicalInByUserStatus($userid, $status)
    {
        require '../connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT ci.ciid, ci.type, ci.status, c.name FROM chemicalin ci INNER JOIN chemical c ON ci.chemicalid = C.chemicalid WHERE userid = ? AND status = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ss", $userid, $status);
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) >= 1) {
                $response = $result->fetch_all( MYSQLI_ASSOC );
            } else {
                $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'No Chemicals With for this Status was Founded: ' . $status,
                        'code' => 404
                    ]
                ]);
            }
            
            $stmt->close();
        } else {
                $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error in: chemicalsIn Method ChemicalIn API',
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
    public function ChemicalIn($ciid)
    {
        require '../connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * FROM chemicalin WHERE ciid = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $ciid);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($ciid, $type, $datein, $expireddate, $status, $qrcode, $sds, $supliername, $chemicalid, $userid, $labid);
                $stmt->fetch();
                $response['ciid'] = $ciid;
                $response['type'] = $type;
                $response['datein'] = $datein;
                $response['expireddate'] = $expireddate;
                $response['status'] = $status;
                $response['qrcode'] = $qrcode;
                $response['sds'] = $sds;
                $response['supliername'] = $supliername;
                $response['chemicalid'] = $chemicalid;
                $response['userid'] = $userid;
                $response['labid'] = $labid;
            } else {
                $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'No Chemicalin Found For QRCode',
                        'code' => 404
                    ]
                ]);
            }

            $stmt->close();
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error in: chemicalqrcode Method ChemicalIn API',
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
    public function ChemicalInByQrCode($qrcode)
    {
        require '../connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * FROM chemicalin WHERE qrcode = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $qrcode);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($ciid, $type, $datein, $expireddate, $status, $qrcode, $sds, $supliername, $chemicalid, $userid, $labid);
                $stmt->fetch();
                $response['ciid'] = $ciid;
                $response['type'] = $type;
                $response['datein'] = $datein;
                $response['expireddate'] = $expireddate;
                $response['status'] = $status;
                $response['qrcode'] = $qrcode;
                $response['sds'] = $sds;
                $response['supliername'] = $supliername;
                $response['chemicalid'] = $chemicalid;
                $response['userid'] = $userid;
                $response['labid'] = $labid;
            } else {
                $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'No Chemicalin Found For QRCode',
                        'code' => 404
                    ]
                ]);
            }

            $stmt->close();
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error in: chemicalqrcode Method ChemicalIn API',
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
    public function UpdateChemicalInStatus($ciid, $status)
    {
        require '../connection/connection.php';

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
