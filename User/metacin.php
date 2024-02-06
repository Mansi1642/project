
<?php
  require "db.php";
  if($conn) {
if(isset($_POST['submit']))
    {

	// die($_POST['image']);
$product_code = $_POST['product_code'];
$product_name = $_POST ['product_name']; 
$packing = $_POST['packing'];
$product_desc = $_POST['product_desc'];
echo '<a href="USer/products.php?id='.$row['id'].'">Read More</a><br><br>';
$product_img_name = $_FILES['image']['tmp_name'];
$qty = $_POST['qty'];
$price = $_POST['price'];

$filename = '';
if(isset($_FILES["image"])){
$filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
        $folder = "C:\wamp64\www\php\Main Project\Pharmacy-Management\User\images\products";
        if ( move_uploaded_file($tempname, "$folder/$filename"))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }

}
// $query = "INSERT INTO products (product_code, product_name, packing, product_desc, product_img_name, qty, price) VALUES('$product_code', '$product_name', '$packing', '$product_desc', 'abc', '$qty', '$price') ";
$query = "INSERT INTO `products`(`product_code`, `product_name`, `packing`, `product_desc`,`product_img_name`, `qty`, `price`) VALUES ('$product_code','$product_name','$packing','$product_desc','$filename',qty,price)";
  // die($query);
$result = mysqli_query($conn, $query);
//die("czxcz");
}
   /* $query = "SELECT * FROM products WHERE UPPER(CODE) = '".strtoupper($product_code)."' AND UPPER(NAME) = '".strtoupper($product_name)."' AND UPPER(Product Image) = '".strtoupper($product_img_name)."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
	*/
    
	
	
}  
?>

<form  method="post" enctype="multipart/form-data">
<div class="row col col-md-12">
  <div class="col col-md-8 form-group">
    <label class="font-weight-bold" for="product_code">Product Code :</label>
    <input type="number" class="form-control" pattern=""  title="How much in one unit" id="product_code" placeholder="Product Code" onblur="notNull(this.value, 'product_code_error');" name="product_code">
    <code class="text-danger small font-weight-bold float-right" id="product_code_error" style="display: none;"></code>
  </div>
  <div class="col col-md-8 form-group">
    <label class="font-weight-bold" for="product_name">Product Name :</label>
    <input type="text" pattern="[a-zA-Z\s]+" title="Enter valid Product Name"  class="form-control" id="product_name" placeholder="Product Name" onblur="notNull(this.value, 'product_name_error');" name="product_name">
    <code class="text-danger small font-weight-bold float-right" id="product_name_error" style="display: none;"></code>
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="mlmg">Packing :</label>
    <input type="text" class="form-control" pattern="[a-zA-Z0-9\s]+"  title="How much in one unit" id="packing" placeholder="Packing e.g. 10 TAB / 100 ML" onblur="notNull(this.value, 'packing_error');" name="packing">
    <code class="text-danger small font-weight-bold float-right" id="pcking_error" style="display: none;"></code>
  </div>
</div>

<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="product_desc">Product Description :</label>
    <input id="product_desc" type="text" class="form-control" id="product_desc" placeholder="Product Description" name="product_desc" onkeyup="notNull(this.value, 'product_desc_error');">
    <code class="text-danger small font-weight-bold float-right" id="product_desc_error" style="display: none;"></code>
    <div id="product_desc_error" class="list-group position-fixed" style="z-index: 1; width: 35.80%; overflow: auto; max-height: 200px;"></div>
  </div>
</div>
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="product_img_name">Product Image:</label>
	<!-- <input type="file" name="product_img" id="product_img"> -->
   <input type="file" name="image" />
    <code class="text-danger small font-weight-bold float-right" id="product_img_name_error" style="display: none;"></code>
    <div id="product_img_name_error" class="list-group position-fixed" style="z-index: 1; width: 35.80%; overflow: auto; max-height: 200px;"></div>
  </div>
</div>
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="qty">Product Quantity :</label>
    <input id="qty" type="text" pattern="[1-9]{1,3}" title="Total Quantity" class="form-control" id="qty" placeholder="Product Quantity" name="qty" onkeyup="notNull(this.value, 'qty_error');">
    <code class="text-danger small font-weight-bold float-right" id="qty_error" style="display: none;"></code>
    <div id="qty_error" class="list-group position-fixed" style="z-index: 1; width: 35.80%; overflow: auto; max-height: 200px;"></div>
  </div>
</div>
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="price">Product Price :</label>
    <input id="price" type="number" pattern="^[1-9]{0,3}.?[0-9]{1}$" title="Enter Valid Price" class="form-control" id="price" placeholder="Product Price" name="price" onkeyup="notNull(this.value, 'price_error');">
    <code class="text-danger small font-weight-bold float-right" id="price_error" style="display: none;"></code>
    <div id="price_error" class="list-group position-fixed" style="z-index: 1; width: 35.80%; overflow: auto; max-height: 200px;"></div>
  </div>




<hr>

<div class="col col-md-12">
  <hr class="col-md-12 float-left" style="padding: 0px; width: 95%; border-top: 2px solid  #02b6ff;">
</div>

<!-- new user button -->
<div class="row col col-md-12">
  &emsp;
  <div class="form-group m-auto">
 <button type="submit" class="button"  name="submit" value="submit">ADD</button>
 <!-- <button class="btn btn-primary form-control" onclick="document.getElementById('add_new_medicine_model');">ADD</button>-->
  </div>
  <!--
  &emsp;
  <div class="form-group">
    <button class="btn btn-success form-control">Save and Add Another</button>
  </div>
-->
</div>
<!-- customer details content end -->
<!-- result message -->
<div id="medicine_acknowledgement" class="col-md-12 h5 text-success font-weight-bold text-center" style="font-family: sans-serif;"></div>
</form>
