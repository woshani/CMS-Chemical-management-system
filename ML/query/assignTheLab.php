<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';
$staff = $_POST['staff'];
$lab = $_POST['lab'];


$select = "SELECT * FROM labowner WHERE labid ='".$lab."' AND staffid = '".$staff."'";
$query = "INSERT INTO labowner(labid,staffid) VALUES('".$lab."','".$staff."')";

$result = mysqli_query($conn, $select);
if($result->num_rows < 1){
	$resultDua = mysqli_query($conn, $query);
	if($resultDua){
		echo "success";
	}else{
		echo "fail";
	}
}else{
	echo "already";
}
mysqli_close($conn);
?>