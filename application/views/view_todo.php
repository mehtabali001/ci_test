<!-- Display details of a specific todo list -->
<div class="container box"> 
<?php
 $todo_list= $this->db->query("select * from todo_lists where id = '".$id."'")->row_array();
//print_r($todo_list);
?>    
<h2><?php echo $todo_list['title']; ?></h2>
<p><?php echo $todo_list['description']; ?></p>

<h3>Tasks:</h3>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Task</th>
            <th>Completed</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td><?php echo $todo_list['task']; ?>/td>
                <td><?php echo $todo_list['completed'] ? 'Yes' : 'No'; ?></td>
            </tr>
    </tbody>
</table>

<a href="<?php echo site_url('todo'); ?>">Back to Todo Lists</a>
</div>