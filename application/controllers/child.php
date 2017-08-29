<?php

class Child extends MY_Controller {

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
        $this->load->model('image_model');
        $this->load->model('child_model');
    }
    
    public function add_child(){
        
        $session_data = $this->session->userdata('logged_in');
        $user_id = $session_data['id'];
        $data = $this->load_lang($user_id);
        
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|callback_exists[children.name.'.$session_data['id'].']|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            $measurement = $this->user_model->get_user_data($user_id)['measurement'];
            
           
            $datas = array(
                'measurement' => $measurement,
                'error' => ' '
            );
            $user_data = $this->user_model->get_user_data($session_data['id']);
            $datas['name'] = $user_data['name'];
            
            $data = $datas + $this->load_lang($user_id);
            $data['user_name'] = $this->user_model->get_user_data($user_id)['name'];
            $this->load->view('templates/header.php', $data);
            $this->load->view('add_child', $data);
            $this->load->view('templates/footer.php', $data);
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
                'user_id' => $user_id,                
            );
            
           

            // insert form data into database
            if ($childID=$this->child_model->insertChild($data)) {
                
                $data['child_id'] = $childID;
                // successfully sent mail
               
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Success!</div>');
                
                $err = $this->do_upload($data["user_id"], $childID);
                if ($err !== true) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">' . $err . '!!!</div>');
                    redirect('child/add_child');
                }
                
                redirect('make_test/set_text_items/'. $childID);
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t ADD CHILD.  Please try again later!!!</div>');
                redirect('child/add_child');
            }
        }
    }
    
    
    
    function update_child($child_id = NULL)
    {
        
        
        
        $session_data = $this->session->userdata('logged_in');
        $id = $session_data['id'];
        
        $data = $this->load_lang($id);
        $data['title'] = $this->lang->line('child_update_title');
        $data['id']=$session_data['id'];
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            if ($this->session->userdata('logged_in')) {
                $child_data = $this->child_model->get_child_data($child_id);
                $user_data = $this->user_model->get_user_data($session_data['id']);
                $data['user_name'] = $user_data['name'];
                $data['user_id'] = $session_data['id'];
                $data['name'] = $child_data['name'];
                $data['birthday'] = $child_data['birthday'];
                $data['error'] = ' ';
                $data['child_id'] = $child_id;
                
                $this->load->view('templates/header', $data);
                $this->load->view('edit_child', $data);
                $this->load->view('templates/footer', $data);
            }
        } else {
              $data = array(
                    'name' => $this->input->post('name'),
                    'birthday' => $this->input->post('birthday'),
                    'child_id' =>  $child_id,        
                    'genetical_disorders' => $this->input->post('genetical_disorders'),
                    'other_disorders' => $this->input->post('other_disorders'), 
               );
            
               // insert form data into database
        
              if ($this->child_model->update_child_by_id($child_id, $data))
              {
           
                           if ($this->input->post('userfile') != null) {
                          
                                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Success!</div>');
                                
                                    $err = $this->do_upload($session_data['id'], $child_id);
                                    if ($err !== true) {
                                        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">' . $err . '!!!</div>');
                                        redirect('child/add_child');
                   
                                    }
                           }
                
                
                
                
                
                // successfully sent mail
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your child\'s profile updated!</div>');
                redirect('child/update_child/'.$child_id, $lang);
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t update your child\'s profile.  Please try again later!!!</div>');
                redirect('child/update_child'.$child_id, $lang);
            }
        }
    }
        
    public function do_upload($user_id, $childId){
        
        $upload_date=time();
        if (!file_exists(FCPATH . 'uploads/'.$user_id. '/'.$childId)) {
            mkdir(FCPATH . 'uploads/'.$user_id. '/'.$childId, 0777, true);
        }
        
        $config['upload_path'] = FCPATH . 'uploads/'.$user_id. '/'.$childId;
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
            
            $config['image_library'] = 'gd2';
            $config['source_image'] = $upload_data['full_path'];
            $config['maintain_ratio'] = TRUE;
            $config['width']    = 250;
            $config['height']   = 250;
            
            $this->load->library('image_lib', $config);
            
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();
            
            $upload_data = $data['upload_data'];
            $file_name =   $upload_data['file_name'];
            $data = array(
                 'child_id' => $childId,
                 'file_name' =>  $file_name,
                 'title' => 'Default image',
             );
             if ($imageId=$this->image_model->insertImage($data)) {
                 $this->image_model->changeDefaultImage($childId, $imageId);
             } else {
                 // error
                 $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t ADD IMAGE.  Please try again later!!!</div>');
                 redirect('child/add_child');
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