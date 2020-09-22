<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = '';

  	if (!empty($_REQUEST["id"])) {
        $id = ($_REQUEST["id"]); 
 }

$servername = "localhost";
$username = "osagi_root";
$password = "oL1d9juzj0klMz!F";
$dbname = "osagiautoscom_work";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// $id=mysqli_real_escape_string($conn,$_POST['id']);

$vin = $car = $comment = $technician = '';

$query = "select * from storage where  id='" . $_GET['id'] . "' ";

$result1 = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result1)) {
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
	
	$madepay = $row ['paid'];
	$outs = $diff - $madepay;




	
	$type = $row ['product'];
	$passid= $row ['id'];
	$_SESSION['passid'] = $passid;
	
	

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Osagi Autos</title>
  <link rel="shortcut icon" href="./img/WebForge2.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
  <script>
function myFunction() {
    location.reload();
}
</script>
</head>
<body>
  <!-- Request Invitation section -->
  <section class="section" style="padding: 1rem 1.5rem; background:#f5f5f5;">
    <div class="container">
      <nav class="level" style="padding:10px; margin:20px; margin-top:5px;">
        <!-- Left side -->
        <div class="level-left">
          <div class="level-item">
     <!-- <a href="dashboard.php"><img src="./img/WebForge.png" width="300px" alt=""></a> -->
            
          </div>
        </div>

        <!-- Right side -->
        <div class="level-right is-hidden-mobile">
        </div>
      </nav>
    </div>
    <div class="container" style="max-width:500px; padding:20px; background:#e6e4e4;">
      
      
<form method="post" action="includes/submitpayment.php">
      <br>
      <div class="field">
        <p class="help is-dark">Customer Information<span class="has-text-danger">*</span></p>
        <p class="control has-icons-left has-icons-right">
          <input class="input is-primary" type="text" placeholder="Akwasi Boadu" name = "clientname" value="<?php echo $row ['client']; ?>" disabled>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </p>

      </div>
      <div class="field">
        <p class="control has-icons-left">
          <input class="input is-primary" type="number" placeholder="5084109557" name = "phone" value="<?php echo $row ['phone']; ?>" disabled>
          <span class="icon is-small is-left">
            <i class="fas fa-phone"></i>
          </span>
        </p>
      </div>
	<div class="field">
        <p class="control">
          <input type = "hidden" class="input is-primary" type="number" value="<?php echo $row ['id']; ?>" disabled>
        </p>
      </div>
	<br>
	
	<p class="help is-dark">Months Paid <?php echo "[".$outs." months in outstanding]"; ?></p>
      <div class="field is-horizontal">
        <div class="field-body">
          <div class="field has-addons">
            <p class="control">
              <a class="button is-static has-text-success">
                <i class="fas fa-calendar"></i>
              </a>
            </p>
            <p class="control">
              <input class="input is-primary" type="number" name = "paid" required>
            </p>
          </div>
          </div>
        </div>
	<p class="help is-dark"><span class="has-text-success">Gate In</span></p>
      <div class="field is-horizontal">
        <div class="field-body">
          <div class="field has-addons">
            <p class="control">
              <a class="button is-static has-text-success">
                <i class="fas fa-calendar"></i>
              </a>
            </p>
            <p class="control">
              <input class="input is-primary" type="date" name = "gatein" value="<?php echo $row ['gatein']; ?>" disabled>
            </p>
          </div>
          
        </div>
      </div><br>

      <div class="field">
        <p class="help is-dark">Vehicle Type<span class="has-text-danger">*</span></p>
        <div class="control has-icons-left">
          <div class="select is-primary">
            <input class="input is-primary" type="text" name = "product" value="<?php echo $row ['product']; ?>" disabled>
             
          </div>
          <div class="icon is-small is-left">
            <i class="fa fa-car "></i>
          </div>
        </div>
      </div>
	<div class="field">
        <p class="help is-dark">Vin Number<span class="has-text-danger">*</span></p>
        <p class="control has-icons-left has-icons-right">
          <input class="input is-primary" type="text" placeholder="AAA99991111BBB" name = "vin" value="<?php echo $row ['vin']; ?>" disabled>
          <span class="icon is-small is-left">
            <i class="fas fa-car"></i>
          </span>
        </p>

      </div>
	
      <div class="field">
        <p class="help is-dark">Comment</p>
        <div class="control">
          <textarea maxlength="30" class="textarea is-primary" type="text" placeholder="Comment" name = "comment" disabled><?php echo $row ['comment']; ?></textarea>
        </div>
      </div>
      <br><br>
      <div class="field is-grouped is-grouped-centered">
        <p class="control">
         <button type="submit" class="button is-primary" value=" Submit " >Submit</button>
         
        </p>
        <p class="control">
          <a class="button is-light" onclick="myFunction()">
            Clear
          </a>
        </p>
      </div>
      </form>
		  <?php
        }
        ?>
    </div>
  </section>


</body>
</html>
