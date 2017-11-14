<?php
$dir = "../../SDS/";
move_uploaded_file($_FILES["PDF"]["tmp_name"], $dir. $_FILES["PDF"]["name"]);
?>