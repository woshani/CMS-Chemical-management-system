<?php
class ChemicalUsageController extends ApiController
{
/** :GET :{method} */
    public function myUsage($userid, $status)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT * FROM chemicalusage WHERE userid = ? AND status = ?";
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
                        'message' => 'No Usage made by User',
                        'code' => 404
                    ]
                ]);
            }

            $stmt->close();
        } else {
            $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In myUsage Method ChemicalUsage API',
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
