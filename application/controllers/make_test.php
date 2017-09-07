<?php
class make_test extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('child_model');
        $this->load->model('skill_model');
        $this->load->model('answer_model');
    }
    public function index()
    {
        $scripts = array(
            'test.js'
        );
        $datas['scripts'] = $scripts;
    }
    
    public function set_text_items($child_id = NULL)
    {
        $skills= array();
        $session_data = $this->session->userdata('logged_in');
        $this->data['id'] = $session_data['id'];
        $this->data['title'] = $this->lang->line('take_test_title');
        
        if($this->child_model->is_parent_child_relation($child_id,  $this->data['id'])==false)
        {
            header("Location: http://localhost/babybook_git/index.php/home");
        }

        $this->data['child_id'] = $child_id;
        $child_age = $this->child_model->get_child_age_by_id($child_id);
       
        $ans= $this->answer_model->child_answers( $child_id );
       
       
        $lang_id=$this->user_model->get_user_lang($session_data['id']);
        
        if($ans===false)
        {
            $skills = $this->skill_model->get_skills_by_age($child_age, $lang_id);
            
        }
        
        else
           {
               $fail_skills_id = $this->answer_model->get_fail_skill_id($child_id);
               $j=0;
               if ($fail_skills_id != NULL)
               {
                   foreach ($fail_skills_id as $one_fail)
                   {
                       $skills_ker[$j]= $one_fail['skill_id'];
                       $j++;
                   }
                  
                   $skills = $this->skill_model->get_skills_name_and_language_by_id_and_lang($skills_ker, $lang_id);
               }
               else
               {
                   $skills = $skills + array();
                }
                
               $nr_of_fail_ans = $this->answer_model->get_nr_fail_answer($child_id);
                   
               $last_check = $this->answer_model->last_checked_skill($child_id);
               
               for($i=0; $i<4; $i++)
               {
                   
                   if ($nr_of_fail_ans[$i]<3 && $last_check[$i]!=null)
                   {
                       $skills = array_merge($skills, $this->skill_model->get_next_skills($last_check[$i], $i+1, $lang_id));
                       
                       
                   }
               }
           }
           $datas['skills'] = $skills;
           $user_data = $this->user_model->get_user_data($session_data['id']);
           $userId = $user_data['id'];
           $datas['user_name'] = $user_data['name'];
           $datas['title'] = "Test";
           $datas['child_id']= $child_id;
           $datas['child_age']= $child_age;
           
           $this->data = $this->data + $datas;
           
          
           $this->load->view('templates/header.php', $this->data);
           $this->load->view('test_view', $this->data);
           $this->load->view('templates/footer.php', $this->data);
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