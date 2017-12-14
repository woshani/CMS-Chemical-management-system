<?php
$dir = "../../SDS/";
$temp = explode(".", $_FILES["PDF"]["name"]);
$newfilename = $_POST["newname"] . '.' . end($temp);
move_uploaded_file($_FILES["PDF"]["tmp_name"], $dir. $newfilename);
echo $newfilename;
?>