<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}


include 'config.php';



print_r($_POST);
//die("cvbcbv");
$username = $_POST["username"];
$email = $_POST["email"];
$mo_number = $_POST["mo_number"];
$quantity = $_POST["quantity"];
$product_name = $_POST["product_name"];
$company_name = $_POST["company_name"];
//die("INSERT INTO demand (username, email, mo_number, quantity, product_name, company_name) VALUES('$usernames', '$email', '$mo_number', '$quantity', $product_name, '$company_name')");

if($mysqli->query("INSERT INTO demand (username, email, mo_number, quantity, product_name, company_name) VALUES('$username', '$email', '$mo_number', '$quantity', '$product_name', '$company_name')")){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:demand.php");

?>
