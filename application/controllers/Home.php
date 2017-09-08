<?php

class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
       
        $this->load->model('user_model');
        $this->load->model('image_model');
        $this->load->model('child_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            
            ls_init_language();
            $this->data['title'] = $this->lang->line('home_title');
            
            $this->data['children'] = $this->user_model->get_users_children(getCurrentUserID());
            if( $this->data['children']!=false)
                $this->data['child_count'] = count($this->data['children']);
            else
                $this->data['child_count'] = 0;
            for ($i = 0; $i < $this->data['child_count']; $i++) 
            {
                $this->data['def_imgs'][$i] = $this->image_model->get_def_img($this->data['children'][$i]['child_id']);
                $this->data['last_up'][$i] = $this->child_model->get_last_update($this->data['children'][$i]['child_id']);
            }
           
                
            $this->load->view('templates/header', $this->data);
            $this->load->view('home/index.php', $this->data);
            $this->load->view('templates/footer', $this->data);
        } else {
            die("nincs session");
            // If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    
    function update()
    {
        $session_data = $this->session->userdata('logged_in');
        $id = getCurrentUserID();
        
        ls_init_language();
        $this->data['title'] = $this->lang->line('update_title');
        
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|sha1');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[newpassword]|sha1');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_edit_unique[users.email.' . $id . ']');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        $this->form_validation->set_rules('language', 'Language', 'required');
        $this->form_validation->set_rules('measurement', 'Measurement', 'required');
        
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            if ($this->session->userdata('logged_in')) {
                $user_data = $this->user_model->get_user_data($id);
                $this->data['id'] = $session_data['id'];
                $this->data['name'] = $user_data['name'];
                $this->data['user_name'] = $user_data['name'];
                $this->data['email'] = $user_data['email'];
                $this->data['birthday'] = $user_data['birthday'];
                $this->data['measurement'] = $user_data['measurement'];
                $this->data['language'] = $user_data['language'];
                $this->data['gender'] = $user_data['gender'];
                
                $this->load->view('templates/header', $this->data);
                $this->load->view('home/edit_self', $this->data);
                $this->load->view('templates/footer', $this->data);
            }
        } else {
            // insert the user registration details into database
            
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name'),
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('email'),
                'birthday' => $this->input->post('birthday'),
                'role' => 2,
                'language' => $this->input->post('language'),
                'measurement' => $this->input->post('measurement')
            );
            if ($this->input->post('newpassword') !== '') {
                $data['password'] = $this->input->post('newpassword');
            }
            if ($this->user_model->updateUser($data)) {
                
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Profile updated!</div>');
                $user_data = array(
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'user_language_id' => $data['language']
                );
                setCurrentUserData($user_data);
                ls_init_language();
                redirect('home/update', $lang);
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t update profile.  Please try again later!!!</div>');
                redirect('home/update', $lang);
            }
        }
    }

    public function view($page = 'home')
    {}
}