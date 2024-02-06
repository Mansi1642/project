
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard - Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/restrict.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" type="text/javascript"></script>
    <script src="javascript/jquery.growl.js" type="text/javascript"></script>
    <link href="stylesheets/jquery.growl.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
 
    <?php include "sections/sidenav.php"; ?>
    <div class="container-fluid">
      <div class="container">
	  
        <!-- header section -->
        <?php
          require "php/header.php";
          createHeader('home', 'Dashboard', 'Home');
        ?>
		
        <!-- header section end -->
		
        <!-- form content -->
        <div class="row">
          <div class="row col col-xs-8 col-sm-8 col-md-8 col-lg-8">
		  

            <?php
              function createSection1($location, $title, $table) {
                require 'php/db_connection.php';

                $query = "SELECT * FROM medicines_stock";
                if($title == "Out of Stock")
                  $query = "SELECT * FROM $table WHERE QUANTITY = 0";

                $result = mysqli_query($con, $query);
                //$count = mysqli_num_rows($result);


                if($title == "Expired") {
                  // logic
                  $count = 0;
                  while($row = mysqli_fetch_array($result)) {
                    $expiry_date = $row['EXPIRY_DATE'];
                    if(substr($expiry_date, 3) < date('y'))
                      $count++;
                    else if(substr($expiry_date, 3) == date('y')) {
                      if(substr($expiry_date, 0, 2) < date('m'))
                        $count++;
                    }
                  }
                }

                echo '
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
                    <div class="dashboard-stats" onclick="location.href=\''.$location.'\'">
                     <a class="text-dark text-decoration-none" href="'.$location.'">
                        <span class="h4"></span>
                        <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
						
                        <div class="small font-weight-bold">'.$title.'</div>
                      </a>
                    </div>
                  </div>
                ';
              }
              createSection1('manage_customer.php', 'Total Customer', 'customers');
              //createSection1('manage_supplier.php', 'Total Supplier', 'suppliers');
              createSection1('manage_products.php', 'Total Products', 'products');
             
              
            ?>

          </div>

          <div class="col col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding: 7px 0; margin-left: 15px;">
            <div class="todays-report">
              <div class="h5">Todays Report</div>
              <table class="table table-bordered table-striped table-hover">
                <tbody>
                  <?php
                    require 'php/db_connection.php';
                    if($con) {
                      $date = date('Y-m-d');
                  ?>
                  <tr>
                    <?php
                      $total = 0;
                      $query = "SELECT NET_TOTAL FROM invoices WHERE INVOICE_DATE = '$date'";
                      $result = mysqli_query($con, $query);

                     
                    ?>
                    <th>Total Sales</th>
                    <th class="text-success">Rs. <?php echo $total; ?></th>
                  </tr>
                  <tr>
                    <?php
                      //echo $date;
                      $total = 0;
                      $query = "SELECT TOTAL_AMOUNT FROM purchases WHERE PURCHASE_DATE = '$date'";
                      $result = mysqli_query($con, $query);
                      //while($row = mysqli_fetch_array($result))
                        //$total = $total + $row['TOTAL_AMOUNT'];
                    }
                    ?>
                   
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>

        <hr style="border-top: 2px solid #ff5252;">

        <div class="row">

          <?php
            function createSection2($icon, $location, $title) {
              echo '
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
              		<div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href=\''.$location.'\'">
              			<div class="text-center">
                      <span class="h1"><i class="fa fa-'.$icon.'"></i></span>
              				<div class="h5">'.$title.'</div>
              			</div>
              		</div>
                </div>
              ';
            }
             
          ?>
<?php
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";
$conn = mysqli_connect($servername, $username, $password, $dbname);;
$sql = "SELECT MONTH(INVOICE_DATE) AS m, SUM(TOTAL_AMOUNT) as total FROM invoices GROUP BY  m";
// die($sql);
$result = mysqli_query($conn, $sql);   
// print_r($result);
$jan = 0;
$feb = 0;
$march = 0;
$april = 0;
$may = 0;
$june = 0;
$july = 0;
$aug = 0;
$sep = 0;
$oct = 0;
$nov = 0;
$dec = 0;

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    if($row['m'] == 1){
        $jan = $row['total'];
    }
    if($row['m'] == 2){
        $feb = $row['total'];
    }
    if($row['m'] == 3){
        $march = $row['total'];
    }
    if($row['m'] == 4){
        $april = $row['total'];
    }
    if($row['m'] == 5){
        $may = $row['total'];
    }
    if($row['m'] == 6){
        $june = $row['total'];
    }
    if($row['m'] == 7){
        $july = $row['total'];
    }
    if($row['m'] == 8){
        $aug = $row['total'];
    }
    if($row['m'] == 9){
        $sep = $row['total'];
    }
    if($row['m'] == 10){
        $oct = $row['total'];
    }
    if($row['m'] == 11){
        $nov = $row['total'];
    }
    if($row['m'] == 12){
        $dec = $row['total'];
    }

  }
}
// Create connection
// $conn = new mysqli($servername, $username, $password);

        
  
?>


<html>

<head>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" rel="stylesheet">

</head>
<body>



<canvas id="myChart" style="height: auto; width: 500px;"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>


<script>
    var jan = "<?php echo $jan; ?>";
    var feb = "<?php echo $feb; ?>";
    var march = "<?php echo $march; ?>";
    var april = "<?php echo $april; ?>";
    var may = "<?php echo $may; ?>";
    var june = "<?php echo $june; ?>";
    var july = "<?php echo $july; ?>";
    var aug = "<?php echo $aug; ?>";
    var sep = "<?php echo $sep; ?>";
    var oct = "<?php echo $oct; ?>";
    var nov = "<?php echo $nov; ?>";
    var dec = "<?php echo $dec; ?>";

    window.onload = function()
    {
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
        };
        var config = {
            type: 'bar',
            data: {
                borderColor : "#fffff",
                datasets: [{
                    data: [
                        jan,
                        feb,
                        march,
                        april,
                        may,
                        june,
                        july,
                        aug,
                        sep,
                        oct,
                        nov,
                        dec
                    ],
                    borderColor : "#fff",
                    borderWidth : "3",
                    hoverBorderColor : "#000",

                    label: 'Monthly Sales Report',

                    backgroundColor: [
                        "#0190ff",
                        "#56d798",
                        "#ff8397",
                        "#6970d5",
                        "#f312cb",
                        "#ff0060",
                        "#ffe400",
                        "#6970d5",
                        "#ffe400",
                        "#56d798",
                        "#ff0060",
                        "#0190ff"

                    ],
                    hoverBackgroundColor: [
                        "#f38b4a",
                        "#56d798",
                        "#ff8397",
                        "#6970d5",
                        "#ffe400",
                        "#f38b4a",
                        "#56d798",
                        "#ff8397",
                        "#6970d5",
                        "#ffe400",
                        "#f38b4a",
                        "#56d798"
                    ]
                }],

                labels: [
                    'Jan',
                    'Feb',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'aug',
                    'sep',
                    'oct',
                    'nov',
                    'dec'
                ]
            },

            options: {
                responsive: true

            }
        };
        var ctx = document.getElementById('myChart').getContext('2d');
        window.myPie = new Chart(ctx, config);


    };
</script>

</body>

</html>
        </div>
        <!-- form content end -->

        <hr style="border-top: 2px solid #ff5252;">

      </div>
    </div>
  </body>
</html>
