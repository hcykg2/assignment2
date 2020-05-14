<?php
    include_once 'includes/dbh.inc.php';
?>
<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $result = $link->query("SELECT film_id FROM film" );
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update special_feature</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Update special_feature</h1>
        </div>

        <div class="panel-body">
          <form action="special_feature_update.php" method="post">

            <label for="film_id">film_id</label>
            <select class="form-control" name="film_id">
              <?php
              while($rows = $result->fetch_assoc()){
                $film_id=$rows['film_id'];
                echo "<option value='$film_id'>$film_id<option>";
              }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label for="special_feature">Special Feature</label>
            <input  type="text" class="form-control" id="special_feature" name="special_feature" />
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
$film_id=  $_POST['film_id'];
$special_feature = $_POST['$special_feature'];


// Attempt insert query execution
$sql = "UPDATE special_feature SET `special_feature`='$special_feature', `last_name`= '$lastName' WHERE `film_id`='$film_id'";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}

?>
