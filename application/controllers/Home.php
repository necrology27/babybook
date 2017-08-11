<?php
class Home extends CI_Controller {
    
    public function index()
    {
        
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['name'];
           
            $this->load->view('templates/header', $data);
            $this->load->view('home/index.php', $data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
    
    public function view($page = 'home')
    {
        
    }
}