<?php
  require "db_connection.php";

  if($con) {
    if(isset($_GET["action"]) && $_GET["action"] == "delete") {
      $id = $_GET["id"];
      $query = "DELETE FROM products WHERE ID = $id";
      $result = mysqli_query($con, $query);
      if(!empty($result))
    		showMedicines(0);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "edit") {
      $id = $_GET["id"];
      showMedicines($id);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "update") {
      $id = $_GET["id"];
	  $product_code = $_GET["product_code"];
      $product_name = ucwords($_GET["product_name"]);
      $packing = strtoupper($_GET["packing"]);
      $product_img_name = $_GET["product_img_name"];
	  $qty= $_GET["qty"];
	  $price = $_GET["price"];
	  $suppliers_name = ucwords("$_desc");_GET["suppliers_name"];
      updateMedicine($id, $product_code, $product_name, $packing, $product_img_name, $qty, $price, $suppliers_name );
    }

    if(isset($_GET["action"]) && $_GET["action"] == "cancel")
      showMedicines(0);

    if(isset($_GET["action"]) && $_GET["action"] == "search")
      searchMedicine(strtoupper($_GET["text"]), $_GET["tag"]);
  }

  function showMedicines($id) {
    require "db_connection.php";
    if($con) {
      $seq_no = 0;
      $query = "SELECT * FROM products";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        if($row['id'] == $id)
          showEditOptionsRow($seq_no, $row);
        else
          showMedicineRow($seq_no, $row);
      }
    }
  }

  function showMedicineRow($seq_no, $row) {
    ?>
	
    <tr>
      <td><?php echo $seq_no; ?></td>
	   <td><?php echo $row['product_code']; ?></td>
      <td><?php echo $row['product_name']; ?></td>
	 <td> <?php if(isset($packing)){echo $packing;} echo $row['packing'];?> </td>
      <td><?php echo $row['product_img_name']; ?></td>
	  <td><?php echo $row['qty']; ?></td>
	  <td><?php echo $row['price']; ?></td>
	  
      <td>
        
        <button class="btn btn-danger btn-sm" onclick="deleteMedicine(<?php echo $row['id']; ?>);">
          <i class="fa fa-trash"></i>
        </button>
      </td>
    </tr>
    <?php
  }

function showEditOptionsRow($seq_no, $row) {
  ?>
  <tr>
    <td><?php echo $seq_no; ?></td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['product_code']; ?>" placeholder="Product Code" id="product_code" onblur="notNull(this.value, 'product_code_error');">
      <code class="text-danger small font-weight-bold float-right" id="product_code_error" style="display: none;"></code>
    </td>
	 <td>
      <input type="text" class="form-control" value="<?php echo $row['product_name']; ?>" placeholder="Product Name" id="product_name" onblur="notNull(this.value, 'product_name_error');">
      <code class="text-danger small font-weight-bold float-right" id="product_name_error" style="display: none;"></code>
    </td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['packing']; ?>" placeholder="Packing" id="packing" onblur="notNull(this.value, 'packing_error');">
      <code class="text-danger small font-weight-bold float-right" id="packing_error" style="display: none;"></code>
    </td>
    
	 <td>
      <input type="image" class="form-control" value="<?php echo $row['product_img_name']; ?>" placeholder="Product Image" id="product_img_name" onblur="notNull(this.value, 'product_img_name_error');">
      <code class="text-danger small font-weight-bold float-right" id="product_img_name_error" style="display: none;"></code>
    </td>
	 <td>
      <input type="text" class="form-control" value="<?php echo $row['qty']; ?>" placeholder="Quantity" id="qty" onblur="notNull(this.value, 'qty_error');">
      <code class="text-danger small font-weight-bold float-right" id="qty_error" style="display: none;"></code>
    </td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['price']; ?>" placeholder="Price" id="price" onblur="notNull(this.value, 'price_error');">
      <code class="text-danger small font-weight-bold float-right" id="price_error" style="display: none;"></code>
    </td>
    <td>
      
      <button class="btn btn-danger btn-sm" onclick="deleteMedicine($row['id']);">
        <i class="fa fa-close"></i>
      </button>
    </td>
  </tr>
  <?php
}

function updateMedicine( $id) {
  require "db_connection.php";

  $str="select * from products where id='$id'";
  $qry=mysqli_query($con,$str);
  $res=mysqli_fetch_assoc($qry);

  $product_code=$res['product_code'];
  $product_name=$res['product_name'];
  $packing=$res['packing'];
  $product_img_name=$res['product_img_name'];
  $qty=$res['qty'];
  $price=$res['price'];

  $query = "UPDATE products SET product_code = '$product_code', product_name = '$product_name', packing = '$packing', product_img_name = '$product_img_name', qty = '$qty', price = '$price' WHERE id = '$id'";
  $result = mysqli_query($con, $query);
  if(!empty($result))
    showMedicines(0);
}

function searchMedicine($text, $tag) {
  require "db_connection.php";
  if($tag == "product_code")
    $column = "PRODUCT_CODE";
  if($tag == "product_name")
    $column = "PRODUCT_NAME";
 
  if($con) {
    $seq_no = 0;
    $query = "SELECT * FROM products WHERE UPPER($column) LIKE '%$text%'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result)) {
      $seq_no++;
      showMedicineRow($seq_no, $row);
    }
  }
}

?>
