<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';

$id = $_POST['id'];

$sqlfind = "select concat(u.fname,' ',u.lname) as fullname,u.identifyid,u.telno,u.email,cu.startdate as borrowdate from user u
inner join chemicalin ci on ci.chemicalid='".$id."'
inner join chemicalusage cu on cu.ciid=ci.ciid AND cu.status ='Approve'
WHERE u.userid = cu.userid";

$resultString="";
$selectResult = mysqli_query($conn,$sqlfind);
if(mysqli_num_rows($selectResult) > 0){
	while($row = mysqli_fetch_array($selectResult)){
		$resultString=$row['fullname']."|".$row['identifyid']."|".$row['telno']."|".$row['email']."|".$row['borrowdate'];
	}
	echo $resultString;
}else{
	echo "no one";
}
mysqli_close($conn);
?>