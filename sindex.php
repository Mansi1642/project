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