<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MEDI CARE</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
/** code by webdevtrick ( https://webdevtrick.com ) **/
body {
  margin: 0;
  padding: 0;
}
.main {
  max-height: 550px;;
  background-color: #292c2f;
  color: white;
  font-size: 38pt;
  text-align: center;
  line-height: 550px;
}
footer{
  position: fixed;
  bottom: 0;
}
.footer-distributed{
  background-color: #292c2f;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
  width: 100%;
  text-align: left;
  font: bold 16px sans-serif;
  height: 115px;
  padding: 55px 50px;
  padding-top:5px;
}

.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
  display: inline-block;
  vertical-align: top;
}

.footer-distributed .footer-left{
  width: 40%;
}

.footer-distributed h3{
  color:  #ffffff;
  font: normal 36px 'Cookie', cursive;
  margin: 0;
}

.footer-distributed h3 span{
  color:  #ff5252;
}


.footer-distributed .footer-links{
  color:  #ffffff;
  margin: 20px 0 12px;
  padding: 0;
}

.footer-distributed .footer-links a{
  display:inline-block;
  line-height: 1.8;
  text-decoration: none;
  color:  inherit;
}

.footer-distributed .footer-company-name{
  color:  #8f9296;
  font-size: 14px;
  font-weight: normal;
  margin: 0;
}


.footer-distributed .footer-center{
  width: 35%;
}

.footer-distributed .footer-center i{
  background-color:  #33383b;
  color: #ffffff;
  font-size: 25px;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  text-align: center;
  line-height: 42px;
  margin: 10px 15px;
  vertical-align: middle;
}

.footer-distributed .footer-center i.fa-envelope{
  font-size: 17px;
  line-height: 38px;
}

.footer-distributed .footer-center p{
  display: inline-block;
  color: #ffffff;
  vertical-align: middle;
  margin:0;
}

.footer-distributed .footer-center p span{
  display:block;
  font-weight: normal;
  font-size:14px;
  line-height:2;
}

.footer-distributed .footer-center p a{
  color: #ff5252;
  text-decoration: none;;
}

.footer-distributed .footer-right{
  width: 20%;
}

.footer-distributed .footer-company-about{
  line-height: 20px;
  color:  #92999f;
  font-size: 13px;
  font-weight: normal;
  margin: 0;
}

.footer-distributed .footer-company-about span{
  display: block;
  color:  #ffffff;
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 20px;
}

.footer-distributed .footer-icons{
  margin-top: 25px;
}

.footer-distributed .footer-icons a{
  display: inline-block;
  width: 35px;
  height: 35px;
  cursor: pointer;
  background-color:  #33383b;
  border-radius: 2px;

  font-size: 20px;
  color: #ffffff;
  text-align: center;
  line-height: 35px;

  margin-right: 3px;
  margin-bottom: 5px;
}


@media (max-width: 880px) {

  .footer-distributed{
    font: bold 14px sans-serif;
  
  }

  .footer-distributed .footer-left,
  .footer-distributed .footer-center,
  .footer-distributed .footer-right{
    display: block;
    width: 100%;
    margin-bottom: 40px;
    text-align: center;
  }

  .footer-distributed .footer-center i{
    margin-left: 0;
  }
  .main {
    line-height: normal;
    font-size: auto;
  }

}
</style>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">MEDI CARE</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
		  <li><a href="demand.php">Demand</a></li>
		 
		
            
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

          <div class="" style="  background-image: url(images/n1.jpg);text-align: center; background-position: center;background-repeat: no-repeat;background-size: cover; height: 100%;  ">
      
              <h4 class="sub-title" style="text-align:center; padding-right:50px; padding-left: 50px;color: #ff5252;">Effective Medicine, New Medicine Everyday</h4>

              <h1 class="logo-caption font-weight-bolder" style="text-align:center; color:#ff5252;font-size:40px; padding-left:50px;  padding-right:50px; font-family:script;"><span class="tweak">W</span>elcome   <span class="tweak">T</span>o</h1>

              <h1 class="logo-caption font-weight-bolder" style="text-align:center; font-size:60px; padding-left:50px;  padding-right:50px; font-family:script; color:#000033;"><span class="tweak">M</span>EDI    <span class="tweak">C</span>ARE</h1>

              <p>
                <button onclick="window.location.href='Products.php'" type="button" style="text-center: center; margin-right:40%;margin-left:40%; margin-top: 150px; background-color:black;color:white ;box-shadow:0 6px 6px; cursor: pointer;opacity: 0.6; ">Shop Now</button>
              </p>

         </div>
 
      
     
<!DOCTYPE html>

<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="footer, address, phone, icons" />

  
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="style.css">

</head>

  <body>
    <div class="main"> </div>
    <footer class="footer-distributed">

      <div class="footer-left">
        <h3>Medi <span>Care</span></h3>
        <div class="footer-icons">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-phone"></i>
          <p> +91 8965741236</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="#">medicare@gmail.com</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the company</span>
         Medicare Company aims to improve the entire supply chain in the Phrma sector by completely digitizing the process.
        </p>

      </div>

    </footer>

       
       </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
