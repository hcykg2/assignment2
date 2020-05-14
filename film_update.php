<?php
    include_once 'includes/dbh.inc.php';
?>

<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $resultSet = $link->query("SELECT language_id FROM language");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update film_update</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Update film_update</h1>
        </div>

        <div class="panel-body">
          <form action="film_update.php" method="post">


            <div class="form-group">
              <label for="film_id">film_id</label>
              <input type="text" class="form-control" id="film_id" name="film_id" />
            </div>

            <div class="form-group">
              <label for="release_year">Release Year</label>
              <input  type="text" class="form-control" id="release_year" name="release_year" />
            </div>


            <div class="form-group">
              <label for="language_id">language_id</label>
              <select class="form-control" name="language_id">
                <?php
                while($rows = $resultSet->fetch_assoc()){
                  $language_id=$rows['language_id'];
                  echo "<option value='$language_id'>$language_id<option>";
                }
                 ?>
              </select>
            </div>

            <div class="form-group">
              <label for="rental_duration">Rental Duration</label>
              <input  type="text" class="form-control" id="rental_duration" name="rental_duration" />
            </div>

            <div class="form-group">
              <label for="rental_rate">Rental Rate</label>
              <input  type="text" class="form-control" id="rental_rate" name="rental_rate" />
            </div>

            <div class="form-group">
              <label for="length">Length</label>
              <input  type="text" class="form-control" id="length" name="length" />
            </div>

            <div class="form-group">
              <label for="replacement_cost">Replacement Cost</label>
              <input  type="text" class="form-control" id="replacement_cost" name="replacement_cost" />
            </div>

            <div class="form-group">
                <label for="rating">Rating</label>
                <div>
                  <label for="rating" class="radio-inline" >
                    <input  type="radio" name="rating"  value="G"  id="G"/>G</label>
                  <label for="rating" class="radio-inline">
                   <input  type="radio" name="rating" value="NC-17" id="NC-17"/>NC-17</label  >
                  <label for="rating" class="radio-inline">
                   <input  type="radio" name="rating" value="PG" id="PG"/>PG</label >
                  <label for="rating" class="radio-inline">
                   <input  type="radio" name="rating" value="PG-13" id="PG-13"/>PG-13</label >
                  <label for="rating" class="radio-inline">
                    <input  type="radio" name="rating" value="R" id="R"/>R</label  >
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
$film_id=  $_POST['film_id'];
$language_id=  $_POST['language_id'];
$rentalDuration = $_POST['rental_duration'];
$rentalRate = $_POST['rental_rate'];
$length= $_POST['length'];
$replacement_cost=  $_POST['replacement_cost'];
$rating= $_POST['rating'];

// Attempt insert query execution
$sql = "UPDATE film SET `language_id`='$language_id', `rental_duration`= '$rentalDuration',`rental_rate`= '$rentalRate',`length`= '$length',`replacement_cost`= '$replacement_cost',`rating`= '$rating'  WHERE  `film_id`='$film_id'";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}

?>
