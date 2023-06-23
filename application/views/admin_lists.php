<!-- Display todo lists for admin -->
<h1>Admin Lists</h1>
<table>
    <!-- Display todo lists using a loop -->
    <?php foreach ($todo_lists as $todo_list): ?>
        <tr>
            <td><?php echo $todo_list->date; ?></td>
            <td>
                <a href="<?php echo base_url('todo/view/' . $todo_list->id); ?>">View</a>
                <a href="<?php echo base_url('todo/edit/' . $todo_list->id); ?>">Edit</a>
                <a href="<?php echo base_url('todo/delete/' . $todo_list->id); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="<?php echo base_url('auth/logout'); ?>">Logout</a>
