<?php
class ChemicalUsageController extends ApiController
{
    /** :GET :{method} */
    public function myUsageByStatus($userid, $status)
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

    /** :GET :{method} */
    public function chemicalUsageByUser($userid)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT ci.ciid, c.name chemicalname, CONCAT(o.fname, ' ', o.lname) AS owner, ci.expireddate, l.name location, CONCAT(cu.startdate, ' - ', CASE WHEN cu.enddate = CONVERT(0,DATETIME) THEN 'Today' ELSE cu.enddate END) AS usedaterange FROM chemicalusage cu INNER JOIN chemicalin ci ON ci.ciid = cu.ciid INNER JOIN chemical c ON c.chemicalid = ci.chemicalid INNER JOIN user o ON o.userid = ci.userid INNER JOIN lab l ON l.labid = ci.labid WHERE cu.status = 'Approve' AND cu.userid = ? ORDER BY cu.startdate DESC, cu.enddate";
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

    /** :GET :{method} */
    public function chemicalRequestByUser($userid)
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT ci.ciid, c.name chemicalname, CONCAT(o.fname, ' ', o.lname) AS owner, cu.status FROM chemicalusage cu INNER JOIN chemicalin ci ON ci.ciid = cu.ciid INNER JOIN chemical c ON c.chemicalid = ci.chemicalid INNER JOIN user o ON o.userid = ci.userid WHERE cu.status != 'Approve' AND cu.userid = ? ORDER BY cu.startdate DESC";
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
                        'message' => 'No request made by User',
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
