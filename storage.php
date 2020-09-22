<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

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
      
      
<form method="post" action="includes/submitstorage.php">
      <br>
      <div class="field">
        <p class="help is-dark">Customer Information<span class="has-text-danger">*</span></p>
        <p class="control has-icons-left has-icons-right">
          <input class="input is-primary" type="text" placeholder="Akwasi Boadu" name = "clientname" required>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </p>

      </div>
      <div class="field">
        <p class="control has-icons-left">
          <input class="input is-primary" type="number" placeholder="5084109557" name = "phone" required>
          <span class="icon is-small is-left">
            <i class="fas fa-phone"></i>
          </span>
        </p>
      </div><br>
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
              <input class="input is-primary" type="date" name = "gatein" required>
            </p>
          </div>

          
        </div>
      </div><br>

      <div class="field">
        <p class="help is-dark">Vehicle Type<span class="has-text-danger">*</span></p>
        <div class="control has-icons-left">
          <div class="select is-primary">
            <select name = "product" required>
              <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
              <option>Saloon</option>
              <option>SUV</option>
              <option>Van</option>
			  <option>Truck</option>
            </select>
          </div>
          <div class="icon is-small is-left">
            <i class="fa fa-car "></i>
          </div>
        </div>
      </div>
	<div class="field">
        <p class="help is-dark">Vin Number<span class="has-text-danger">*</span></p>
        <p class="control has-icons-left has-icons-right">
          <input class="input is-primary" type="text" placeholder="AAA99991111BBB" name = "vin" required>
          <span class="icon is-small is-left">
            <i class="fas fa-car"></i>
          </span>
        </p>

      </div>
	
      <div class="field">
        <p class="help is-dark">Comment</p>
        <div class="control">
          <textarea maxlength="30" class="textarea is-primary" type="text" placeholder="Comment" name = "comment"></textarea>
        </div>
      </div>
      <br><br>
      <div class="field is-grouped is-grouped-centered">
        <p class="control">
         <button type="submit" class="button is-success" value=" Submit " >Save</button>
         
        </p>
        <p class="control">
          <a class="button is-light" onclick="myFunction()">
            Clear
          </a>
        </p>
		  <p class="control"><a href="index.php" class="button is-link">Back to Homepage</a></p>
      </div>
      </form>
    </div>
  </section>


</body>
</html>
