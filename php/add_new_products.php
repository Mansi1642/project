<?php
  require "db_connection.php";
  if($con) {
	  $id = ucwords($_GET["id"]);
    $product_code = ucwords($_GET["product_code"]);
    $product_name = $_POST ["Product Name"];  
if (!preg_match ("/^[a-zA-z]*$/", $product_name) ) {  
    $ErrMsg = "Only alphabets and whitespace are allowed.";  
             echo $ErrMsg;  
} else {  
    echo $product_name;  
}  
   // $product_name = strtoupper($_GET["product_name"]);
    $packing = ucwords($_GET["packing"]);
    $product_desc = ucwords($_GET["product_desc"]);
	$product_img_name = ucwords($_GET["product_img_name"]);
	$qty = ucwords($_GET["qty"]);
	$price = ucwords($_GET["price"]);
	$suppliers_name = ucwords($_GET["suppliers_name"]);
	
 $query = "SELECT * FROM 'products'";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    die(cvv);
	if($row)
      echo "Medicine $name with $packing already exists by supplier $suppliers_name!";
    else {
      $query = "INSERT INTO prodcuts (product_code, product_name, packing, product_desc, product_img_name, qty, price,suppliers_name) VALUES('$product_code', '$product_name', '$packing', '$product_desc', '$product_img_name', '$qty', '$price', '$suppliers_name')";
      $result = mysqli_query($con, $query);
      if(!empty($result))
  			echo "$product_name added...";
  		else
  			echo "Failed to add $product_name!";
    }
	
  }
?>
