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
    
    public function set_text_items($child_id = NULL)
    {
       
        if ( isset($_GET['child_id']) )
            $child_id = $_GET['child_id'];
        
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['id'];
        $data['child_id'] = $child_id;
        # echo $_SESSION["child_id"]; die();
      
        $child_age = $this->get_child_age($this->user_model->get_child_birthday($child_id)['birthday']);
       #elso kitoltes???
        $ans= $this->user_model->child_has_answer( $child_id );
       
        if($ans===0)
        {
            $skills = $this->user_model->get_skills_by_age($child_age);
        }
        else
           {
           #elozoleg "fail" valaszok ujrakerdezese
                    #álcázott join
                    #kiveszem az answers tablabol a "fail" valaszu skill_id-ket, rendes tombbe teszem és megkeresem ezeket a skills táblában
               $skills_id = $this->user_model->get_fail_skill_id($child_id);
               $j=0;
               if ($skills_id != NULL)
               {
                   foreach ($skills_id as $i)
                   {
                       $skills_ker[$j]= $i['skill_id'];
                       $j++;
                   }
                   $skills = $this->user_model->get_fail_skill($skills_ker);
               }
               else
                    $skills = null;
               
           #by skill_group how many fail answer has
               $nr_of_fail_ans = $this->user_model->get_nr_fail_answer($child_id);
                   
                   #by skill_group last checked skill id
               $last_check = $this->user_model->last_checked_skill($child_id);
                   
               for($i=0; $i<4; $i++)
               {
                       #ha nincs beallitva, azaz a "Fail" válaszok száma 0 vagy kevesebb mint 3, akkor veszi a kovetkezo 4 kérdést
                   if (!isset($nr_of_fail_ans[$i]) || $nr_of_fail_ans[$i]['fail_num']<3)
                   $skills = array_merge($skills, $this->user_model->get_next_skills($last_check[$i]['max_skill_id'], $i+1));
               }
           }
           
           
        
           $datas['skills'] = $skills;
           $user_data = $this->user_model->get_user_data($session_data['id']);
           $userId = $user_data['id'];
           $datas['name'] = $user_data['name'];
           $datas['title'] = "Test";
           $datas['child_id']= $child_id;
           $datas['child_age']= $child_age;
           
           $data = $datas + $this->load_lang($userId);
           
          
           $this->load->view('templates/header.php', $data);
           $this->load->view('test_view', $data);
           $this->load->view('templates/footer.php', $data);
       
       
        #$fail_skills = $this->user_model->get_nr_fail_answer($data['id']);
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