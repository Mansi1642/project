<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback || MEDI CARE</title>
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
		  <li><a href="feedback.php">Feedback</a></li>

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
   <div class="row" style="margin-top:10px;">
      <div class="large-12">
        
        <?php
          $result = $mysqli->query("SELECT * from feedback");
          if($result) {
            while($obj = $result->fetch_object()) {
              
              echo '<p><strong>First Name</strong>'.$obj->fname.'</p>';
              echo '<p><strong>Last Name</strong>'.$obj->lname.'</p>';
              echo '<p><strong>Email</strong>: '.$obj->email.'</p>';
              echo '<p><strong>State</strong>: '.$obj->state.'</p>';
              echo '<p><strong>City</strong>: '.$obj->city.'</p>';
              echo '<p><strong>State</strong>: '.$obj->state.'</p>';
              echo '<p><strong>Feedback</strong>: '.$obj->feedback.'</p>';
              echo '<div class="large-6 columns" style="padding-left:0;">';
              echo '<form method="post" name="update-quantity" action="admin-update.php">';
              echo '<p><strong>New Qty</strong>:</p>';
              echo '</div>';
              echo '<div class="large-6 columns">';
              echo '<input type="number" name="quantity[]"/>';

              echo '</div>';
              echo '</div>';
            }
          }
        ?>



      </div>
    </div>
  <div class="container">
      <div class="card m-auto p-2">
        <div class="card-body">
          <form name="login-form" class="login-form" action="feedback.php" method="post" onsubmit="return validateAndSetup();">
            <div class="logo">
              <h1 class="logo-caption font-weight-bolder"><span class="tweak">F</span>eedback  <span class="tweak">F</span>orm</h1>
              <p class="h5 text-center text-light">Enter necessary  details<p>
        		</div> <!-- logo class -->
            
             <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
              </div>
              <input id="first name" type="text" class="form-control" placeholder="Enter first name" onblur="notNull(this.value, 'firstname_error');" >
            </div> <!--input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="firstname_error" style="display: none;"></code>

           <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
              </div>
              <input id="last name" type="text" class="form-control" placeholder="Enter last name" onblur="notNull(this.value, 'lastname_error');" >
            </div> <!--input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="lastname_error" style="display: none;"></code>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope text-white"></i></span>
              </div>
              <input id="email" type="email" class="form-control" placeholder="Enter Email Address" >
            </div> <!--input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="email_error" style="display: none;"></code>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                 <label class="" for="state" style="color:#383838;  text-align: center;" >State : 
                  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp 
                 </label>
                    <select class="input-group-text" name="state" id="state" class="form-control" onkeyup="validate();" required>
                      <option class="input-group-text">Gujarat</option>
                      <option class="input-group-text">Maharashtra</option>
                      <option class="input-group-text">Madhya Pradesh</option>
                      <option class="input-group-text">Bihar</option>
                    </select> 
                  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp 
                </span>
              </div>
            </div> <!-- input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="contact_number_error" style="display: none;"></code>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <label class="" for="state" style="color:#383838;  text-align: center;" >City : 
                  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   &nbsp
                  &nbsp &nbsp &nbsp   &nbsp 
                 </label>
                    <select class="input-group-text" name="city" id="city" class="form-control" onkeyup="validate();" required>
                      <option class="input-group-text">Surat</option>
                      <option class="input-group-text">Ahmedabad</option>
                      <option class="input-group-text">Indore</option>
                      <option class="input-group-text">Nashik</option>
                      <option class="input-group-text">Mumbai</option>
                    </select>
                  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   &nbsp
  
                </span>
              </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-address-card text-white"></i></span>
            </div>
            <textarea id="feedback" class="form-control" placeholder="Write something.." onkeyup="validatefeedback(this.value, 'feedback');" style="max-height: 100px;" ></textarea>
          </div> <!-- input-group class -->
          <code class="text-light small font-weight-bold float-right mb-2" id="feedback" style="display: none;"></code>

      
            <div class="form-group">

              
              <button class="btn btn-default btn-block btn-custom"style="margin-top:25px ; margin-bottom:25px ; padding-left:100px; padding-right:100px;">SUBMIT</button>

              
            </div>
            </div>
          </form><!-- form close -->
		  

          <form name="login-form" class="login-form" action="feedback.php" method="post" onsubmit="return validateAndSetup();">
           
            <textarea id="feedback" class="form-control" placeholder="" onkeyup="validatefeedback(this.value, 'feedback');" style="max-height: 100px;"  value="<?php echo $feedback; ?> " ></textarea>
          
          <code class="text-light small font-weight-bold float-right mb-2" id="feedback" style="display: none;"></code>
        		
			</form>
				
		  
			
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
	</div> <!-- cord-body class -->
      </div> <!-- card class -->
    </div> <!-- container class -->
 </html>
