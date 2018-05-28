<?php 
include '../../connection/connection.php';
$supervisor = $_POST['input'];

$query = "SELECT userid,email FROM user WHERE role = 'PJ' AND (CONCAT(fname,' ', lname) ='".$supervisor."');";

$result = mysqli_query($conn, $query);
if($result->num_rows > 0){
	while ($row = mysqli_fetch_assoc($result)){
		$id =  $row['userid'];
		$email =  $row['email'];
	}
	echo $id."|".$email;
}
mysqli_close($conn);
?>