<?php
$id = $_GET['id'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "osagi_root";
$password = "oL1d9juzj0klMz!F";
$dbname = "osagiautoscom_work";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "DELETE FROM storage WHERE storage.id = $id"; 
$sql = "UPDATE workorder SET archive = 1 where workorder.id= $id ;";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: works.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>