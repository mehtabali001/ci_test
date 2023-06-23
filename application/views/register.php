<div class="container box">
<div class="loginsection">  
<!-- Registration form -->

<div class="col-md-12 mx-auto">
<h2>Register</h2>
<?php if(validation_errors()){ ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?php echo validation_errors(); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php echo form_open('auth/register', array('class' => 'row g-3', 'method' => 'POST')); ?>
<div class="col-md-12">
    <label for="username" class="form-label">Username:</label>
    <input type="text" class="form-control" name="username" id="username">
  </div>
  <div class="col-md-12">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <div class="col-md-12">
    <label for="inputState" class="form-label">User Type</label>
    <select id="inputState" class="form-select" name="role">
        <option value="admin" selected>Admin</option>
        <option value="user">User</option>
    </select>
  </div>

  <!-- <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div> -->
  <div class="col-md-12">
    <button type="submit" class="btn btn-primary">Register</button>
  </div>
    <?php echo form_close(); ?>
    </div>
</div>
</div>
