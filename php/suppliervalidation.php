<?php

  if(isset($_GET['action']) && $_GET['action'] == 'is_setup_done')
    isSetupDone();

  function isSetupDone() {
    require "db_connection.php";
    if($con) {
      $query = "SELECT * FROM supplier_name";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      echo ($row) ? "true" : "false";
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'is_supplier')
    isSupplier();

  function isSupplier() {
    require "db_connection.php";
    if($con) {
      $username = $_GET["username"];
      $password = $_GET["password"];

      $query = "SELECT * FROM supplier_name_name WHERE username = '$username' AND password = '$password'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      if($row)  {
        $query = "UPDATE supplier_name SET IS_LOGGED_IN = 'true'";
        $result = mysqli_query($con, $query);
        echo "true";
      }
      else
        echo "false";
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'store_user_info')
    storeSupplierData();

  function storeSupplierData() {
    require "db_connection.php";
    if($con) {
      $name = $_GET["name"];
	  $username = $_GET["username"];
	  $email = $_GET["email"];
      $password = $_GET["password"];
      $address = $_GET["address"];
	  $mo_number = $_GET["mo_number"];
      $state= $_GET["state"];
	  $city = $_GET["city"];

      $query = "INSERT INTO supplier_name (name,username,email,password,address,mo_number,state,city, IS_LOGGED_IN) VALUES('$name',  '$username', '$email', $password', '$$address', '$mo_number', '$state', '$city, 'false')";
      $result = mysqli_query($con, $query);
      echo ($result) ? "true" : "false";
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'verify_email_number')
    verifyEmailNumber();

  function verifyEmailNumber() {
    require "db_connection.php";
    if($con) {
      $email = $_GET["email"];
      $mo_number = $_GET["mo_number"];

      $query = "SELECT * FROM supplier_name WHERE EMAIL = '$email' AND mo_number = '$mo_number'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      echo ($row) ? "true" : "false";
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'update_username_password')
    updateUsernamePassword();

  function updateUsernamePassword() {
    require "db_connection.php";
    if($con) {
      $username = $_GET["username"];
      $password = $_GET["password"];
      $email = $_GET["email"];
      $mo_number = $_GET["mo_number"];

      $query = "UPDATE supplier_name SET username = '$username', password = '$password' WHERE email = '$email' AND mo_number = '$mo_number'";
      $result = mysqli_query($con, $query);
      echo ($result) ? "true" : "false";
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'validate_password')
    validatePassword();

  function validatePassword() {
    require "db_connection.php";
    if($con) {
      $password = $_GET["password"];

      $query = "SELECT * FROM supplier_name WHERE password = '$password'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      echo ($row) ? "true" : "false";
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'update_customer_info')
    updateSupplierInfo();

  function updateSupplierInfo() {
    require "db_connection.php";
    if($con) {
      $name = $_GET["name"];
	  $username = $_GET["username"];
      $email = $_GET["email"];
      $password = $_GET["password"];
	  $address = $_GET["address"];
	  $address = $_GET["mo_number"];
	  $state = $_GET["state"];
	  $city = $_GET["city"];

      $query = "UPDATE supplier_name SET name = '$name',username = '$username', EMAIL = '$email', password = '$password', address = '$address' mo_number = '$mo_number', state= '$state', city='$city'";
      $result = mysqli_query($con, $query);
      echo ($result) ? "Details updated..." : "Oops! Somthing wrong happend...";
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'change_password')
    changePassword();

  function changePassword() {
    require "db_connection.php";
    if($con) {
      $password = $_GET["password"];

      $query = "UPDATE supplier_name SET password = '$password'";
      $result = mysqli_query($con, $query);
      echo ($result) ? "Password changed..." : "Oops! Somthing wrong happend...";
    }
  }

 ?>
