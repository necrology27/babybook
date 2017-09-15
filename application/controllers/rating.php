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
        $this->load->model('answer_model');
        $this->load->model('child_model');
    }
    public function index()
    {
        var_dump("itt van!!!!"); die();
        echo "ok";
    }
    
    public function make_rate()
    {
        var_dump("itt van!!!!"); die();
        $userId = getCurrentUserID();

         if($_POST['ds_id']){
            $prev_record = $this->discussions_model->get_rating($_POST['ds_id']);
            $prev_like = $prev_record['like_num'];
            $prev_dislike = $prev_record['dislike_num'];
            
            //calculates the numbers of like or dislike
            if($_POST['type'] == 1){
                $like = ($prev_like + 1);
                $this->discussions_model->add_like($_POST['ds_id'], $like);
            }else{
                $dislike = ($prev_dislike + 1);
                $this->discussions_model->add_dislike($_POST['ds_id'], $dislike);
            }
            echo "ok";
        }
    }
}