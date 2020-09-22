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

$result = $phone = $item = $amount = $message = $clientname = $product = $outstanding = $reference = $comment = $year = $received = $gatein = $gateout ='';
 
  	if (!empty($_REQUEST["phone"])) {
        $phone = ($_REQUEST["phone"]);    
    }  
    if (!empty($_REQUEST["clientname"])) {
        $clientname = ($_REQUEST["clientname"]);    
    }
if (!empty($_REQUEST["gatein"])) {
        $gatein = ($_REQUEST["gatein"]);    
    }
if (!empty($_REQUEST["gateout"])) {
        $gateout = ($_REQUEST["gateout"]);    
    }
    if (!empty($_REQUEST["product"])) {
        $product = ($_REQUEST["product"]);    
    }
    
    if (!empty($_REQUEST["comment"])) {
        $comment = ($_REQUEST["comment"]);    
    }
  if (!empty($_REQUEST["vin"])) {
        $vin = ($_REQUEST["vin"]);    
    }

    
    $phone = trim($phone);
    $comment = trim($comment);
    $clientname = trim($clientname);
	$product = trim($product);
	$gatein = trim($gatein);
	$gateout = trim($gateout);

	$sql = "INSERT INTO storage(client, phone, product, comment, gatein, gateout, vin) VALUES ('$clientname', '$phone', '$product', '$comment', '$gatein', '$gateout', '$vin');";



if (mysqli_multi_query($conn, $sql)) {
//	echo 'success';

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header ('Location: ../storagerecords.php');
