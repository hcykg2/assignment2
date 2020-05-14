<?php
    include_once 'includes/dbh.inc.php';
?>
<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $resultSet = $link->query("SELECT store_id FROM store");
  $result = $link->query("SELECT address_id FROM address" );
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Customer</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Update Customer</h1>
        </div>

        <div class="panel-body">
          <form action="customer_update.php" method="post">

            <div class="form-group">
              <label for="customer_id">customer_id</label>
              <input type="text" class="form-control" id="customer_id" name="customer_id" />
            </div>

            <div class="form-group">
              <label for="store_id">store_id</label>
              <select class="form-control" name="store_id">
                <?php
                while($rows = $resultSet->fetch_assoc()){
                  $store_id=$rows['store_id'];
                  echo "<option value='$store_id'>$store_id<option>";
                }
                 ?>
              </select>
            </div>

            <div class="form-group">
              <label for="first_name">First Name</label>
              <input  type="text" class="form-control" id="first_name" name="first_name" />
            </div>

            <div class="form-group">
              <label for="last_name">Last Name</label>
              <input  type="text" class="form-control" id="last_name" name="last_name" />
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input  type="text" class="form-control" id="email" name="email" />
            </div>

            <div class="form-group">
              <label for="address_id">address_id</label>
              <select class="form-control" name="address_id">
                <?php
                while($rows = $result->fetch_assoc()){
                  $address_id=$rows['address_id'];
                  echo "<option value='$address_id'>$address_id<option>";
                }
                 ?>
              </select>
            </div>

            <div class="form-group">
                <label for="Active">Active</label>
                <div>
                  <label for="active" class="radio-inline" >
                    <input  type="radio" name="active"  value="1"  id="Active"/>Active</label>
                  <label for="Active" class="radio-inline">
                    <input  type="radio" name="active" value="0" id="Notactive"/>Not active</label>

                </div>
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
$customer_id=  $_POST['customer_id'];
$store_id=  $_POST['store_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email= $_POST['email'];
$address_id=  $_POST['address_id'];
$active= $_POST['active'];


// Attempt insert query execution
$sql = "UPDATE customer SET `store_id`='$store_id', `first_name`= '$first_name',`last_name`= '$last_name',`email`= '$email',`address_id`= '$address_id',`active`= '$active'  WHERE `customer_id`='$customer_id'";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}

?>
