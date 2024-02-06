<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
$email_session = $_SESSION['username'];
include 'config.php';
$u_name_get = $mysqli->query("SELECT `id`,`fname` FROM `users` WHERE `email` = '$email_session'");
$u_name = $u_name_get->fetch_object();
//print_r($u_name->fname);

if(isset($_SESSION['cart'])) {

  $total = 0;
  $username;
		$total_price = 0;
		$username;
  foreach($_SESSION['cart'] as $product_id => $quantity) {

    $result = $mysqli->query("SELECT * FROM products WHERE id = ".$product_id);

    if($result){

      if($obj = $result->fetch_object()) {

		$total_price +=$obj->price; 
        $cost = $obj->price * $quantity;

        $user = $_SESSION["username"];
		//("INSERT INTO orders (product_code, product_name, product_desc, price, units, total, username, email) VALUES('$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost, '$user')");
        $query = $mysqli->query("INSERT INTO orders (product_code, product_name, product_desc, price, units, total, username, email) VALUES('$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost,'$u_name->fname','$user')");
		
        if($query){
          $newqty = $obj->qty - $quantity;
          if($mysqli->query("UPDATE products SET qty = ".$newqty." WHERE id = ".$product_id)){

          }
        }
	
        //send mail script
        /*$query = $mysqli->query("SELECT * from orders order by date desc");
        if($query){
          while ($obj = $query->fetch_object()){
            $subject = "Your Order ID ".$obj->id;
            $message = "<html><body>";
            $message .= '<p><h4>Order ID ->'.$obj->id.'</h4></p>';
            $message .= '<p><strong>Date of Purchase</strong>: '.$obj->date.'</p>';
            $message .= '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
            $message .= '<p><strong>Product Name</strong>: '.$obj->product_name.'</p>';
            $message .= '<p><strong>Price Per Unit</strong>: '.$obj->price.'</p>';
            $message .= '<p><strong>Units Bought</strong>: '.$obj->units.'</p>';
            $message .= '<p><strong>Total Cost</strong>: '.$obj->total.'</p>';
            $message .= "</body></html>";
            $headers = "From: support@techbarrack.com";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $sent = mail($user, $subject, $message, $headers) ;
            if($sent){
              $message = "";
            }
            else {
              echo 'Failure';
            }
          }
        }*/



      }
    }
  }
 // die($total_price);
 	
$querys = $mysqli->query("INSERT INTO `invoices`(`CUSTOMER_ID`, `CUSTOMER_NAME`, `TOTAL_AMOUNT`) VALUES ('$u_name->id','$u_name->fname','$total_price')");

}

unset($_SESSION['cart']);
header("location:success.php");

?>
