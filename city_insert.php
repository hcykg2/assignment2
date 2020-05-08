<?php
    include_once 'includes/dbh.inc.php';
?>
<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $resultSet = $link->query("SELECT country_id FROM country");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert into Actors</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Insert into City</h1>
        </div>

        <div class="panel-body">
          <form action="city_insert.php" method="post">

            <div class="form-group">
              <label for="City_id">City_id</label>
              <input type="text" class="form-control" id="City_id" name="City_id" />
            </div>

            <div class="form-group">
              <label for="city">City Name</label>
              <input type="text" class="form-control" id="city" name="city" />
            </div>

            <div class="form-group">
              <label for="country">country_id</label>
              <select class="form-control" name="country_id">
                <?php
                while($rows = $resultSet->fetch_assoc()){
                  $country_id=$rows['country_id'];
                  echo "<option value='$country_id'>$country_id<option>";
                }
                 ?>
              </select>
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
$city_id=  $_POST['City_id'];
$city = $_POST['city'];
$country_id = $_POST['country_id'];


// Attempt insert query execution
$sql = "INSERT INTO `city` (`city_id`, `city`, `country_id`) VALUES ('$city_id','$city', '$country_id')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header('Location: city_insert.php');
exit;
}

?>
