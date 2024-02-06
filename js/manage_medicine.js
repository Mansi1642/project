function deleteMedicine(id) {
  var confirmation = confirm("Are you sure?");
  if(confirmation) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState = 4 && xhttp.status == 200)
        document.getElementById('medicines_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "php/manage_products.php?action=delete&id=" + id, true);
    xhttp.send();
  }
}

function editMedicine(id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('medicines_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "php/manage_products.php?action=edit&id=" + id, true);
  xhttp.send();
}

function updateMedicine(id) {
	var product_code = document.getElementById("product_code");
  var product_name = document.getElementById("product_name");
  var packing = document.getElementById("packing");
  var product_img_name = document.getElementById("product_img_name");
  var qty = document.getElementById("qty");
  var price = document.getElementById("price");
  var suppliers_name = document.getElementById("suppliers_name");

  if(!notNull(product_code.value, "product_code_error"))
    product_code.focus();
  else if(!notNull(product_name.value, "product_name_error"))
    product_name.focus();
  else if(!notNull(packing.value, "packing_error"))
    packing.focus();
  else if(!notNull(product_img_name.value, "product_img_name_error"))
    product_img_name.focus();
else if(!notNull(qty.value, "qty_error"))
    qty.focus();
else if(!notNull(price.value, "price_error"))
    price.focus();
else if(!notNull(suppliers_name.value, "suppliers_name_error"))
   suppliers_name.focus();
  else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState = 4 && xhttp.status == 200)
        document.getElementById('medicines_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "php/manage_products.php?action=update&id=" + id + "&product_codee=" + product_code.value + "&product_name=" + product_name.value + "&packing=" + packing.value + "&product_img_name=" + product_img_name.value  + "&qtye=" + qty.value  + "&price=" + price.value + "&suppliers_name=" + suppliers_name.value, true);
    xhttp.send();
  }
}

function cancel() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('medicines_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "php/manage_products.php?action=cancel", true);
  xhttp.send();
}

function searchMedicine(text, tag) {
  if(tag == "name") {
    document.getElementById("by_product_name").value = "";
    document.getElementById("by_suppliers_name").value = "";
  }
  if(tag == "product_name") {
    document.getElementById("by_name").value = "";
    document.getElementById("by_suppliers_name").value = "";
  }
  if(tag == "suppliers_name") {
    document.getElementById("by_name").value = "";
    document.getElementById("by_product_name").value = "";
  }

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('medicines_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "php/manage_products.php?action=search&text=" + text + "&tag=" + tag, true);
  xhttp.send();
}
