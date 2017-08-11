<?php

class user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library(array(
            'session',
            'form_validation',
            'email'
        ));
        $this->load->database();
        $this->load->model('user_model');
    }

    function index()
    {
        $this->register();
    }

    function register()
    {
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|sha1');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|sha1');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
        
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            // fails
            $this->load->view('register/user_registration_view');
        } else {
            // insert the user registration details into database
            $data = array(
                'name' => $this->input->post('name'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'birthday' => $this->input->post('birthday'),
                'role' => 2,
                'language' => 1,
                'measurement' => 1
            );
            
            // insert form data into database
            if ($this->user_model->insertUser($data)) {
                
                // successfully sent mail
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You are Successfully Registered!</div>');
                redirect('user/register');
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t insert data.  Please try again later!!!</div>');
                redirect('user/register');
            }
        }
    }

    function verify($hash = NULL)
    {
        if ($this->user_model->verifyEmailID($hash)) {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('user/register');
        } else {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('user/register');
        }
    }
}