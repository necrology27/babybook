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
        $this->load->model('answer_model');
        $this->load->model('child_model');
    }
    
    public function index()
    {

        
        $userId = getCurrentUserID();
        
        $skill_id =  $this->input->post('id');
        $skill_group_id =  $this->input->post('skill_group_id');
        $learned =  $this->input->post('value');
        $child_id =  $this->input->post('child_id');
        $age=4;
        $data = array(
            'child_id' =>$child_id,
            'skill_id' => $skill_id,
            'skill_group_id' => $skill_group_id,
            'age' => $this->get_child_age($this->child_model->get_child_birthday($child_id)['birthday']),
            'learned' => $learned,
            'user_id' => $userId
        );
        $result = $this->answer_model->insert_answer($data);
        echo "ok";
    }
    
    public function get_child_age($birthday)
    {
        $today = new DateTime();
        $today->format('Y-m-d');
        $diff = date_diff(new DateTime($birthday), $today);
        
        $age_in_month=($diff->y*12)+$diff->m+($diff->d/30);
        return $age_in_month;
    }
}