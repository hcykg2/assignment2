<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>

<head>
    	<link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style.css">
    <title>Staff</title>
</head>
<body>
<ul>
  <li><a href="home.php" style="position:relative;top:-9px;"><img src="includes/home-icon.png" style="position:relative;width:24px;height:24px;top:5px;">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Table</a>
    <div class="dropdown-content">
        <a href="actor.php">actor</a>
        <a href="address.php">address</a>
        <a href="category.php">country</a>
        <a href="city.php">city</a>
        <a href="country.php">country</a>
        <a href="customer.php">customer</a>
        <a href="film.php">film</a>
        <a href="film_actor.php">film_actor</a>
        <a href="film_category.php">film_category</a>
        <a href="film_text.php">film_text</a>
        <a href="inventory.php">inventory</a>
        <a href="language.php">language</a>
        <a href="payment.php">payment</a>
        <a href="rental.php">rental</a>
        <a href="special_features.php">special_features</a>
        <a href="store.php">store</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Query</a>
    <div class="dropdown-content">
      <a href="staff_insert.php">Insert</a>
   	  <a href="staff_update.php">Update</a>
      <a href="staff_delete.php">Delete</a>
   	  <a href="staff_search.php">Search</a>
    </div>
  </li>
</ul>
<div class="container-table100">
    <div class="wrap-table100ten">
        <div class="table100">
        <h6 style="font-size:30px;color:white;font-family:verdana"><b><center>Staff</center></b></h6>
        <br>
            <table>
                <thead>
                    <tr class="table100-head">
								<th>staff_id</th>
								<th>first_name</th>
								<th>last_name</th>
								<th class="columnadd1">address_id</th>
								<th>picture</th>
								<th>email</th>
								<th>store_id</th>
								<th>active</th>
								<th>username</th>
								<th>password</th>
								<th>last_update</th>
					</tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM staff;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td class=columnadd1>" . $row['staff_id'] . "</td><td>" . $row['first_name'] . "</td><td>" .  $row['last_name'] . "</td><td class=columnadd1>" .  $row['address_id'] . "</td><td>" . $row['picture'] . "</td><td class=columnadd1>" .  $row['email'] . "</td><td class=columnadd1>" .  $row['store_id'] . "</td><td class=columnadd1>" .  $row['active'] . "</td><td class=columnadd1>" .  $row['username'] . "</td><td>" .  $row['password'] . "</td><td>" . $row['last_update'] . "</td></tr>";
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