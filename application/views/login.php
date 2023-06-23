<div class="container box">
<div class="loginsection">    
<!-- Login form -->
<div class="col-md-12 mx-auto">
<h2>Login</h2>    
<?php if(validation_errors()){ ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?php echo validation_errors(); ?>
  <?php if (isset($error)) { echo $error;} ?> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<?php 
$success_message = $this->session->userdata('success_message');
if (isset($success_message)) {
?>
    <div class="alert alert-success">
        <?php echo $success_message ?>                    
    </div>
<?php
    $this->session->unset_userdata('success_message');
}?>
<?php $error_message = $this->session->userdata('error_message');
if (isset($error_message)) {
?>
<div class="alert alert-danger alert-dismissable">

<?php echo $error_message ?>                    
</div>
<?php
$this->session->unset_userdata('error_message');
}?>
<?php echo form_open('auth', array('class' => 'row g-3', 'method' => 'POST')); ?>
  <div class="col-md-12">
    <label for="username" class="form-label">Username:</label>
    <input type="text" class="form-control" name="username" id="username">
  </div>
  <div class="col-md-12">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  
  <div class="col-md-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
  <?php echo form_close(); ?>
</div>
</div>
</div>
