<?php
    include_once 'includes/dbh.inc.php';
?>
<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $resultSet = $link->query("SELECT actor_id FROM actor");
  $result = $link->query("SELECT film_id FROM film" );
 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Insert into film_actors</title>
   <link rel="icon" href="includes/home-icon.png">
 <link rel="stylesheet" type="text/css" href="includes/style2.css">
 </head>
 <body>

   <div class="container">
     <div class="row col-md-6 col-md-offset-3">
       <div class="panel panel-primary">

         <div class="panel-heading text-center">
           <h1>Insert into film_actors</h1>
         </div>

         <div class="panel-body">
           <form action="film_actors.php" method="post">

             <div class="form-group">
               <label for="actor_id">actor_id</label>
               <select class="form-control" name="actor_id">
                 <?php
                 while($rows = $resultSet->fetch_assoc()){
                   $actor_id=$rows['actor_id'];
                   echo "<option value='$actor_id'>$actor_id<option>";
                 }
                  ?>
               </select>
             </div>

             <div class="form-group">
               <label for="film_id">film_id</label>
               <select class="form-control" name="film_id">
                 <?php
                 while($rows = $result->fetch_assoc()){
                   $film_id=$rows['film_id'];
                   echo "<option value='$film_id'>$film_id<option>";
                 }
                  ?>
               </select>
             </div>
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
 $film_id=  $_POST['film_id'];
 $actor_id = $_POST['actor_id'];


 // Attempt insert query execution
 $sql = "INSERT INTO `film_actor` (`actor_id`, `film_id`) VALUES ('$actor_id', '$film_id')";


 if(mysqli_query($link, $sql)){
     echo "Records added successfully.";
 } else{
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
 }
 header('Location: film_actor_insert.php');
 exit;
 }

 ?>
