<html>  
 <head>  
   <title><?php echo $title; ?></title> 
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
   <style>  
           body  
           {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
           }  
           .box  
           {  
                width:900px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
           }  
      </style> 
      <style>
        .navbar-collapse {
            flex-grow: 0 !important;
        }
        .loginsection{
            margin:30px 0;
        }
        h2 {
            margin-bottom: 34px;
        }
    </style> 
 </head>  
 <body> 
 <header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">To-Do Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> -->
        <?php if($this->session->userdata('user_id')){ ?>
        <li class="nav-item">  
          <a class="nav-link" href="<?php echo site_url('todo/create'); ?>">Create New Todo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('auth/logout'); ?>">Logout</a>  
        </li>
        <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Auth'); ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Auth/register'); ?>">Register</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
</header>   
<div class="container box"> 
<!-- Display list of todo lists -->
<h2>Todo Tasks</h2>
<div class="table-responsive"> 
<table id="user_data" class="table table-bordered table-striped"> 
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <?php /* ?><tbody>
        <?php 
            if($todo_lists):
            foreach ($todo_lists as $todo_list): 
        ?>
            <tr>
                <td><?php echo $todo_list->title; ?></td>
                <td><?php echo $todo_list->description; ?></td>
                <td>
                    <a href="<?php echo site_url('todo/view/' . $todo_list->id); ?>">View</a>
                    <a href="<?php echo site_url('todo/edit/' . $todo_list->id); ?>">Edit</a>
                    <a href="<?php echo site_url('todo/delete/' . $todo_list->id); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody><?php */ ?>
</table>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>  
</html> 
<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'todo/fetch_todlists'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 1, 2],  
                     "orderable":false,  
                },  
           ],  
      });  
 });  
 </script>  