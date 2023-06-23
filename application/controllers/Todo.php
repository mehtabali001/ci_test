<?php
class Todo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Todo_model');
        $this->load->model('Task_model');
        $this->load->library('form_validation');
    }

   /* public function lists() {
        // Check if user is logged in
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('auth/login');
        }

        // Get todo lists for the logged-in user
        $data['todo_lists'] = $this->Todo_model->get_todo_lists($user_id);
        $todo_lists = $data['todo_lists'];
        // Display todo lists view
        //$this->load->view('lists', $data);
        $this->load->view('template', array(
            'content_view' => 'lists',
            'todo_lists' => $todo_lists
        ));
    }*/

    function index(){  
 
        $this->load->view('template', array(
            'content_view' => 'lists'
        )); 
   }

    function fetch_todlists(){  
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('auth/login');
        }
        $fetch_data = $this->Todo_model->make_datatables();  
        $data = array();  
        $i = 1;
        foreach($fetch_data as $row)  
        {  
//          $complete =	$this->User_model->select_single_field('completed','tasks',array('todo_list_id'=>$row->id));
//          $dropdown = '<select id="completed_' . $row->id . '" style="width: 100%; height: 100%; border: none; padding: 10px;" onchange="updateValue(\'completed\', ' . $row->id . ')">
//            <option value="0"' . ($complete == 0 ? ' selected' : '') . '>Pending</option>
//            <option value="1"' . ($complete == 1 ? ' selected' : '') . '>Underprocess</option>
//            <option value="2"' . ($complete == 2 ? ' selected' : '') . '>Completed</option>
//          </select>';
        if($row->user_id == $this->session->userdata('user_id')){
             if($row->completed == 0){
                $complete = 'No';
             }elseif($row->completed == 1){
                $complete = 'Yes';
             }

            //$row = array_map('stripslashes', $row);
             $sub_array = array();
             $sub_array[] = $i++;   
             $sub_array[] = date("F j, Y",strtotime($row->created_at));
             $sub_array[] = $row->title;  
             $sub_array[] = $row->description;
             $sub_array[] = $complete;  
             $sub_array[] = '<a href="'. site_url('todo/view/' . $row->id).'"><i class="fa fa-eye"></i></a>'.'  '. '<a href="'. site_url('todo/edit/' . $row->id).'"><i class="fa fa-pen"></i></a>'. '  ' . '<a href="'. site_url('todo/delete/' . $row->id).'"  onclick="return confirm("Are you sure you want to delete?");"><i class="fa fa-trash"></i></a>';   
             $data[] = $sub_array;  
        }  
        
        $output = array(  
             "draw"                =>     isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,  
             "recordsTotal"        =>     $this->Todo_model->get_all_data($user_id),  
             "recordsFiltered"     =>     $this->Todo_model->get_filtered_data($user_id),  
             "data"                =>     $data  
        );  
        //header('Content-Type: application/json');
    }
        echo json_encode($output); 
   
        
   } 

    public function view($todo_list_id) {
        // Check if user is logged in
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('auth/login');
        }
        $data['id'] = $todo_list_id;

        // Display todo list view
        $this->load->view('template', array(
            'content_view' => 'view_todo',
            'id' => $data['id'],
        ));
    }

    public function create() {
        // Check if user is logged in
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('auth/login');
        }

        // Process create todo form submission
        if ($this->input->post()) {
            $data = array(
                'user_id' => $user_id,
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'task'        => $this->input->post('task')
            );

            $todo_list_id = $this->Todo_model->create_todo_list($data);
            //redirect('todo/lists');
            redirect('todo');
        }

        // Display create todo form
       // $this->load->view('create_todo');
        $this->load->view('template', array(
            'content_view' => 'create_todo'
        ));
    }

    public function edit($todo_list_id) {
        //print_r($_POST);exit;
        // Check if user is logged in
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('auth/login');
        }
        $data['id'] = $todo_list_id;
        // Process edit todo form submission
        $completed = 0;
        if ($this->input->post()) {
            $is_completed = $this->input->post('completed');
            $completed = isset($is_completed) && $is_completed === 'on' ? 1 : 0;
            //echo $completed; exit;
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'task'        => $this->input->post('task'),
                'completed'   => $completed,
            );
           //print_r($data);exit;
            $this->Todo_model->update_todo_list($todo_list_id, $data);
            redirect('todo');
        }

        // Display edit todo form
        $this->load->view('template', array(
            'content_view' => 'edit_todo',
            'id' => $data['id'],
        ));
    }

    public function delete($todo_list_id) {
        // Check if user is logged in
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('auth/login');
        }

        // Delete todo list and its tasks
        //$this->Task_model->delete_tasks_by_todo_list($todo_list_id);
        $this->Todo_model->delete_todo_list($todo_list_id);
        $this->session->set_userdata(array('success_message' => 'Todo Deleted!'));
        redirect('todo');
    }

    // public function update_attendance1(){
    //     // print_r($_POST);
    //     // exit();
    //   $data = array(
    //      $_POST["name"] => $_POST['value'],
    //  );
    //      $this->db->update('tasks', $data, array('id' => $_POST['pk']));
    //  }
}
?>
