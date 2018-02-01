<?php
class StaffsController extends ApiController
{
/** :GET :{method} */
    public function staffs()
    {
        require 'connection/connection.php';

        $response = array();
        $error = false;
        $query = "SELECT userid, fname, lname, email, telno, role, admin, identifyid, supervisorid from user";
        if($stmt = $conn->prepare($query)) {
            $stmt->execute();
            $result = $stmt->get_result();
            $response = $result->fetch_all( MYSQLI_ASSOC );
            $stmt->close();
        } else {
            $error = new HttpResponse(500, 'Internal Server Error', (object)[
                'exception' => (object)[
                    'type' => 'InternalServerErrorException',
                    'message' => 'Error In staffs Method Staffs API',
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
