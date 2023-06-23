 <div class="container box"> 
<!-- Display list of todo lists -->

<div class="table-responsive"> 

<h2>Todo Tasks <a href="<?php echo site_url('todo/create'); ?>" class="btn btn-primary" style="float: right;"> Create New Todo</a></h2>

<?php $success_message = $this->session->userdata('success_message');
if (isset($success_message)) {
?>
<div class="alert alert-success alert-dismissable fade show" role="alert">

<?php echo $success_message ?>  
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right;"></button>                  
</div>
<?php
$this->session->unset_userdata('success_message');
}?>

<table id="user_data" class="table table-bordered table-striped"> 
    <thead>
        <tr>
            <th>S.No</th>
            <th>Date</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
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
                     "targets":[0, 1, 2, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });  
 });  
 </script>
<!-- <script>
    function updateValue(key, id){
        
        var completed = $("#completed_"+id).val();
        console.log(completed)
        var postData;
        if(key == 'completed'){
            postData = 'name=completed&value='+completed+'&pk='+id;
            if(status == '0'){
                $("#completed_"+id).css("color", "green");
			}else if(status == 1){
			    $("#completed_"+id).css("color", "red");
			}else if(status == 2){
			    $("#completed_"+id).css("color", "green");
			}
            
        }
        
        jQuery.ajax({
				url  	: base_url+"Todo/update_attendance1",
				type 	: 'POST',
				data 	: postData,
				success : function(data){
				    console.log(data);
				}
			});	
    
}
</script> -->
  