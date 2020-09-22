<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost";
$username = "osagi_root";
$password = "oL1d9juzj0klMz!F";
$dbname = "osagiautoscom_work";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$vin = $car = $comment = $technician = '';

 
  	if (!empty($_REQUEST["vin"])) {
        $vin = ($_REQUEST["vin"]);    
    }  
    if (!empty($_REQUEST["car"])) {
        $car = ($_REQUEST["car"]);    
    }
    if (!empty($_REQUEST["comment"])) {
        $comment = ($_REQUEST["comment"]);    
    }
    
    if (!empty($_REQUEST["technician"])) {
        $technician = ($_REQUEST["technician"]);    
    }

    
    $vin = trim($vin);
    $car = trim($car);
    $technician = trim($technician);
	$comment = trim($comment);

	$sql = "INSERT INTO workorder(technician, vin, car, comment) VALUES ('$technician', '$vin', '$car', '$comment');";



if (mysqli_multi_query($conn, $sql)) {

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header ('Location: ../works.php');

