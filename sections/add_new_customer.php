<!-- customer details content -->
<!-- customer name control -->
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="customer_name">Customer Name :</label>
    <input type="text" class="form-control" placeholder="Name" id="customer_name" onkeyup="validateName(this.value, 'name_error');">
    <code class="text-danger small font-weight-bold float-right" id="name_error" style="display: none;"></code>
  </div>
</div>

<!-- customer contact number control -->
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="customer_contact_number">Contact Number :</label>
    <input type="number" class="form-control" placeholder="Contact Number" id="customer_contact_number" onblur="validateContactNumber(this.value, 'contact_number_error');">
    <code class="text-danger small font-weight-bold float-right" id="contact_number_error" style="display: none;"></code>
  </div>
</div>

<!-- customer address control -->
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="customer_address">Address :</label>
    <textarea class="form-control" placeholder="Address" id="customer_address" onblur="validateAddress(this.value, 'address_error');"></textarea>
    <code class="text-danger small font-weight-bold float-right" id="address_error" style="display: none;"></code>
  </div>
</div>

<!-- customes's doctor name -->
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="customer_doctors_name">Doctor's Name :</label>
    <input type="text" class="form-control" placeholder="Doctor's Name" id="customer_doctors_name" onkeyup="validateName(this.value, 'doctor_name_error');">
    <code class="text-danger small font-weight-bold float-right" id="doctor_name_error" style="display: none;"></code>
  </div>
</div>

<!-- customes's doctor name -->
<div class="row col col-md-12">
  <div class="col col-md-12 form-group">
    <label class="font-weight-bold" for="customer_doctors_address">Doctor's Address :</label>
    <textarea class="form-control" placeholder="Doctor's Address" id="customer_doctors_address" onblur="validateAddress(this.value, 'doctor_address_error');"></textarea>
    <code class="text-danger small font-weight-bold float-right" id="doctor_address_error" style="display: none;"></code>
  </div>
</div>
<!-- customer details content end -->

<!-- horizontal line -->
<div class="col col-md-12">
  <hr class="col-md-12 float-left" style="padding: 0px; width: 95%; border-top: 2px solid  #02b6ff;">
</div>

<!-- form submit button -->
<div class="row col col-md-12">
  &emsp;
  <div class="form-group m-auto">
    <button class="btn btn-primary" onclick="addCustomer();">ADD</button>
  </div>
  <!--
  &emsp;
  <div class="form-group">
    <button class="btn btn-success form-control">Save and Add Another</button>
  </div>
  -->
</div>
<!-- result message -->
<div id="customer_acknowledgement" class="col-md-12 h5 text-success font-weight-bold text-center" style="font-family: sans-serif;"></div>
