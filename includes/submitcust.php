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

$result = $phone = $item = $amount = $message = $clientname = $product = $outstanding = $reference = $comment = $year = $received = '';
 
  	if (!empty($_REQUEST["phone"])) {
        $phone = ($_REQUEST["phone"]);    
    }  
    if (!empty($_REQUEST["clientname"])) {
        $clientname = ($_REQUEST["clientname"]);    
    }
    if (!empty($_REQUEST["product"])) {
        $product = ($_REQUEST["product"]);    
    }
    
    if (!empty($_REQUEST["comment"])) {
        $comment = ($_REQUEST["comment"]);    
    }

    
    $phone = trim($phone);
    $comment = trim($comment);
    $clientname = trim($clientname);
	$product = trim($product);

	$sql = "INSERT INTO customer(client, phone, product, comment) VALUES ('$clientname', '$phone', '$product', '$comment');";



if (mysqli_multi_query($conn, $sql)) {

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

if ($product == 'Vendor'){header ('Location: ../vendors.php');}
else {header ('Location: ../customers.php');}

