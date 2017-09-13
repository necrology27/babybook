<?php

class Child extends MY_Controller {

    public function __construct() {
       
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('user_model');
        $this->load->model('image_model');
        $this->load->model('child_model');
        $this->load->model('answer_model');
    }
    
    public function add_child($get_child_id = 0){
        
        $session_data = $this->session->userdata('logged_in');
        if($get_child_id != 0)
        {
            ##!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!Szulo-e?????
           
            if($this->child_model->is_parent_child_relation($get_child_id,  getCurrentUserID())==false)
            {
                header("Location: http://localhost/babybook_git/index.php/home");
            }
        }
        
        ls_init_language();
        $this->data['title'] = $this->lang->line('add_child');
        $this->data['id'] = getCurrentUserID();
        
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|callback_edit_unique[children.name.'.$session_data['id'].'.'.$get_child_id.']|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        // validate form input
        
        if ($this->form_validation->run() == FALSE) {
            $measurement = $this->user_model->get_user_data(getCurrentUserID())['measurement'];
            
            $user_data = getCurrentLoggedInUser();
            $datas = array(
                'measurement' => $measurement,
                'error' => ' ',
                'user_name' => $user_data['name']
            );
            $this->data = $this->data + $datas;
            
            if($get_child_id == 0)
            {
                $this->data['child_id'] = "0";
                $this->data['name']= "";
                $this->data['birthday']= "";
                $this->data['genetical_disorders']= "";
                $this->data['other_disorders']= "";
            }
            else{
                $child_data = $this->child_model->get_child_data($get_child_id);
                $this->data = $this->data + array(
                    'child_id' => $get_child_id,
                    'name' => $child_data['name'],
                    'birthday' => $child_data['birthday'],
                    'genetical_disorders' => $child_data['genetical_disorders'],
                    'other_disorders' => $child_data['other_disorders'],
                    'error' => ''
                );
            }
            $this->data['user_id']= getCurrentUserID();
            $this->load->view('templates/header.php', $this->data);
            $this->load->view('save_child', $this->data);
            $this->load->view('templates/footer.php', $this->data);
        } 
        else {
            
            if( $get_child_id==0 )
            {
                if($this->input->post('is_parent') == NULL)
                    $is_par=0;
                else
                    $is_par=1;
               $new_child_data = array(
                   'gender' => $this->input->post('gender'),
                   'birth_weight' => $this->input->post('birth_weight'),
                   'birth_length' => $this->input->post('birth_length'),
                   'apgar_score' => $this->input->post('apgar_score'),
                   'is_parent' =>  $is_par
                   );
            }
            else{
                $new_child_data['child_id'] = $get_child_id;
            }
            
                // insert the user registration details into database
            $new_child_data = $new_child_data + array(
                'name' => $this->input->post('name'),
                'birthday' => $this->input->post('birthday'),
                
                'genetical_disorders' => $this->input->post('genetical_disorders'),
                'other_disorders' => $this->input->post('other_disorders'),
                'user_id' => getCurrentUserID()                
            );
            $this->data = $this->data + $new_child_data;
            if($get_child_id==0)
            {
                // insert form data into database
                if ($childID=$this->child_model->insertChild($new_child_data)) {
                    
                    $this->data['child_id'] = $childID;
                    // successfully sent mail
                   
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">' . $this->lang->line('success_message') . '</div>');
                    $err = $this->do_upload($this->data["user_id"], $childID, "Default image");
                    
                    if ($err !== true) {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">' . $err . '!!!</div>');
                        redirect('child/add_child');
                    }
                    
                    redirect('make_test/set_text_items/'. $childID);
                } else {
                    // error
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">' . $this->lang->line('add_child_error'). '</div>');
                    redirect('child/add_child');
                }
               
            }
            else
            {
                if ($this->child_model->update_child_by_id($get_child_id, $new_child_data))
                {
                   
                    if ($_FILES['userfile']['size'] != 0) {
                        
                        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">' . $this->lang->line('success_message') . '</div>');
                        
                        $err = $this->do_upload($session_data['id'], $get_child_id, "Default image");
                        
                        if ($err !== true)
                        {
                            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">' . $err . '!!!</div>');
                            redirect('child/add_child');
                        }
                    }
                    
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">' . $this->lang->line('child_profile_success') . '</div>');
                    redirect('child/add_child/'. $get_child_id, $lang);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">' . $this->lang->line('child_profile_error') . '</div>');
                    redirect('child/add_child'. $get_child_id, $lang);
                }
                
            }
           
        }
    }
    
