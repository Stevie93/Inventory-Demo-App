<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WebReceiptPro | Datasheet</title>
	<link rel="shortcut icon" href="./img/WebForge2.png" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
	<script>
			const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
    v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
    )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

// do the work...
document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
    const table = th.closest('table');
    Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
        .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
        .forEach(tr => table.appendChild(tr) );
})));
		
</script>
		
</head>
<body>
</body>
<!-- header section -->


<section class="hero is-light is-bold is-medium">

<!-- table area -->
<div class="hero-body" style="padding-top:80px;">	
  <div class="container">
    <table class="table is-fullwidth is-striped is-hoverable is-narrow">
      <thead>
        <tr>
          <th><abbr title="Client Name">Client</abbr></th>
 <!--         <th>Reference</th> -->
          <th>Phone</th>
          <th>Vehicle Type</th>
          <th>Gate In</th>
          <th>Description</th>
          <th>Vin</th>
          <th>Paid</th>
          <th>Months in Storage</th>
			<th>Outstanding</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th><abbr title="Client Name">Client</abbr></th>
<!--          <th>Reference</th> -->
          <th>Phone</th>
          <th>Vehicle Type</th>
          <th>Gate In</th>
          <th>Description</th>
          <th>Vin</th>
          <th>Paid</th>
          <th>Months in Storage</th>
			<th>Outstanding</th>
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

$query = "SELECT * FROM storage ORDER BY client, vin DESC";
$result1 = mysqli_query($conn, $query);

               while ($row = mysqli_fetch_array($result1)) {
                   echo "<tr>";
                   echo "<td>".$row['client']."</td>";
       //            echo "<td>".$row['reference']."</td>";
                   echo "<td>".$row['phone']."</td>";
                   echo "<td>".$row['product']."</td>";
                   echo "<td>".$row['gatein']."</td>";
                   echo "<td>".$row['comment']."</td>";
                   echo "<td>".$row['vin']."</td>";
				   
				   $date1 = $row['gatein'];
				   	date_default_timezone_set('America/New_York');
				   $date2 = date('Y-m-d');
$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year2 - $year1) * 12) + ($month2 - $month1); 
				   
           //        $amount = $row['amount'];
           //      $outstanding = $row['outstanding'];
           //        $paid = $amount-$outstanding;
                   echo "<td>". $row ['paid']."</td>";
                   echo "<td>".$diff.' months'."</td>";
				   $madepay = $row ['paid'];
				   $outs = $diff - $madepay;
				   echo "<td>" .$outs.' payments missed'."</td>";
            //       if ($row['outstanding']>0){
                   echo "<td><a href='payment.php?id=" . $row['id'] . "'><i class='fas fa-cart-plus'></i></a></td>";
                   echo "<td><a href='tel:+1". $row['phone'] . "'><i class='fas fa-phone'></i></a></td>";
		   echo "<td><a href='gateout.php?id=" . $row['id'] . "'><i class='fas fa-sign-out-alt'></i></a></td>"; 
				   echo "</tr>";
               }

            ?>
      </tbody>
    </table>
	  <br><br>
      <div class="field is-grouped is-grouped-centered">
		<p class="control"><a href="index.php" class="button is-warning is-small">Home</a></p>
        <p class="control"><a href="storage.php" class="button is-info is-small">Add Another Vehicle</a></p>
        
      </div>
    <?php mysqli_close($conn); ?>
  </div>
</div>
</section>

<!-- contact us section -->


<!-- footer -->

</html>