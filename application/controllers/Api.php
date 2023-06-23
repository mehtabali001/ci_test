<?php
class Api extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('todo_model');
        $this->load->model('task_model');
    }

    public function get_todo_lists() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $response['error'] = 'User not authenticated';
        } else {
            $todo_lists = $this->todo_model->get_todo_lists($user_id);
            $response['todo_lists'] = $todo_lists;
        }

        echo json_encode($response);
    }

    public function get_todo_list($todo_list_id) {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $response['error'] = 'User not authenticated';
        } else {
            $todo_list = $this->todo_model->get_todo_list($user_id, $todo_list_id);
            if ($todo_list) {
                $tasks = $this->task_model->get_tasks_by_todo_list($todo_list_id);
                $response['todo_list'] = $todo_list;
                $response['tasks'] = $tasks;
            } else {
                $response['error'] = 'Todo list not found';
            }
        }

        echo json_encode($response);
    }
}
?>
