<?php
    include_once 'includes/dbh.inc.php';
?>

<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $resultSet = $link->query("SELECT film_id FROM film");
  $result = $link->query("SELECT store_id FROM store" );
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update inventory</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Update inventory</h1>
        </div>

        <div class="panel-body">
          <form action="inventory_update.php" method="post">

            <div class="form-group">
              <div class="form-group">
                <label for="inventory_id">Inventory_id</label>
                <input type="text" class="form-control" id="inventory_id" name="inventory_id" />
              </div>

              <div class="form-group">
                <label for="film_id">film_id</label>
                <select class="form-control" name="film_id">
                  <?php
                  while($rows = $resultSet->fetch_assoc()){
                    $film_id=$rows['film_id'];
                    echo "<option value='$film_id'>$film_id<option>";
                  }
                   ?>
                </select>
              </div>
                </div>

                <div class="form-group">
                  <label for="store_id">store_id</label>
                  <select class="form-control" name="store_id">
                    <?php
                    while($rows = $result->fetch_assoc()){
                      $store_id=$rows['store_id'];
                      echo "<option value='$store_id'>$store_id<option>";
                    }
                     ?>
                  </select>
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
$inventory_id=  $_POST['inventory_id'];
$film_id = $_POST['film_id'];
$store_id = $_POST['$store_id'];


// Attempt insert query execution
$sql = "UPDATE actor SET `film_id`='$film_id', `store_id`= '$store_id' WHERE `inventory_id`='$inventory_id'";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}

?>
