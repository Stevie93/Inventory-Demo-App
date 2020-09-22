<?php
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

$query = "select * from workorder where  id='" . $_GET['id'] . "' ";

$result1 = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result1)) {

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
        
            
          </div>
        </div>

        <!-- Right side -->
        <div class="level-right is-hidden-mobile">
        </div>
      </nav>
    </div>
    <div class="container" style="max-width:500px; padding:20px; background:#e6e4e4;">
      <a href="index.php">Osagi Autos</a>
		<p>27 Hill Street R</p>
		<p>Garder MA 01440</p>
		<p>978-410-5181</p>
      
<form method="post" action="includes/submitwork.php">
	
      <br>
	
      <div class="field">
        <p class="help is-dark">Technician Information<span class="has-text-danger">*</span></p>
        <p class="control has-icons-left has-icons-right">
          <input class="input is-primary" type="text" placeholder="Akwasi Boadu" name = "technician" value="<?php echo $row ['technician']; ?> " disabled>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </p>

      </div><br>
      <div class="field">
		  <p class="help is-dark">VIN<span class="has-text-danger">*</span></p>
        <p class="control has-icons-left">		
          <input class="input is-primary" type="text" placeholder="XXXAAAA00001111" name = "vin" value="<?php echo strtoupper($row ['vin']); ?> " disabled>
          <span class="icon is-small is-left">
            <i class="fas fa-car"></i>
          </span>
        </p>
      </div><br>
	<div class="field">
		<p class="help is-dark">Car<span class="has-text-danger">*</span></p>
        <p class="control has-icons-left">
          <input class="input is-primary" type="text" placeholder="Vehicle Name and Year" name = "car" value="<?php echo $row ['car']; ?> " disabled>
          <span class="icon is-small is-left">
            <i class="fas fa-car"></i>
          </span>
        </p>
      </div>
	
	<br>

<br>

      <div class="field">
        <p class="help is-dark">Job Details</p>
        <div class="control">
          <textarea maxlength="30" class="textarea is-primary" type="text" placeholder="Any other information" name = "comment" ><?php echo $row ['comment']; ?></textarea>
        </div>
      </div>
      <br><br>
      <div class="field is-grouped is-grouped-centered">
        <p class="control">
			<input type="button" 
  onClick="window.print()" 
  value="Print This Page"/>

<!--       <button type="submit" class="button is-primary" value=" Submit ">Submit</button>
         
        </p>
        <p class="control">
          <a class="button is-light" onclick="myFunction()">
            Clear
          </a>  -->
        </p>
      </div>
      </form>
		   <?php
        }
        ?>
    </div>
  </section>

  <!-- contact us section -->

  <!-- footer -->

</body>
</html>