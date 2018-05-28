<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';
$chemical = $_POST['input'];

$query = "SELECT chemicalid,name,physicaltype,engcontrol,ppe,class,ghs FROM chemical WHERE name ='".$chemical."';";

$result = mysqli_query($conn, $query);
if($result->num_rows > 0){
	while ($row = mysqli_fetch_assoc($result)){
		$id =  $row['chemicalid'];
		$name =  $row['name'];
		$type = "-";
		$physicaltype = $row['physicaltype'];
		$engcontrol = $row['engcontrol'];
		$ppe = $row['ppe'];
		$class = $row['class'];
		$ghs = $row['ghs'];
	}
	echo $id."|".$name."|".$type."|".$physicaltype."|".$engcontrol."|".$ppe."|".$class."|".$ghs;
}
mysqli_close($conn);
?>