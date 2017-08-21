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
        #die($child_id);
        $session_data = $this->session->userdata('logged_in');
        $userId = $session_data['id'];
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|callback_exists[children.name.'.$session_data['id'].']|min_length[3]|max_length[30]|xss_clean');
        
        
        if($this->form_validation->run() == FALSE)
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['name'];
            $data['id'] = $session_data['id'];
            $age=12;
            $skills = $this->user_model->get_skills_by_age($age);
            $data['skills'] = $skills;
            $this->load->view('test_view', $data);

            
           # $array=json_decode($jsonString);
           # print_r($array);
           # die();
            $data = array(
                'child_id' =>$this->session->flashdata('child_id'),
               # 'skillId' => $this->input->post(),
               # 'age' => $this->input->post('gender'),
                #'learned' => $this->input->post(''),
                'user_id' => $userId
  
            );
            
            
            if ($this->user_model->insertAnswer($data)) {
                
                // successfully sent mail
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Success!</div>');
               # redirect('make_test');
                
            } else {
                // error
    
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. itt a gond  Please try again later!!!</div>');
              #  redirect('make_test');
            }
        }
            
    }
}