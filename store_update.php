<?php
    include_once 'includes/dbh.inc.php';
?>

<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $resultSet = $link->query("SELECT staff_id FROM staff");
  $result = $link->query("SELECT store_id FROM store" );
  $res = $link->query("SELECT address_id FROM address" )
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Store</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Update Store</h1>
        </div>

        <div class="panel-body">
          <form action="store_update.php" method="post">

            <div class="form-group">
              <label for="staff_id">manager_staff_id</label>
              <select class="form-control" name="staff_id">
                <?php
                while($rows = $resultSet->fetch_assoc()){
                  $staff_id=$rows['staff_id'];
                  echo "<option value='$staff_id'>$staff_id<option>";
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

              <div class="form-group">
                <label for="address_id">address_id</label>
                <select class="form-control" name="address_id">
                  <?php
                  while($rows = $res->fetch_assoc()){
                    $address_id=$rows['address_id'];
                    echo "<option value='$address_id'>$address_id<option>";
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
$address_id=  $_POST['address_id'];
$staff_id = $_POST['manager_staff_id'];
$store_id = $_POST['store_id'];


// Attempt insert query execution
$sql = "UPDATE actor SET `address_id`='$address_id', `manager_staff_id`= '$staff_id' WHERE `store_id`='$store_id'";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}

?>
