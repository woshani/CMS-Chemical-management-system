<?php 
include "../../connection/connection.php";
// $id_chemical = $_POST['id_chemical'];
 $id_owner = $_POST['id_owner'];
// $id_lab = $_POST['id_lab'];
// $dateexp = $_POST['dateexp'];
// $status = $_POST['status'];
// $supplier = $_POST['supplier'];
// $stats = $_POST['stats'];
 $qrcode = $_POST['qrcode'];
// $qrcode = "C0100000000002";
// $id_owner ="102";
$ciid="";
		$sqlSelect = "SELECT ciid FROM chemicalin WHERE qrcode='".$qrcode."';";
		$resultSelect = mysqli_query($conn, $sqlSelect);
		if($resultSelect->num_rows > 0){
			while ($row = mysqli_fetch_array($resultSelect)){
				$ciid = $row['ciid'];
			}
			$queryTwo = "INSERT INTO chemicalusage(startdate,status,userid,ciid) VALUES(now(),'Approve','".$id_owner."','".$ciid."');";
			$queryTwo .= "UPDATE chemicalin SET status ='In Use' WHERE ciid ='".$ciid."';";
			$resultInsertTwo = mysqli_multi_query($conn, $queryTwo);
			if($resultInsertTwo){
				echo "success";
			}else{
				echo "fail";
			}
		}
mysqli_close($conn);
?>