function notNull(text, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(text < 0) {
    result.innerHTML = "Invalid!";
    return false;
  }
  else if(text.trim() == "") {
    result.innerHTML = "Must be filled out!";
    return false;
  }
  result.style.display = "none";
  return true;
}

function validateName(name, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(name.trim() == "") {
    result.innerHTML = "Must be filled out!";
    return false;
  }
  result.innerHTML = "Must contain only letters!";
  for(var i = 0; i < name.length; i++)
    if(!((name[i] >= 'a' && name[i] <= 'z') || (name[i] >= 'A' && name[i] <= 'Z') || name[i] == ' '))
      return false;
  result.style.display = "none";
  return true;
}


  



function checkQuantity(quantity, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(quantity < 0 || !Number.isInteger(parseFloat(quantity)))
    result.innerHTML = "Invalid quantity!";
  else {
    result.style.display = "none";
    return true;
  }
  return false;
}

function checkValue(value, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(value < 0 || value == "")
    result.innerHTML = "Invalid!";
  else {
    result.style.display = "none";
    return true;
  }
  return false;
}

function checkDate(date, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(date == "")
    result.innerHTML = "Mustn't be empty!!";
  else if(new Date(date) > new Date())
    result.innerHTML = "Mustn't be future date!";
  else {
    result.style.display = "none";
    return true;
  }
  return false;
}

function addCustomer() {
  document.getElementById("products_acknowledgement").innerHTML = "";
  var product_code = document.getElementById("product_code");
  var product_name = document.getElementById("product_name");
  var packing = document.getElementById("packing");
  var product_desc = document.getElementById("product_desc");
  var product_img_name = document.getElementById("	product_img_name");
  var qty = document.getElementById("	qtye");
  var price  = document.getElementById("price");
  var suppliers_name = document.getElementById("suppliers_name");
  if(!validateProductCode(product_code.value, "product_code_error"))
    product_code.focus();
  else if(!validateProductName( product_name.value, " product_name_error"))
    product_name.focus();
  else if(!validatePacking( packing.value, " packing_error"))
     packing.focus();
  else if(!validateProductDescription(product_desc.value, 'product_desc_error'))
    product_desc.focus();
  else if(!validateProductImage(product_img_name.value, 'product_img_name_error'))
   product_img_name.focus();
	 else if(!validateQuantity(qty .value, "qty _error"))
     qty .focus();
	  else if(!validatePrice(price.value, "price_error"))
     price.focus();
	  else if(!validateSuppliersName(suppliers_name.value, "suppliers_name_error"))
     suppliers_name.focus();
  else {
    var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
  		if(xhttp.readyState = 4 && xhttp.status == 200)
  			document.getElementById("Products_acknowledgement").innerHTML = xhttp.responseText;
  	};
  	xhttp.open("GET", "php/add_medicine.php?name=" + product_code.value + "& product_name=" +  product_name.value + "& packing=" +  packing.value + "&product_desc=" + product_desc.value + "&product_img_name=" + product_img_name.value + "&qty=" + qty.value + "&price=" + price.value + "&suppliers_name=" + suppliers_name.value, true);
  	xhttp.send();
  }
  return false;
}

function addSupplier() {
  document.getElementById("supplier_acknowledgement").innerHTML = "";
  var supplier_name = document.getElementById("supplier_name");
  var supplier_email = document.getElementById("supplier_email");
  var contact_number = document.getElementById("supplier_contact_number");
  var supplier_address = document.getElementById("supplier_address");
  if(!validateName(supplier_name.value, "name_error"))
    supplier_name.focus();
  else if(!validateContactNumber(contact_number.value, "contact_number_error"))
    contact_number.focus();
  else if(!validateAddress(supplier_address.value, "address_error"))
    supplier_address.focus();
  else {
    var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
  		if(xhttp.readyState = 4 && xhttp.status == 200)
  			document.getElementById("supplier_acknowledgement").innerHTML = xhttp.responseText;
  	};
  	xhttp.open("GET", "php/add_new_supplier.php?name=" + supplier_name.value + "&email=" + supplier_email.value + "&contact_number=" + contact_number.value + "&address=" + supplier_address.value, true);
  	xhttp.send();
  }
}


}
