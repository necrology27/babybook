<?php
class send_answer extends MY_Controller {
    
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
        $session_data = $this->session->userdata('logged_in');
        $userId = $session_data['id'];
        $skill_id = $_REQUEST['id'];
        $skill_group_id = $_REQUEST['skill_group_id'];
        $learned = $_REQUEST['value'];
        $child_id = $_REQUEST['child_id'];
        $age=$_SESSION['child_age_in_month'];
    
        $data = array(
            'child_id' =>$child_id,
            'skill_id' => $skill_id,
            'skill_group_id' => $skill_group_id,
            'age' => $age,
            'learned' => $learned,
            'user_id' => $userId
        );
        
        $result = $this->user_model->insert_answer($data);
        echo "ok";
    }
}