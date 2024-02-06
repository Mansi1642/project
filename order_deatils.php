<?php

include 'config.php';

$order_id = $_POST["order_id"];
$product_id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$city = $_POST["city"];
$username = $_POST["username"];
$quantity = $_POST["quantity"];
$total = $_POST["total"];
$date = $_POST["date"];

if($mysqli->query("INSERT INTO orders (order_id, product_id, product_name, city, username, quantity, total, date) VALUES('$order_id', '$product_id', '$product_name', '$city', $username, '$quantity', '$total', '$date')")){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:orders.php");

?>
