<?php
    include_once 'includes/dbh.inc.php';
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
          <h1>Insert into Actors</h1>
        </div>

        <div class="panel-body">
          <form action="actor_insert.php" method="post">

            <div class="form-group">
              <label for="actor_id">Actor_Id</label>
              <input type="text" class="form-control" id="actor_id" name="actor_id" />
            </div>

            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" />
            </div>

            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input  type="text" class="form-control" id="lastName" name="lastName" />
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
$actor_id=  $_POST['actor_id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];


// Attempt insert query execution
$sql = "INSERT INTO actor (actor_id,first_name, last_name) VALUES ('$actor_id','$firstName', '$lastName')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header('Location: actor_insert.php');
exit;
}

?>
