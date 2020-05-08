<?php
    include_once 'includes/dbh.inc.php';
?>
<?php
	$link = mysqli_connect("localhost", "root", "", "sakila");
  $resultSet = $link->query("SELECT customer_id FROM customer");
  $result = $link->query("SELECT staff_id FROM staff" );
  $res = $link->query("SELECT rental_id FROM rental" );
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert into payments</title>
  <link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style2.css">
</head>
<body>

  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">

        <div class="panel-heading text-center">
          <h1>Insert into Payment</h1>
        </div>

        <div class="panel-body">
          <form action="payment_insert.php" method="post">

            <div class="form-group">
              <label for="payment_id">payment_id</label>
              <input type="text" class="form-control" id="payment_id" name="payment_id" />
            </div>

            <div class="form-group">
              <label for="customer_id">customer_id</label>
              <select class="form-control" name="customer_id">
                <?php
                while($rows = $resultSet->fetch_assoc()){
                  $customer_id=$rows['store_id'];
                  echo "<option value='$customer_id'>$customer_id<option>";
                }
                 ?>
              </select>
            </div>

            <div class="form-group">
              <label for="rental_id">rental_id</label>
              <select class="form-control" name="rental_id">
                <?php
                while($rows = $res->fetch_assoc()){
                  $rental_id=$rows['rental_id'];
                  echo "<option value='$rental_id'>$rental_id<option>";
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
              <label for="amount">Amount</label>
              <input  type="text" class="form-control" id="amount" name="amount" />
            </div>


            <div class="form-group">
              <label for="payment_date">payment_date</label>
              <input  type="text" class="form-control" id="payment_date" name="payment_date" />
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
$payment_id=  $_POST['payment_id'];
$customer_id=  $_POST['customer_id'];
$staff_id = $_POST['staff_id'];
$rental_id = $_POST['rental_id'];
$amount= $_POST['amount'];
$payment_date=  $_POST['payment_date'];


// Attempt insert query execution
$sql = "INSERT INTO `payment` (`payment_id`, `customer_id`, `staff_id`, `rental_id`, `amount`, `payment_date`, `last_update`) VALUES ('$payment_id', '$customer_id', '$staff_id', '$rental_id', '$amount', '$payment_date')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header('Location: payment_insert.php');
exit;
}

?>
