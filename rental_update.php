<?php
    include_once 'includes/dbh.inc.php';
?>

<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $resultSet = $link->query("SELECT customer_id FROM customer");
  $result = $link->query("SELECT staff_id FROM staff" );
  $res = $link->query("SELECT inventory_id FROM inventory" );
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Rental</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Update Rental</h1>
        </div>

        <div class="panel-body">
          <form action="rental_update.php" method="post">

            <div class="form-group">
              <label for="rental_id">rental_id</label>
              <input type="text" class="form-control" id="rental_id" name="rental_id" />
            </div>

            <div class="form-group">
              <label for="customer_id">customer_id</label>
              <select class="form-control" name="customer_id">
                <?php
                while($rows = $resultSet->fetch_assoc()){
                  $customer_id=$rows['customer_id'];
                  echo "<option value='$customer_id'>$customer_id<option>";
                }
                 ?>
              </select>
            </div>

            <div class="form-group">
              <label for="inventory_id">inventory_id</label>
              <select class="form-control" name="inventory_id">
                <?php
                while($rows = $res->fetch_assoc()){
                  $inventory_id=$rows['inventory_id'];
                  echo "<option value='$inventory_id'>$inventory_id<option>";
                }
                 ?>
              </select>
            </div>

            <div class="form-group">
              <label for="staff_id">staff_id</label>
              <select class="form-control" name="staff_id">
                <?php
                while($rows = $result->fetch_assoc()){
                  $staff_id=$rows['staff_id'];
                  echo "<option value='$staff_id'>$staff_id<option>";
                }
                 ?>
              </select>
            </div>

            <div class="form-group">
              <label for="rental_date">Rental_Date</label>
              <input  type="text" class="form-control" id="rental_date" name="rental_date" />
            </div>


            <div class="form-group">
              <label for="return_date">return_date</label>
              <input  type="text" class="form-control" id="return_date" name="return_date" />
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
$rental_id=  $_POST['rental_id'];
$customer_id=  $_POST['customer_id'];
$staff_id = $_POST['staff_id'];
$inventory_id = $_POST['inventory_id'];
$return_date= $_POST['return_date'];
$rental_date=  $_POST['rental_date'];


// Attempt insert query execution
$sql = "UPDATE rental SET `customer_id`='$customer_id', `staff_id`= '$staff_id', `inventory_id`= '$inventory_id', `return_date`= '$return_date', `rental_date`= '$rental_date' WHERE `rental_id`='$rental_id'";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}

?>
