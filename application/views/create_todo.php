<!-- Create todo form -->
<div class="container box"> 
<div class="col-md-10">
<h2>Create New Todo</h2>
</div>
<div class="col-md-2">
<a href="<?php echo site_url('todo'); ?>" class="btn btn-danger">Back to Lists</a>
</div>
<?php if(validation_errors()){ ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?php echo validation_errors(); ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php echo form_open('todo/create'); ?>
<div class="col-md-6">
    <label for="title" class="form-label">Title:</label>
    <input type="text" class="form-control" name="title" id="title" required>
  </div>
  <div class="col-md-6">
    <label for="description">Description:</label>
    <textarea name="description" class="form-control" required></textarea>
  </div>
  <div class="col-md-12">
    <label for="tasks">Tasks:</label>
    <input type="text" class="form-control" name="task" required>
  </div> 
    <!-- Add more tasks as needed -->
    <div class="col-md-12">
    <br> 
    <button type="submit" class="btn btn-primary">Create</button>
    </div>
<?php echo form_close(); ?>


</div>