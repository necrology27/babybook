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
        $data = $this->load_lang($userId);
        
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|callback_exists[children.name.'.$session_data['id'].']|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            $measurement = $this->user_model->get_user_data($userId)['measurement'];
            $datas = array(
                'measurement' => $measurement,
                'error' => ' '
            );
            
            $data = $datas + $this->load_lang($userId);
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
            
            $this->save_child_age($data['birthday']);

            // insert form data into database
            if ($childID=$this->user_model->insertChild($data)) {
                
                // successfully sent mail
                $_SESSION["child_id"] = $childID;
               
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Success!</div>');
                
                $err = $this->do_upload($data["userId"], $childID);
                if ($err !== true) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">' . $err . '!!!</div>');
                    redirect('upload_controller/add_child');
                }
                $this->session->set_flashdata('child_id', $childID);
                redirect('make_test', $data);
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t ADD CHILD.  Please try again later!!!</div>');
                redirect('upload_controller/add_child');
            }
        }
    }
    
    public function save_child_age($birthday){
        $today = new DateTime();
        $today->format('Y-m-d');
        $diff = date_diff(new DateTime($birthday), $today);
        
        $age_in_month=($diff->y*12)+$diff->m+($diff->d/30);
        $_SESSION["child_age_in_month"] = $age_in_month; 
    }
        
    public function do_upload($userId, $childId){
        
        $upload_date=time();
        if (!file_exists(FCPATH . 'uploads/'.$userId. '/'.$childId)) {
            mkdir(FCPATH . 'uploads/'.$userId. '/'.$childId, 0777, true);
        }
        
        $config['upload_path'] = FCPATH . 'uploads/'.$userId. '/'.$childId;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = 'img_'.$upload_date;
        $config['file_ext_tolower'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['max_size'] = '8192000';
        $config['max_width'] = '2048';
        $config['max_height'] = '2048';
       
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload())
        {
            $data = array('upload_data' => $this->upload->data());
            
            $upload_data = $data['upload_data'];
            $file_name =   $upload_data['file_name'];
            $data = array(
                 'child_id' => $childId,
                 'file_name' =>  $file_name,
                 'title' => 'Default image',
             );
             if ($imageId=$this->user_model->insertImage($data)) {
                 $this->user_model->changeDefaultImage($childId, $imageId);
             } else {
                 // error
                 $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t ADD IMAGE.  Please try again later!!!</div>');
                 redirect('upload_controller/add_child');
             }
            $this->load->view('add_child',$data);
            return true;
        }
        else
        {
            return $this->upload->display_errors();
            $data = array(
                
                'error' => $this->upload->display_errors()
            );
            $this->load->view('add_child', $data);
        }
    }
}
?>