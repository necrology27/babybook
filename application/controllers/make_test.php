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
        
        $data['id'] = $session_data['id'];
        # echo $_SESSION["child_id"]; die();
       
        #$child_id= $_SESSION["child_id"];
        #die($child_id);
        #if($this->user_model->child_has_answer( $_SESSION[$child_id] )==FALSE)
            $skills = $this->user_model->get_skills_by_age($_SESSION["child_age_in_month"]);
        #    else
         #   {
         #       echo "valami mas"; #!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
          #      die();
          #  }
        
       # $next_skills = $this->user_model->get_previous_skills(120, 3);
       # print_r($next_skills); die();
        
        
        $data['skills'] = $skills;
        $this->load->view('test_view', $data);
       
       
        #$fail_skills = $this->user_model->get_fail_answer($data['id']);
        #print_r($fail_skills);
            
    }
}