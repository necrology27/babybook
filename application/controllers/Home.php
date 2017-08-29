<?php

class Home extends MY_Controller
{

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
        $this->load->model('image_model');
        $this->load->model('child_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            
            $data = $this->load_lang($id);
            
            $data['name'] = $session_data['name'];
            $data['user_name'] = $session_data['name'];
            $data['id'] = $session_data['id'];
            $data['title'] = $this->lang->line('home_title');
            
            $data['children'] = $this->user_model->get_users_children($data['id']);
            if( $data['children']!=false)
                $data['child_count'] = count($data['children']);
            else
                $data['child_count'] = 0;
            for ($i = 0; $i < $data['child_count']; $i++) 
                $data['def_imgs'][$i] = $this->image_model->get_def_img($data['children'][$i]['child_id']);
           
            $this->load->view('templates/header', $data);
            $this->load->view('home/index.php', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    
    
    function update()
    {
        $session_data = $this->session->userdata('logged_in');
        $id = $session_data['id'];
        
        $data = $this->load_lang($id);
        $data['title'] = $this->lang->line('update_title');
        
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|sha1');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[newpassword]|sha1');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_edit_unique[users.email.' . $session_data['id'] . ']');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        $this->form_validation->set_rules('language', 'Language', 'required');
        $this->form_validation->set_rules('measurement', 'Measurement', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|sha1');
        
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            if ($this->session->userdata('logged_in')) {
                $user_data = $this->user_model->get_user_data($session_data['id']);
                $data['id'] = $session_data['id'];
                $data['name'] = $user_data['name'];
                $data['user_name'] = $user_data['name'];
                $data['email'] = $user_data['email'];
                $data['birthday'] = $user_data['birthday'];
                $data['measurement'] = $user_data['measurement'];
                $data['language'] = $user_data['language'];
                $data['gender'] = $user_data['gender'];
                
                $this->load->view('templates/header', $data);
                $this->load->view('home/edit_self', $data);
                $this->load->view('templates/footer', $data);
            }
        } else {
            // insert the user registration details into database
            if ($this->input->post('newpassword') !== '') {
                $pw = $this->input->post('newpassword');
            } else {
                $pw = $this->input->post('password');
            }
            $data = array(
                'id' => $session_data['id'],
                'name' => $this->input->post('name'),
                'password' => $pw,
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('email'),
                'birthday' => $this->input->post('birthday'),
                'role' => 2,
                'language' => $this->input->post('language'),
                'measurement' => $this->input->post('measurement')
            );
            
            // insert form data into database
            if ($this->user_model->updateUser($data)) {
                
                // successfully sent mail
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Profile updated!</div>');
                redirect('home/update', $lang);
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t update profile.  Please try again later!!!</div>');
                redirect('home/update', $lang);
            }
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

    public function view($page = 'home')
    {}
}