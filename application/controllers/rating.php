<?php
class rating extends MY_Controller {
    
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
        $this->load->model('answer_model');
        $this->load->model('discussions_model');
    }
    public function index()
    {
        $userId = getCurrentUserID();
        
        if($_POST['ds_id']){
            //calculates the numbers of like or dislike
            if($_POST['type'] == 1){
                $like = ($_POST['value'] + 1);
                $this->discussions_model->add_like($_POST['ds_id'], $like);
                
            }else{
                $dislike = ($_POST['value'] + 1);
                $ret=$this->discussions_model->add_dislike($_POST['ds_id'], $dislike);
            }
        }
        echo "ok";
    }
}