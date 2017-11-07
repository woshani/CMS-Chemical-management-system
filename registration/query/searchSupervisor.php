<?php 
$connect = mysqli_connect("localhost", "root", "", "cms");

$supervisor = $_POST['supervisor'];

$query = "SELECT user_pk, firstname, lastname where firstname LIKE '%$supervisor%'";

if(mysqli_query($connect, $query))
{ 
	echo "<script>alert('Berjaya.')</script>";
	print "<meta http-equiv='refresh' content='0;url=register.php'>";
	
}

?>