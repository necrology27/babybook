<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
       
    }

    function index()
    {
        if(getCurrentLoggedInUser() != NULL)
            redirect(base_url('home'));
        
        $this->data['title'] = $this->lang->line('login_title');
        $this->data['scripts'][] = 'facebook.js';
        $this->load->view('login_view', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

    function verify_login()
    {
        
        // This method will have the credentials validation
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database|sha1');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('home', 'refresh');
        }
    }
    
    function login_with_facebook()
    {
        $user_name =  $this->input->post('name');
        $user_face_id=  $this->input->post('id');
        
        $data = array(
            'facebook_id' => $user_face_id,
            'name' =>  $user_name
        );
        
        $user_id = $this->user_model->insert_user_by_facebook_id($data);
        
        $sess_array = array(
            'name' => $user_name,
            'id' => $user_id,
            'user_language_id' => 1
        );

        setCurrentUserData($sess_array);
        
        echo "ok";
    }
    
    function logout()
    {
        removeCurrentUserData();
        session_destroy();
        redirect(base_url());
    }
    

    function check_database($password)
    {
        $email = $this->input->post('email');
        
        $result = $this->user_model->login($email, $password);
        
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'name' => $row->name,
                    'id' => $row->id,
                    'user_language_id' => $row->language
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