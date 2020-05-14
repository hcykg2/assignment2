<?php
    include_once 'includes/dbh.inc.php';
?>
<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $resultSet = $link->query("SELECT address_id FROM address");
  $result =   $link->query("SELECT store_id FROM store");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Staff</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Update Staff</h1>
        </div>

        <div class="panel-body">
          <form action="staff_update.php" method="post">

            <label for="staff_id">staff_id</label>
            <input type="text" class="form-control" id="staff_id" name="staff_id" />
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
            <label for="username">Username</label>
            <input  type="text" class="form-control" id="username" name="username" />
          </div>

          <div class="form-group">
              <label for="password">Password</label>
              <input  type="password"  class="form-control"  id="password"  name="password" />

          <div class="form-group">
            <label for="address_id">address_id</label>
            <select class="form-control" name="address_id">
              <?php
              while($rows = $resultSet->fetch_assoc()){
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
                  <input  type="radio" name="active" value="0" id="Notactive"/>
                  Not active</label  >

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
$staff_id= $_POST['staff_id'];
$customer_id=  $_POST['customer_id'];
$store_id=  $_POST['store_id'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email= $_POST['email'];
$username= $_POST['username'];
$password= $_POST['password'];
$address_id=  $_POST['address_id'];
$active= $_POST['active'];


// Attempt insert query execution
$sql = "UPDATE staff SET `customer_id`='$customer_id', `store_id`= '$store_id',`first_name`= '$firstName',`last_name`= '$lastName',`email`= '$email',`username`= '$username',
`password`= '$password',`address_id`= '$address_id',`active`= '$active' WHERE `staff_id`='$staff_id'";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}

?>
