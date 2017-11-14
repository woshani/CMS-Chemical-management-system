<?php 
include "../../connection/connection.php";
$chemical = $_POST['input'];

$query = "SELECT chemicalid,name,type,physicaltype,engcontrol,ppe FROM chemical WHERE name ='".$chemical."';";

$result = mysqli_query($conn, $query);
if($result->num_rows > 0){
	while ($row = mysqli_fetch_assoc($result)){
		$id =  $row['chemicalid'];
		$name =  $row['name'];
		$type = $row['type'];
		$physicaltype = $row['physicaltype'];
		$engcontrol = $row['engcontrol'];
		$ppe = $row['ppe'];
	}
	echo $id."|".$name."|".$type."|".$physicaltype."|".$engcontrol."|".$ppe;
}
mysqli_close($conn);
?>