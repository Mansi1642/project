<?php
  require "db_connection.php";

  if($con) {
    if(isset($_GET["action"]) && $_GET["action"] == "delete") {
      $id = $_GET["id"];
      $query = "DELETE FROM users WHERE ID = $id";
      $result = mysqli_query($con, $query);
      if(!empty($result))
    		showCustomers(0);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "edit") {
      $id = $_GET["id"];
      showCustomers($id);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "update") {
      $id = $_GET["id"];
      $fname = ucwords($_GET["FNAME"]);
      $lname = $_GET["LNAME"];
      $address = ucwords($_GET["ADDRESS"]);
      $city = ucwords($_GET["CITY"]);
      $pin = ucwords($_GET["PIN"]);
	  $email = ucwords($_GET["EMAIL"]);
	  $password = ucwords($_GET["PASSSWORD"]);
	  $contact_number = ucwords($_GET["CONTACT_NUMBER"]);
      updateCustomer($id, $fname, $name, $address, $city, $pin, $email, $password, $contact_number);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "cancel")
      showCustomers(0);

    if(isset($_GET["action"]) && $_GET["action"] == "search")
      searchCustomer(strtoupper($_GET["text"]));
  }

  function showCustomers($id) {
    require "db_connection.php";
    if($con) {
      $seq_no = 0;
      $query = "SELECT * FROM users";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        if($row['id'] == $id)
          showEditOptionsRow($seq_no, $row);
        else
          showCustomerRow($seq_no, $row);
      }
    }
  }

  function showCustomerRow($seq_no, $row) {
    ?>
    <tr>
      <td><?php echo $seq_no; ?></td>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['fname']; ?></td>
	  <td><?php echo $row['lname']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['city']; ?></td>
      <td><?php echo $row['pin']; ?></td>
	  <td><?php echo $row['email']; ?></td>
	   <td><?php echo $row['password']; ?></td>
	    <td><?php echo $row['contact_number']; ?></td>
	  
  
    </tr>
    <?php
  }

function showEditOptionsRow($seq_no, $row) {
  ?>
  <tr>
    <td><?php echo $seq_no; ?></td>
    <td><?php echo $row['id'] ?></td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['FNAME']; ?>" placeholder="Fname" id="fname" onkeyup="validateFname(this.value, 'fname_error');">
      <code class="text-danger small font-weight-bold float-right" id="name_error" style="display: none;"></code>
    </td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['LNAME']; ?>" placeholder="Lname" id="lname" onblur="validateLname(this.value, 'lname_error');">
      <code class="text-danger small font-weight-bold float-right" id="lname_error" style="display: none;"></code>
    </td>
    <td>
      <textarea class="form-control" placeholder="Address" id="address" onblur="validateAddress(this.value, 'address_error');"><?php echo $row['ADDRESS']; ?></textarea>
      <code class="text-danger small font-weight-bold float-right" id="address_error" style="display: none;"></code>
    </td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['CITY']; ?>" placeholder="City" id="city" onkeyup="validateCity(this.value, 'city_error');">
      <code class="text-danger small font-weight-bold float-right" id="city_error" style="display: none;"></code>
    </td>
	<td>
      <input type="number" class="form-control" value="<?php echo $row['PIN']; ?>" placeholder="Pin" id="pin" onkeyup="validatePin(this.value, 'pin_error');">
      <code class="text-danger small font-weight-bold float-right" id="pin_error" style="display: none;"></code>
    </td>
	<td>
      <input type="text" class="form-control" value="<?php echo $row['EMAIL']; ?>" placeholder="Email" id="email" onkeyup="validateEmail(this.value, 'email_error');">
      <code class="text-danger small font-weight-bold float-right" id="email_error" style="display: none;"></code>
    </td>
	<td>
      <input type="text" class="form-control" value="<?php echo $row['PASSSWORD']; ?>" placeholder="Password" id="password" onkeyup="validatePassword(this.value, 'password_error');">
      <code class="text-danger small font-weight-bold float-right" id="password_error" style="display: none;"></code>
    </td>
	<td>
      <input type="number" class="form-control" value="<?php echo $row['CONTACT NUMBER']; ?>" placeholder="Contact Number" id="contact_number" onkeyup="validatePassword(this.value, 'contact_number_error');">
      <code class="text-danger small font-weight-bold float-right" id="contact_number_error" style="display: none;"></code>
    </td>
    
    
    </td>
  </tr>
  <?php
}

function updateCustomer($id, $fname,  $lname, $address, $city, $pin,  $email,  $password) {
  require "db_connection.php";
  $query = "UPDATE customers SET FNAME = '$fname', LNAME = '$lname', ADDRESS = '$address', CITY = '$city', PIN = '$pin', EMAIL = '$email', PASSWORD = '$password', CONTACT_NUMBER = '$contact_number' WHERE ID = $id";
  $result = mysqli_query($con, $query);
  if(!empty($result))
    showCustomers(0);
}

function searchCustomer($text) {
  require "db_connection.php";
  if($con) {
    $seq_no = 0;
    $query = "SELECT * FROM users WHERE UPPER(fname) LIKE '%$text%'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result)) {
      $seq_no++;
      showCustomerRow($seq_no, $row);
    }
  }
}

?>
