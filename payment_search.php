<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>

<head>
    	<link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style.css">
    <title>Payment</title>
</head>
<body>
<ul>
  <li><a href="home.php" style="position:relative;top:-9px;"><img src="includes/home-icon.png" style="position:relative;width:24px;height:24px;top:5px;">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Table</a>
    <div class="dropdown-content">
        <a href="actor.php">actor</a>
        <a href="address.php">address</a>
        <a href="categoryphp">country</a>
        <a href="city.php">city</a>
        <a href="country.php">country</a>
        <a href="customer.php">customer</a>
        <a href="film.php">film</a>
        <a href="film_actor.php">film_actor</a>
        <a href="film_category.php">film_category</a>
        <a href="film_text.php">film_text</a>
        <a href="inventory.php">inventory</a>
        <a href="language.php">language</a>
        <a href="rental.php">rental</a>
        <a href="special_features.php">special_features</a>
        <a href="staff.php">staff</a>
        <a href="store.php">store</a>
  </li>
  <li>
      <form method="POST" style="display:inline-block;">Payment ID: <input type="number" name="id" placeholder="enter address id"><input type="submit" name="submit" value="submit"></form>
  </li>
</ul>
<div class="container-table100">
    <div class="wrap-table100">
        <div class="table100">
        <h6 style="font-size:30px;color:white;font-family:verdana"><b><center>Payment</center></b></h6>
        <br>
            <table>
                <thead>
                    <tr class="table100-head">
								<th class="column1">payment_id</th>
								<th class="columnadd1">customer_id</th>
								<th class="columnadd1">staff_id</th>
								<th class="columnadd1">rental_id</th>
								<th class="columnadd1">amount</th>
								<th>payment_date</th>
								<th>last_update</th>
					</tr>
                </thead>
                <tbody>
                <?php
                    $id = $_POST['id'];
                    $sql = "SELECT * FROM payment WHERE payment_id = $id;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td class=column1>" . $row['payment_id'] . "</td><td class=columnadd1>" .  $row['customer_id'] . "</td><td class=columnadd1>" . $row['staff_id'] . "</td><td class=columnadd1>" . $row['rental_id'] . "</td><td class=columnadd1>" .  $row['amount'] . "</td><td>" .  $row['payment_date'] . "</td><td>" .  $row['last_update'] . "</td></tr>";
                        }
                    }
                    
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>