<?php

class Upload_Controller extends MY_Controller {

    public function __construct() {
       
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array(
            'session',
            'form_validation',
            'email'
        ));
        $this->load->database();
        $this->load->model('user_model');
    }
    
    public function add_child(){
        
        $session_data = $this->session->userdata('logged_in');
        $userId = $session_data['id'];
       
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|callback_exists[children.name.'.$session_data['id'].']|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        
        
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            $measurement = $this->user_model->get_user_data($userId)['measurement'];
            $data = array(
                'measurement' => $measurement,
                'error' => ' '
            );
            $this->load->view('add_child', $data);
        } else {
            
            if($this->input->post('is_parent') == NULL)
                $is_par=0;
            else
                $is_par=1;
                
                // insert the user registration details into database
            $data = array(
                'name' => $this->input->post('name'),
                'birthday' => $this->input->post('birthday'),
                'gender' => $this->input->post('gender'),
                'birth_weight' => $this->input->post('birth_weight'),
                'birth_length' => $this->input->post('birth_length'),
                'apgar_score' => $this->input->post('apgar_score'),
                'genetical_disorders' => $this->input->post('genetical_disorders'),
                'other_disorders' => $this->input->post('other_disorders'),
                //                 image
                
                'is_parent' =>  $is_par,
                'other_disorders' => $this->input->post('other_disorders'),
                'userId' => $userId,
               
                
            );
           
            
            // insert form data into database
            if ($childID=$this->user_model->insertChild($data)) {
                
                // successfully sent mail
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You are Successfully ADD A CHILD!</div>');
                
                
                $this->do_upload($data["userId"], $childID);
                redirect('upload_controller/add_child');
                
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t ADD CHILD.  Please try again later!!!</div>');
                redirect('upload_controller/add_child');
            }
        }
    }
        
    public function do_upload($userId, $childId){
        
        
        if (!file_exists(FCPATH . 'uploads/'.$userId. '/'.$childId)) {
            mkdir(FCPATH . 'uploads/'.$userId. '/'.$childId, 0777, true);
        }
        
        $config['upload_path'] = FCPATH . 'uploads/'.$userId. '/'.$childId;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '8192000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
       
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload())
        {
            echo 'kesz';
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
        }
        else
        {
            echo  $this->upload->display_errors();
            $data = array(
                
                'error' => $this->upload->display_errors()
            );
            
            $this->load->view('add_child', $data);
        }
    }
}
?>