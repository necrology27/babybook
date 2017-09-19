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
        $this->load->model('discussions_model');
    }
    public function index()
    {
        if($_POST['ds_id']){
            //calculates the numbers of like or dislike
            if($_POST['type'] == 1){
                $like = ($_POST['like_value'] + 1);
                $dislike = $_POST['dislike_value'];
                $this->discussions_model->add_like($_POST['ds_id'], $like, $dislike);
                
            }else{
                $dislike = ($_POST['dislike_value'] + 1);
                $like = $_POST['like_value'];
                $ret=$this->discussions_model->add_dislike($_POST['ds_id'], $like, $dislike);
            }
        }
        echo "ok";
    }
}