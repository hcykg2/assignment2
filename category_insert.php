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
	<title>Insert into Category</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Insert into Category</h1>
        </div>

        <div class="panel-body">
          <form action="category_insert.php" method="post">

            <div class="form-group">
              <label for="category_id">Category_id</label>
              <input type="text" class="form-control" id="category_id" name="category_id" />
            </div>

            <div class="form-group">
              <label for="category">Category Name</label>
              <input type="text" class="form-control" id="category" name="category" />
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
$category_id=  $_POST['category_id'];
$category = $_POST['category'];


// Attempt insert query execution
$sql = "INSERT INTO `category` (`category_id`, `name`) VALUES ('$category_id', $category)";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header('Location: category_insert.php');
exit;
}

?>
