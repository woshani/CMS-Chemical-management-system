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

/** :GET */
    public function product($id)
    {
        foreach ($this->products as $product) {
            if (strval($product->id) === $id) {
                return $product;
            }
        }

        return null;
    }
}
