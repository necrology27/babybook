<?php
class Home extends CI_Controller {
    
    public function index()
    {
        
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['name'];
            $data['id'] = $session_data['id'];
           
            $this->load->view('templates/header', $data);
            $this->load->view('home/index.php', $data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    
    function update()
    {
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|sha1');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[newpassword]|sha1');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        $this->form_validation->set_rules('measurement', 'Measurement', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|sha1');
        
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            // fails
            $this->load->view('home/edit_self');
        } else {
            // insert the user registration details into database
            $data = array(
                'name' => $this->input->post('name'),
                'password' => $this->input->post('newpassword'),
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('email'),
                'birthday' => $this->input->post('birthday'),
                'role' => 2,
                'language' => 1,
                'measurement' => $this->input->post('measurement')
            );
            
            // insert form data into database
            if ($this->user_model->updateUser($data)) {
                
                // successfully sent mail
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You are Successfully Registered!</div>');
                redirect('user/register');
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t insert data.  Please try again later!!!</div>');
                redirect('user/register');
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
    {
        
    }
}