<?php 
include '../../connection/connection.php';
$chemical = $_POST['input'];

$query = "SELECT chemicalid,name,physicaltype,engcontrol,ppe FROM chemical WHERE name LIKE '%".$chemical."%'";
$list="";
$resultSelect = mysqli_query($conn, $query);

if($resultSelect->num_rows > 0){
	while ($row = mysqli_fetch_array($resultSelect)){
		$list .= "<li>".$row['name']."</li>";
	}
	echo"<ul id='matchListChemical' style='width: auto; height: 200px; overflow: auto'>".$list."</ul>"; 
}
mysqli_close($conn);
?>