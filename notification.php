<?php
  require "db.php";
  if($conn) {
	
	
  }
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Notification</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/validateForm.js"></script>
    <script src="js/restrict.js"></script>
  </head>
  <body>
    <!-- including side navigations -->
    <?php include("sections/sidenav.php"); ?>

    <div class="container-fluid">
      <div class="container">
        <!-- header section -->
        <?php
          require "php/header.php";
          createHeader('group', 'Notification', 'Notifications');
          // header section end
        ?>
        <div class="row">
          <div class="row col col-md-6">
            <table class="table">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">USer Name</th>
				  <th scope="col">Email</th>
				  <th scope="col">Contact Number</th>
				  <th scope="col">Quantity</th>
				  <th scope="col">Product Name</th>
				  <th scope="col">Company Name</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php 
			  $seq_no = 0;
      $query = "SELECT * FROM demand";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
    ?>
		<tr>
		  <th scope="row"><?php echo $seq_no; ?></th>
		  <td><?php echo $row['username']; ?></td>
		  <td><?php echo $row['email']; ?></td>
		  <td><?php echo $row['mo_number']; ?></td>
		  <td><?php echo $row['quantity']; ?></td>
		  <td><?php echo $row['product_name']; ?></td>
		  <td><?php echo $row['company_name']; ?></td>



		  
		</tr>
		<?php
	  }
	  ?>
	</tbody> 
          </div>
        </div>
        <hr style="border-top: 2px solid #ff5252;">

      </div>
    </div>
  </body>
</html>
