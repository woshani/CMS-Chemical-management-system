<?php 
include "../../connection/connection.php";
$supervisor = $_POST['input'];

$query = "SELECT fname,lname,userid,identifyid FROM user WHERE role = 'PJ' AND (CONCAT(fname,' ', lname) LIKE '%".$supervisor."%')";
$list="";
$resultSelect = mysqli_query($conn, $query);
if($resultSelect->num_rows > 0){
	while ($row = mysqli_fetch_array($resultSelect)){
		$list .= "<li>".$row['fname']." ".$row['lname']."</li>";
	}
	echo"<ul id='matchListPJ' style='width: auto; height: 200px; overflow: auto'>".$list."</ul>"; 
}else{
	echo"<ul id='' style='width: auto; height: 200px; overflow: auto'>No PJ is found!</ul>"; 
}
mysqli_close($conn);
?>