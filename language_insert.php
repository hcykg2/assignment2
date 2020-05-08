<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert into Language</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Insert into Language</h1>
        </div>

        <div class="panel-body">
          <form action="language_insert.php" method="post">

            <div class="form-group">
              <label for="language_id">language_id</label>
              <input type="text" class="form-control" id="language_id" name="language_id" />
            </div>

            <div class="form-group">
              <label for="language">Language Name</label>
              <input type="text" class="form-control" id="language" name="language" />
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
$language_id=  $_POST['language_id'];
$language = $_POST['language'];



// Attempt insert query execution
$sql = "INSERT INTO `language` (`language_id`, `name`) VALUES ('$language_id', '$language')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header('Location: language_insert.php');
exit;
}

?>
