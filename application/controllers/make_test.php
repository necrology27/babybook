<?php
class make_test extends MY_Controller {
    
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
    
    public function index()
    {
        
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['name'];
            $data['id'] = $session_data['id'];
            $age=12;
            $skills = $this->user_model->get_skills_by_age($age);
            $data['skills'] = $skills;
         
            $this->load->view('test_view', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
}