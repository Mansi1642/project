<!-- supplier details content -->
<!-- supplier name control -->
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="supplier_name">Supplier Name :</label>
    <input type="text" class="form-control" placeholder="Name" id="supplier_name" onkeyup="validateName(this.value, 'name_error');">
    <code class="text-danger small font-weight-bold float-right" id="name_error" style="display: none;"></code>
  </div>
</div>

<!-- supplier email control -->
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="supplier_email">Supplier Email :</label>
    <input type="email" autocomplete="off" class="form-control" placeholder="Email" id="supplier_email" onblur="validateEmail(this.value, 'email_error');">
    <code class="text-danger small font-weight-bold float-right" id="email_error" style="display: none;"></code>
  </div>
</div>

<!-- supplier contact number control -->
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="supplier_contact_number">Supplier Contact Number :</label>
    <input type="number" class="form-control" placeholder="Contact Number" id="supplier_contact_number" onblur="validateContactNumber(this.value, 'contact_number_error');">
    <code class="text-danger small font-weight-bold float-right" id="contact_number_error" style="display: none;"></code>
  </div>
</div>

<!-- supplier address control -->
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="supplier_address">Supplier Address :</label>
    <textarea class="form-control" placeholder="Address" id="supplier_address" onblur="validateAddress(this.value, 'address_error');"></textarea>
    <code class="text-danger small font-weight-bold float-right" id="address_error" style="display: none;"></code>
  </div>
</div>
<!-- supplier details content end -->

<div class="col col-md-12">
  <hr class="col-md-12 float-left" style="padding: 0px; width: 95%; border-top: 2px solid  #02b6ff;">
</div>

<!-- new user button -->
<div class="row col col-md-12">
  &emsp;
  <div class="form-group m-auto">
    <button class="btn btn-primary form-control" onclick="addSupplier();">ADD</button>
  </div>
  <!--
  &emsp;
  <div class="form-group">
    <button class="btn btn-success form-control">Save and Add Another</button>
  </div>
  -->
</div>
<!-- result message -->
<div id="supplier_acknowledgement" class="col-md-12 h5 text-success font-weight-bold text-center" style="font-family: sans-serif;"></div>
