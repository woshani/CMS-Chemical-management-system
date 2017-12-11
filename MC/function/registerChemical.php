<?php 
include "../../connection/connection.php";
$id_chemical = $_POST['id_chemical'];
$id_owner = $_POST['id_owner'];
$id_lab = $_POST['id_lab'];
$dateexp = $_POST['dateexp'];
$status = $_POST['status'];
$supplier = $_POST['supplier'];
$stats = $_POST['stats'];
$qrcode = $_POST['qrcode'];
$sds = $_POST['sds'];
$ciid="";
$sqlSelect = "SELECT ciid FROM chemicalin WHERE qrcode='".$qrcode."';";
$resultSelect = mysqli_query($conn, $sqlSelect);
		if($resultSelect->num_rows > 0){
			echo "qrcode";
		}else{
			$query = "INSERT INTO chemicalin(type,datein,expireddate,status,qrcode,sds,supliername,chemicalid,userid,labid) VALUES('".$status."',now(),'".$dateexp."','".$stats."','".$qrcode."','".$sds."','".$supplier."','".$id_chemical."','".$id_owner."','".$id_lab."');";

			$resultInsert = mysqli_query($conn, $query);
			if($resultInsert){
				echo "success";

			}else{
				echo "fail";
			}	
		}


mysqli_close($conn);
?>