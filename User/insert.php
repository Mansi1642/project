<?php

include 'config.php';
if(isset($_POST['register']))
    {

       if($fname == "" && $lname =="" &&  $contact_number =="" && $address =="" && $city =="" && $pin =="" && $pwd=="")
         {

            $alert = '<script> bootbox.alert("Please fill the form Correctly.")</script>';
         }
         else
         {
              if($fname !=="" || $lname !=="")
              {

                $alert = '<script> bootbox.alert("Please fill the form Correctly.")</script>';


              }
         }
    }

//print_r($_POST);
//ssdie("cvbcbv");

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$contact_number = $_POST["contact_number"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];

if ($mysqli->query ("INSERT INTO users (fname, lname, contact_number, address, city, pin, email, password) VALUES('$fname', '$lname', '$contact_number', '$address', '$city', '$pin', '$email', '$pwd')"))
{

	echo 'Data inserted';
	echo '<br/>';
}

header ("location:login.php");

?>