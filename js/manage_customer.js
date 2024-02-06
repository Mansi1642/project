function deleteCustomer(id) {
  var confirmation = confirm("Are you sure?");
  if(confirmation) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState = 4 && xhttp.status == 200)
        document.getElementById('customers_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "php/manage_customer.php?action=delete&id=" + id, true);
    xhttp.send();
  }
}

function editCustomer(id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('customers_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "php/manage_customer.php?action=edit&id=" + id, true);
  xhttp.send();
}

function updateCustomer(id) {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var address = document.getElementById("address");
  var city = document.getElementById("city");
  var pin = document.getElementById("pin");
  var email = document.getElementById("email");
  var password = document.getElementById("password");
  if(!validateFname(fname.value, "fname_error"))
    fname.focus();
  else if(!validateLname(lname.value, "lname_error"))
    lname.focus();
  else if(!validateAddress(ddress.value, "address_error"))
    address.focus();
  else if(!validateCity(city.value, 'city_error'))
    city.focus();
  else if(!validatePin(pin.value, 'pin_error'))
    pin.focus();
	 else if(!validateEmail(email.value, "email_error"))
    email.focus();
	 else if(!validatePAssword(password.value, "password_error"))
    password.focus();
  else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState = 4 && xhttp.status == 200)
        document.getElementById('customers_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "php/manage_customer.php?action=update&id=" + id + "f&name=" + fname.value + "&lname=" + lname.value + "&address=" + address.value + "&city=" + city.value + "&pin=" + pin.value "&email=" + email.value, "&password=" + password.value,, true);
    xhttp.send();
  }
}

function cancel() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('customers_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "php/manage_customer.php?action=cancel", true);
  xhttp.send();
}

function searchCustomer(text) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('customers_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "php/manage_customer.php?action=search&text=" + text, true);
  xhttp.send();
}