    public function do_upload($user_id, $childId, $title){
        
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
                  'title' => $title,
             );
            $this->data = $this->data + $data;
            $imageId=$this->image_model->insertImage($data);
                 
            
            $this->image_model->changeDefaultImage($childId, $imageId);
            $this->load->view('save_child', $this->data);
            return true;
        }
        else
        {
            return $this->upload->display_errors();
            $this->data = $this->data +  array(
                'error' => $this->upload->display_errors()
            );
            $this->load->view('add_child', $this->data);
        }
    }
    
    function album($child_id = NULL)
    {
        
        $scripts = array(
            'nanogallery/dist/jquery.nanogallery.min.js',
            'album.js'
        );
        $this->data['scripts'] = $scripts;
        
        $child_data = $this->child_model->get_child_data($child_id);
        $user_data = $this->user_model->get_user_data(getCurrentUserID());
        $this->data['user_name'] = $user_data['name'];
        $this->data['user_id'] = getCurrentUserID();
        $this->data['name'] = $child_data['name'];
        $this->data['birthday'] = $child_data['birthday'];
        $this->data['error'] = ' ';
        $this->data['child_id'] = $child_id;
        
        $this->data['imgs'] = $this->image_model->get_all_imgs($this->data['child_id']);
        if( $this->data['imgs']!=false)
            $this->data['img_count'] = count($this->data['imgs']);
        else
            $this->data['img_count'] = 0;
            
        ls_init_language();
        $this->data['title'] = $this->lang->line('album_title');
    
        $this->load->view('templates/header', $this->data);
        $this->load->view('album_view', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    
    function profil($child_id = NULL)
    {
        $session_data = $this->session->userdata('logged_in');
       
        
        if($this->child_model->is_parent_child_relation($child_id,  getCurrentUserID())==false)
        {
            header("Location: http://localhost/babybook_git/index.php/home");
        }
        
        $child_data = $this->child_model->get_child_data($child_id);
        $user_data = $this->user_model->get_user_data($session_data['id']);
        $this->data['user_name'] = $user_data['name'];
        $this->data['user_id'] = $session_data['id'];
        $this->data['name'] = $child_data['name'];
        $this->data['birthday'] = $child_data['birthday'];
        $this->data['error'] = ' ';
        $this->data['child_id'] = $child_id;
        
        ls_init_language();
        $this->data['title'] = $this->lang->line('profil_title');
        
        $scores = $this->answer_model->get_score($child_id);
        $min_score=-10;
        $max_score=10;
        
        $total=$max_score-$min_score;
        
        $this->data['min_score']=0;
        $this->data['max_score']=$total;
        
        if($scores["personal_social"]!=NULL)
            $this->data['personal_social_value_pct']=100*($scores["personal_social"]-$min_score)/$total;
        else
            $this->data['personal_social_value_pct']=NULL;
        
        if($scores["fine_motor"]!=NULL)
            $this->data['fine_motor_value_pct']=100*($scores["fine_motor"]-$min_score)/$total;
        else
            $this->data['fine_motor_value_pct']=NULL;
        
        if($scores["language"]!=NULL)
            $this->data['language_value_pct']=100*($scores["language"]-$min_score)/$total;
        else
            $this->data['language_value_pct']=NULL;
        
        if($scores["gross_motor"]!=NULL)
            $this->data['gross_motor_value_pct']=100*($scores["gross_motor"]-$min_score)/$total;
        else 
            $this->data['gross_motor_value_pct']=NULL;

        $this->load->view('templates/header', $this->data);
        $this->load->view('child_profil', $this->data);
        $this->load->view('templates/footer', $this->data);
        
    }
}
?>