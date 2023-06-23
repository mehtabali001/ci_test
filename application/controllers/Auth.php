<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
	{
		// Check if user is already logged in
        if ($this->session->userdata('user_id')) {
            redirect('todo');
        }

        // Process login form submission
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() === TRUE) {
                // Form validation successful, proceed with login
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $user = $this->User_model->login($username, $password);
                if ($user) {
                    $this->session->set_userdata('user_id', $user->id);
                    redirect('todo');
                } else {
                    $this->session->set_userdata(array('error_message' => 'Invalid username or password'));
                    redirect('auth');
                }
            }
        }
        // Display login form
        //$this->load->view('login', $data);
        $this->load->view('template', array(
            'content_view' => 'login'
        ));
	}

    public function register() {
        // Check if user is already logged in
        if ($this->session->userdata('user_id')) {
            redirect('todo/lists');
        }

        // Process registration form submission
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() === TRUE) {
                // Form validation successful, proceed with registration
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => $this->input->post('role')
                );

                $user_id = $this->User_model->register($data);

                $this->session->set_userdata('user_id', $user_id);
                redirect('todo');
            }
        }

        // Display registration form
        $this->load->view('template', array(
            'content_view' => 'register'
        ));
    }

    public function login() {
        // Check if user is already logged in
        if ($this->session->userdata('user_id')) {
            redirect('todo');
        }

        // Process login form submission
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() === TRUE) {
                // Form validation successful, proceed with login
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $user = $this->User_model->login($username, $password);

                if ($user) {
                    $this->session->set_userdata('user_id', $user->id);
                    redirect('todo');
                } else {
                    $data['error'] = 'Invalid username or password';
                }
            }
        }
        // Display login form
        $this->load->view('login', $data);
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('auth');
    }
}
?>
