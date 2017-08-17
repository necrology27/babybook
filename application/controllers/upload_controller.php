<?php

class Upload_Controller extends CI_Controller {

    public function __construct() {
        echo "do_upload belep";
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
    }
    
    public function add_child(){
        $this->load->view('add_child', array('error' => ' ' ));
    }
    public function do_upload(){
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '8192000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
       
        $this->load->library('upload', $config);
        if($this->upload->do_upload())
        {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
        }
        else
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('add_child', $error);
        }
    }
}
?>