<?php

include $_SERVER['DOCUMENT_ROOT'] . '/connection/connection.php';
$chem_name = $_POST['chem_name'];
$phystype = $_POST['phystype'];
$engControl = $_POST['engControl'];
$ppe = $_POST['ppe'];
$classses = $_POST['classses'];
$ghs = $_POST['ghs'];
$sqlSelect = "SELECT name,physicaltype,engcontrol,ppe,class,ghs FROM chemical WHERE name='" . $chem_name . "'AND physicaltype='" . $phystype . "'AND engcontrol='" . $engControl . "' AND ppe='" . $ppe . "' AND class = '" . $classses . "' AND ghs = '" . $ghs . "';";
$resultSelect = mysqli_query($conn, $sqlSelect);
if ($resultSelect->num_rows < 1) {
    $queryTwo = "INSERT INTO chemical(name,physicaltype,engcontrol,ppe,class,ghs) VALUES('" . $chem_name . "','" . $phystype . "','" . $engControl . "','" . $ppe . "','" . $classses . "','" . $ghs . "');";
    $resultInsertTwo = mysqli_query($conn, $queryTwo);
    if ($resultInsertTwo) {
        echo 'success';
    } else {
        echo 'fail';
    }
} else {
    echo 'already';
}
mysqli_close($conn);
