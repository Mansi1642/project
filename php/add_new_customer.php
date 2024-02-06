<?php
  require "db_connection.php";
  if($con) {
    $fname = ucwords($_GET["fname"]);
	$lname = ucwords($_GET["lname"]);
    $address = ucwords($_GET["address"]);
    $city = ucwords($_GET["city"]);
	$pin = ucwords($_GET["pin"]);
	$email = ucwords($_GET["email"]);
	$password = ucwords($_GET["password"]);

    $query = "SELECT * FROM customers WHERE FNAME = '$fname'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row)
      echo "Customer ".$row['FNAME']." with lname $lname already exists!";
    else {
      $query = "INSERT INTO customers (FNAME, LNAME, ADDRESS, CITY, PIN, EMAIL, PASSWORD) VALUES('$fname', '$lname', '$address', '$city', '$pin', '$email', '$password')";
      $result = mysqli_query($con, $query);
      if(!empty($result))
  			echo "$name added...";
  		else
  			echo "Failed to add $name!";
    }
  }
?>
