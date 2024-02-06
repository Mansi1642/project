<?php

  if(isset($_GET["action"]) && $_GET["action"] == "delete") {
    require "db_connection.php";
    $invoice_number = $_GET["invoice_number"];
    $query = "DELETE FROM invoices WHERE INVOICE_ID = $invoice_number";
    $result = mysqli_query($con, $query);
    if(!empty($result))
  		showInvoices();
  }

  if(isset($_GET["action"]) && $_GET["action"] == "refresh")
    showInvoices();

  if(isset($_GET["action"]) && $_GET["action"] == "search")
    searchInvoice(strtoupper($_GET["text"]), $_GET["tag"]);

  if(isset($_GET["action"]) && $_GET["action"] == "print_invoice")
    printInvoice($_GET["invoice_number"]);

  function showInvoices() {
    require "db_connection.php";
    if($con) {
      $seq_no = 0;
      $query = "SELECT * FROM invoices ";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        showInvoiceRow($seq_no, $row);
      }
    }
  }

  function showInvoiceRow($seq_no, $row) {
    ?>
    <tr>
      <td><?php echo $seq_no; ?></td>
      <td><?php echo $row['INVOICE_ID']; ?></td>
	     <td><?php echo $row['INVOICE_DATE']; ?></td>
      <td><?php echo $row['CUSTOMER_NAME']; ?></td>
     
      <td><?php echo $row['TOTAL_AMOUNT']; ?></td>
   
      <td>
        <button class="btn btn-warning btn-sm" onclick="printInvoice(<?php echo $row['INVOICE_ID']; ?>);">
          <i class="fa fa-fax"></i>
        </button>
        <button class="btn btn-danger btn-sm" onclick="deleteInvoice(<?php echo $row['INVOICE_ID']; ?>);">
          <i class="fa fa-trash"></i>
        </button>
      </td>
    </tr>
    <?php
  }

  function searchInvoice($text, $column) {
    require "db_connection.php";
    if($con) {
      $seq_no = 0;
      if($column == 'INVOICE_ID')
        $query = "SELECT * FROM invoices INNER JOIN users ON invoices.id = users.id WHERE CAST(invoices.$column AS VARCHAR(9)) LIKE '%$text%'";
      else if($column == "INVOICE_DATE")
        $query = "SELECT * FROM invoices INNER JOIN users ON invoices.id= users.id WHERE invoices.$column = '$text'";
      else
        $query = "SELECT * FROM invoices INNER JOIN users ON invoices.id= users.id WHERE UPPER(users.$column) LIKE '%$text%'";

      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        showInvoiceRow($seq_no, $row);
      }
    }
  }

  function printInvoice($invoice_number) {
    require "db_connection.php";
    if($con) {
     $query = "SELECT * FROM users INNER JOIN invoices ON invoices.CUSTOMER_ID = users.id WHERE INVOICE_ID = $invoice_number";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);

      $fname = $row['fname'];
      $address = $row['address'];
      $contact_number = $row['contact_number'];
      

      $query = "SELECT * FROM invoices WHERE INVOICE_ID  = $invoice_number";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);

      $invoice_date = $row['INVOICE_DATE'];
      $total_amount = $row['TOTAL_AMOUNT'];


    }

    ?>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 h3" style="color: #ff5252;">Customer Invoice<span class="float-right">Invoice Number : <?php echo $invoice_number; ?></span></div>
    </div>
    <div class="row font-weight-bold">
      <div class="col-md-1"></div>
      <div class="col-md-10"><span class="h4 float-right">Invoice Date. : <?php echo $invoice_date; ?></span></div>
    </div>
    <div class="row text-center">
      <hr class="col-md-10" style="padding: 0px; border-top: 2px solid  #ff5252;">
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-4">
        <span class="h4">Customer Details : </span><br><br>
        <span class="font-weight-bold">Name : </span><?php echo $fname ?><br>
        <span class="font-weight-bold">Address : </span><?php echo $address; ?><br>
        <span class="font-weight-bold">Contact Number : </span><?php echo $contact_number; ?><br>
        
      </div>
      <div class="col-md-3"></div>

      <?php

      $query = "SELECT * FROM admin_credentials";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      $pharmacy_name = $row['PHARMACY_NAME'];
      $address = $row['ADDRESS'];
      $email = $row['EMAIL'];
      $contact_number = $row['CONTACT_NUMBER'];
      ?>

      <div class="col-md-4">
        <span class="h4">Shop Details : </span><br><br>
        <span class="font-weight-bold"><?php echo $pharmacy_name; ?></span><br>
        <span class="font-weight-bold"><?php echo $address; ?></span><br>
        <span class="font-weight-bold"><?php echo $email; ?></span><br>
        <span class="font-weight-bold">Mob. No.: <?php echo $contact_number; ?></span>
      </div>
      <div class="col-md-1"></div>
    </div>
    <div class="row text-center">
      <hr class="col-md-10" style="padding: 0px; border-top: 2px solid  #ff5252;">
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 table-responsive">
        <table class="table table-bordered table-striped table-hover" id="purchase_report_div">
          <thead>
            <tr>
              <th>SL</th>
              <th>Invoice Date</th>
              <th>Customer ID</th>
              <th>Customer Name</th>
              <th>Total Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $seq_no = 0;
              $total = 0;
              $query = "SELECT * FROM invoices WHERE INVOICE_ID = $invoice_number";
              $result = mysqli_query($con, $query);
              while($row = mysqli_fetch_array($result)) {
                $seq_no++;
                ?>
                <tr>
                  <td><?php echo $seq_no; ?></td>
                  <td><?php echo $row['INVOICE_DATE']; ?></td>
                  <td><?php echo $row['CUSTOMER_ID']; ?></td>
                  <td><?php echo $row['CUSTOMER_NAME']; ?></td>
                  <td><?php echo $row['TOTAL_AMOUNT']; ?></td>
                </tr>
                <?php
              }
            ?>
          </tbody>
          <tfoot class="font-weight-bold">
            <tr style="text-align: right; font-size: 18px;">
              <td colspan="6">&nbsp;Total Amount</td>
              <td><?php echo $total_amount; ?></td>
            </tr>
          
          </tfoot>
        </table>
      </div>
      <div class="col-md-1"></div>
    </div>
    <div class="row text-center">
      <hr class="col-md-10" style="padding: 0px; border-top: 2px solid  #ff5252;">
    </div>
    <?php
  }

?>
