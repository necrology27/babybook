<?php
class Home extends CI_Controller {
    
    public function index()
    {
        $data['user'] = "asdasd"; //ucfirst($page); // Capitalize the first letter
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function view($page = 'home')
    {
        
    }
}