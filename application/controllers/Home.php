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
    }

    function load_lang($id)
    {
        
        $language = $this->user_model->get_user_data($id)['language'];
        
        // Choose language file according to selected lanaguage
        if ($language == 2)
            $this->lang->load('hungarian_lang', 'hungarian');
        else if ($language == 3)
            $this->lang->load('romanian_lang', 'romanian');
        else
            $this->lang->load('english_lang', 'english');
        
        $data['lang'] = $language;
        $data['msg'] = $this->lang->line('msg');
        $data['home_title'] = $this->lang->line('home_title');
        $data['password'] = $this->lang->line('password');
        $data['add_child'] = $this->lang->line('add_child');
        $data['edit_profile'] = $this->lang->line('edit_profile');
        $data['logout'] = $this->lang->line('logout');
        $data['my_children'] = $this->lang->line('my_children');
        $data['forum'] = $this->lang->line('forum');
        $data['settings'] = $this->lang->line('settings');
        
        $data['update_title'] = $this->lang->line('update_title');
        $data['back_to_home'] = $this->lang->line('back_to_home');
        $data['name_label'] = $this->lang->line('name_label');
        $data['new_password_label'] = $this->lang->line('new_password_label');
        $data['confirm_password_label'] = $this->lang->line('confirm_password_label');
        $data['gender_label'] = $this->lang->line('gender_label');
        $data['male'] = $this->lang->line('male');
        $data['female'] = $this->lang->line('female');
        $data['email_label'] = $this->lang->line('email_label');
        $data['birthday_label'] = $this->lang->line('birthday_label');
        $data['language_label'] = $this->lang->line('language_label');
        $data['measurement_label'] = $this->lang->line('measurement_label');
        $data['old_password_label'] = $this->lang->line('old_password_label');
        $data['save_button'] = $this->lang->line('save_button');
        $data['cancel_button'] = $this->lang->line('cancel_button');
        $data['logged_in_as'] = $this->lang->line('logged_in_as');
        
        return $data;
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];
            
            $data = $this->load_lang($id);
            
            $data['name'] = $session_data['name'];
            $data['id'] = $session_data['id'];
            
            $data['children'] = $this->user_model->get_children($data['id']);
            $data['child_count'] = count($data['children']);
            
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