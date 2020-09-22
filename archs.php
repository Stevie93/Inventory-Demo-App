<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OsagiAutos</title>
	<link rel="shortcut icon" href="./img/WebForge2.png" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
</head>
<body>
</body>
<!-- header section -->


<section class="hero is-light is-bold is-medium">

<!-- table area -->
<div class="hero-body" style="padding-top:80px;">	
  <div class="container">
    <table class="table is-fullwidth is-striped is-hoverable">
      <thead>
        <tr>
          <th><abbr title="Technician Name">Technician</abbr></th>
 <!--         <th>Reference</th> -->
         <th>Vin</th>
			<th>Car</th>
          <th>Timestamp</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th><abbr title="Technician Name">Technician</abbr></th>
<!--          <th>Reference</th> -->
          <th>Vin</th>
			<th>Car</th>
          <th>Timestamp</th>
        </tr>
      </tfoot>
       <tbody>
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

$query = "SELECT * FROM workorder WHERE workorder.archive = 1 ORDER BY workorder.reg_date DESC";
$result1 = mysqli_query($conn, $query);


               while ($row = mysqli_fetch_array($result1)) {
                   echo "<tr>";
                   echo "<td>".$row['technician']."</td>";
       //            echo "<td>".$row['reference']."</td>";
                   echo "<td>".strtoupper($row['vin'])."</td>";
				   echo "<td>".$row['car']."</td>";
                   echo "<td>".$row['reg_date']."</td>";
				   echo "<td><a href='vieworder.php?id=" . $row['id'] . "'><i class='fas fa-eye'></i></a></td>";
				   echo "<td><a href='deleteorder.php?id=" . $row['id'] . "'><i class='fas fa-trash'></i></a</td>";
			//	   echo "<td><a href='archive.php?id=" . $row['id'] . "'><i class='fas fa-folder'></i></a</td>";
				   
			//	   echo "<td><a href='tel:+1". $row['phone'] . "'><i class='fas fa-phone'></i></a></td>";

  /*               if ($row['outstanding']>0){
                   echo "<td><a href='payoff.php?id=" . $row['id'] . "'><i class='fas fa-calculator'></i></a></td>";}
                   echo "</tr>"; */
               }

           ?>
      </tbody>
    </table>
	  <br><br>
      <div class="field is-grouped is-grouped-centered">
		<p class="control"><a href="index.php" class="button is-warning is-small">Home</a></p>
        <p class="control"><a href="workorder.php" class="button is-info is-small">New Record</a></p>
        </p>
      </div>
    <?php mysqli_close($conn); ?>
  </div>
</div>
</section>
</html>

