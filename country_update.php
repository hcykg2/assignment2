<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Country</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Update Country</h1>
        </div>

        <div class="panel-body">
          <form action="country_update.php" method="post">

            <div class="form-group">
              <label for="country_id">country_id</label>
              <input type="text" class="form-control" id="country_id" name="country_id" />
            </div>

            <div class="form-group">
              <label for="country">Country Name</label>
              <input type="text" class="form-control" id="country" name="country" />
            </div>

            <input type="submit" name= "submitbutton" class="btn btn-primary" />
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>


<?php

if (isset( $_POST['submitbutton'])) {
  $link = mysqli_connect("localhost", "root", "", "sakila");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$country_id=  $_POST['country_id'];
$country = $_POST['country'];

// Attempt insert query execution
$sql = "UPDATE country SET  `country`= '$country' WHERE `country_id`='$country_id'";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}

?>
