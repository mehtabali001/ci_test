<!-- Edit todo form -->
<div class="container box"> 
<h2>Edit Todo <a href="<?php echo site_url('todo'); ?>" class="btn btn-primary" style="float: right;"> Back To Lists</a></h2>
<?php echo validation_errors(); ?>

<?php $todo_list= $this->db->query("select * from todo_lists where id = '".$id."'")->row_array(); ?>
<?php echo form_open('todo/edit/' . $todo_list['id']); ?>
<div class="col-md-6">
    <label for="title">Title:</label>
    <input type="text" name="title" class="form-control" value="<?php echo $todo_list['title']; ?>" required>
</div>
<div class="col-md-6">
    <label for="description">Description:</label>
    <textarea name="description" class="form-control" required><?php echo $todo_list['description']; ?></textarea>
</div>
<h2>Tasks</h2>
<div class="col-md-6">
<input type="text" name="task" class="form-control" value="<?php echo $todo_list['task']; ?>" required>
</div>
<div class="col-md-6" style="height:50px;">
<input type="checkbox" name="completed" <?php echo $todo_list['completed'] ? 'checked' : ''; ?>> Completed
</div>
 

    <!-- Add more tasks as needed -->
    <div class="col-md-12">

    <button type="submit" class="btn btn-primary">Update</button>
    </div>
<?php echo form_close(); ?>
</div>