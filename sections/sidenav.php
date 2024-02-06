<script type="text/javascript">
  var pid = "none";
  function showhide(id) {
    var elements = document.getElementById(id).childNodes;
    var menu = elements[3];
    var arrow = ((elements[1].childNodes)[4].childNodes)[1];
    if(menu.style.display == 'block') {
      menu.style.display = "none";
      arrow.style.transform = "rotate(0deg)";
      elements[1].style.color = "#eeeeee";
    }
    else {
      menu.style.display = "block";
      arrow.style.transform = "rotate(270deg)";
      elements[1].style.color = "#ff5252";
    }
    if(pid == id)
      pid = "none";
    if(pid != "none") {
      elements = document.getElementById(pid).childNodes;
      menu = (document.getElementById(pid).childNodes)[3];
      arrow = ((elements[1].childNodes)[4].childNodes)[1];
      if(menu.style.display == 'block') {
        menu.style.display = "none";
        arrow.style.transform = "rotate(0deg)";
        elements[1].style.color = "#eeeeee";
      }
    }
    pid = id;
  }

  function showOptions() {
    var flag = document.getElementById('options');
    if(flag.style.display == 'block') {
      flag.style.display = "none";
      document.getElementById('mark').style.display = "none";
    }
    else {
      flag.style.display = "block";
      document.getElementById('mark').style.display = "block";
    }
  }
</script>

<div class="sidenav">
  <div class="card">
    <div class="card-body">
      <div class="logo">
        <img src="images/prof.jpg" class="profile"/>
        <h1 class="logo-caption"><span class="tweak">A</span>dmin</h1>
      </div> <!-- logo class -->

      <!-- dashboard start -->
      <div class="main-menu-item">
        <a href="home.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
      </div>
      <!-- dashboard end -->

      <!-- invoice strat -->
      <div id="first" class="main-menu-item" onclick="showhide(this.id);">
      	<a  href="#">
      		<i class="fa fa-balance-scale"></i><span>Invoice</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
      		
      		<li class="treeview"><a href="manage_invoice.php">Manage Invoice </a></li>
      	</ul>
      </div>
      <!-- invoice end -->

      <!-- customer end -->
      <div id="second" class="main-menu-item" onclick="showhide(this.id);">
      	<a href="#">
      		<i class="fa fa-handshake"></i><span>Customer</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
      		
      		<li class="treeview"><a href="manage_customer.php">Manage Customer</a></li>
      	</ul>
      </div>
      <!-- customer end -->

      <!-- medicine strat -->
      <div id="third" class="main-menu-item" onclick="showhide(this.id);">
      	<a href="#">
      		<i class="fa fa-shopping-bag"></i><span>Products</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
      		<li class="treeview"><a href="add_products.php">Add Products</a></li>
      		<li class="treeview"><a href="manage_products.php">Manage Products</a></li>
          
      	</ul>
      </div>
      <!-- medicine end -->

      <!-- manufacturer start -->
     
      <!-- manufacturer end -->

      <!-- purchase start -->
      
      <!-- purchase end -->

      <!-- report start -->
      <div id="sixth" class="main-menu-item" onclick="showhide(this.id);">
      	<a href="#">
      		<i class="fa fa-book"></i><span>Report</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
          <li class="treeview"><a href="sales_report.php">Sales Report</a></li>
      		
      	</ul>
      </div>
      <!-- report end -->

      <!-- search start -->
      <div id="seventh" class="main-menu-item" onclick="showhide(this.id);">
      	<a href="#">
      		<i class="fa fa-search"></i><span>Search</span>
      		<span class="pull-right-container">
      			<i class="fa fa-angle-left pull-right"></i>
      		</span>
      	</a>
      	<ul class="treeview-menu" style="display: none;">
          <li class="treeview"><a href="manage_invoice.php">Invoice</a></li>
          <li class="treeview"><a href="manage_customer.php">Customer</a></li>
      		<li class="treeview"><a href="manage_products.php">Products</a></li>
         
      		
      	</ul>
      </div>
      <!-- search end -->

    </div> <!-- card-body class -->
  </div> <!-- card  -->
</div>
