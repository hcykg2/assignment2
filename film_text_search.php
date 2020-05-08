<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>

<head>
    	<link rel="icon" href="includes/home-icon.png">
<link rel="stylesheet" type="text/css" href="includes/style.css">
    <title>Film_Text</title>
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
        <a href="inventory.php">inventory</a>
        <a href="language.php">language</a>
        <a href="payment.php">payment</a>
        <a href="rental.php">rental</a>
        <a href="special_features.php">special_features</a>
        <a href="staff.php">staff</a>
        <a href="store.php">store</a>
    </div>
  </li>
  <li>
      <form method="POST" style="display:inline-block;">Film ID: <input type="number" name="id" placeholder="enter address id"><input type="submit" name="submit" value="submit"></form>
  </li>
</ul>
<div class="container-table100">
    <div class="wrap-table100ten">
        <div class="table100">
        <h6 style="font-size:30px;color:white;font-family:verdana"><b><center>Film_Text</center></b></h6>
        <br>
            <table>
                <thead>
                    <tr class="table100-head"> 
                        <th>film_id</th>
                        <th>title</th>
                        <th>description</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $id = $_POST['id'];
                    $sql = "SELECT * FROM film_text WHERE film_id = $id;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td class=column1>" . $row['film_id'] . "</td><td>" . $row['title'] . "</td><td>" . $row['description'] . "</td></tr>";
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