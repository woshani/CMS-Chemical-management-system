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
            $stmt->close();
        } else {
            $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In Chemicals Method Chemical API',
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
    public function chemical($chemicalid)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * FROM chemical WHERE chemicalid = ?";
        if($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $chemicalid);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($chemicalid, $name, $physicaltype, $engcontrol, $ppe, $class, $ghs);
                $stmt->fetch();
                $response['chemicalid'] = $chemicalid;
                $response['name'] = $name;
                $response['physicaltype'] = $physicaltype;
                $response['engcontrol'] = $engcontrol;
                $response['ppe'] = $ppe;
                $response['class'] = $class;
                $response['ghs'] = $ghs;
            } else {
                $error = new HttpResponse(404, 'Not Found', (object)[
                    'exception' => (object)[
                        'type' => 'NotFoundApiException',
                        'message' => 'Chemical not found',
                        'code' => 404
                    ]
                ]);
            }

            $stmt->close();
        } else {
             $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In chemical Method Chemical API',
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
