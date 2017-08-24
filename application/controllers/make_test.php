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
        
    }
    
    public function set_text_items($child_id)
    {
        #die($child_id);
        $session_data = $this->session->userdata('logged_in');
        
        $data['id'] = $session_data['id'];
        # echo $_SESSION["child_id"]; die();
       
       # echo ("beirt sorok".$this->user_model->child_has_answer(print($this->session->child_id)));
        $child_age = $this->get_child_age($this->user_model->get_child_birthday($child_id)['birthday']);
       
        echo "gyerek id:". $child_id."                                     meg megvan                    ";
        if($this->user_model->child_has_answer( print($this->session->child_id) )===0)
        {
            echo ("beirt sorok?".$this->user_model->child_has_answer($this->session->child_id));
            $skills = $this->user_model->get_skills_by_age($child_age);
        } else
           {
               echo ("beirt sorok".$this->user_model->child_has_answer($this->session->child_id));
               echo " valami mas"; #!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            #  die();
           }
        
       # $next_skills = $this->user_model->get_previous_skills(120, 3);
       # print_r($next_skills); die();
        
        
        $data['skills'] = $skills;
        $this->load->view('test_view', $data);
       
       
        #$fail_skills = $this->user_model->get_fail_answer($data['id']);
        #print_r($fail_skills);
            
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