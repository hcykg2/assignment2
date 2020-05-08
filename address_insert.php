<?php
    include_once 'includes/dbh.inc.php';
?>

<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $resultSet = $link->query("SELECT city_id FROM city");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert into Address</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Insert into Address</h1>
        </div>

        <div class="panel-body">
          <form action="address_insert.php" method="post">

            <div class="form-group">
              <label for="address_id">Address_ID</label>
              <input type="text" class="form-control" id="address_id" name="address_id" />
            </div>

            <div class="form-group">
              <label for="Address">Address</label>
              <input type="text" class="form-control" id="address" name="address" />
            </div>

            <div class="form-group">
              <label for="address2">Address 2</label>
              <input  type="text" class="form-control" id="address2" name="address2" />
            </div>

            <div class="form-group">
              <label for="district">District</label>
              <input  type="text" class="form-control" id="district" name="district" />
            </div>

            <div class="form-group">
              <label for="city_id">city_id</label>
              <select class="form-control" name="city_id">
                <?php
                while($rows = $resultSet->fetch_assoc()){
                  $city_id=$rows['city_id'];
                  echo "<option value='$city_id'>$city_id<option>";
                }
                 ?>
              </select>
            </div>
            <div class="form-group">
              <label for="postal_code">postal_code</label>
              <input  type="text" class="form-control" id="postal_code" name="postal_code" />
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input  type="text" class="form-control" id="Phone" name="phone" />
            </div>


            <input type="submit" class="btn btn-primary" />
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
$address=  $_POST['address'];
$address2=  $_POST['address2'];
$district = $_POST['district'];
$city_id =  $_POST['city_id'];
$postal_code =  $_POST['postal_code'];
$phone =  $_POST['phone'];

// Attempt insert query execution
$sql = "INSERT INTO `address` (`address_id`, `address`, `address2`, `district`, `city_id`, `postal_code`, `phone`) VALUES ('$address_id', '$address', '$address2', '$district', '$city_id', '$postal_code', '$phone')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header('Location: address_insert.php');
exit;
}

?>
