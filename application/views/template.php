<!DOCTYPE html>
<html>
<head>
    <title>Todo List Management</title>
    <!-- Add your CSS and JavaScript includes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     
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
        select.input-sm {
            line-height: 20px !important;
        }
        .fade{opacity:1;}
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
        <?php 
        if($this->session->userdata('user_id')){ 
        $user =	$this->User_model->select_single_field('username','users',array('id'=>$this->session->userdata('user_id')));
        ?>
        <li class="nav-item">
        Welcome <?=$user;?> | <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>  
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
    <main>
        <?php $this->load->view($content_view); ?>
    </main>
<footer>
    <!-- Add your site footer content -->
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
