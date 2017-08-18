<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data = $this->load_lang();
        
        $this->load->helper(array(
            'form'
        ));
        $this->load->view('login_view', $data);
    }

    function verify_login()
    {
        $data = $this->load_lang();
        
        // This method will have the credentials validation
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database|sha1');
        
        if ($this->form_validation->run() == FALSE) {
            // Field validation failed. User redirected to login page
            $this->load->view('login_view', $data);
        } else {
            // Go to private area
            redirect('home', 'refresh');
        }
    }

    function check_database($password)
    {
        $this->load->model('user', '', TRUE);
        // Field validation succeeded. Validate against database
        $email = $this->input->post('email');
        
        // query the database
        $result = $this->user->login($email, $password);
        
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'name' => $row->name,
                    'id' => $row->id
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
}