<?php

class user extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    function index()
    {
        $this->register();
    }
    
    private function generatePassword($length){
        return substr(str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789') , 0 , $length);
    }
    
    public function forgot() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('register/user_forgot_view', $this->data);
        } else {
            $data = $this->input->post('email');
            
            $pwd = $this->generatePassword(8);
            
            if ($this->sendMail($data, $pwd)) {
                
                $this->user_model->changePassword($data, $pwd);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">'.$this->lang->line('mail_sent').'</div>');
                redirect('user/forgot');
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">'.$this->lang->line('mail_sent_error').'</div>');
                redirect('user/forgot');
            }
        }
    }
    
    public function sendMail($target, $pwd) {
        
        $this->email->from('babybook.contact@gmail.com', 'babybook Support');
        //$this->email->to($receiver_email);
        $this->email->to($target);
        $this->email->subject('babybook | Password reset');
        $this->email->message($this->lang->line('email_new_generated_password') . $pwd . $this->lang->line('email_new_generated_password2'));
        return $this->email->send(); 
    }
    
    function register()
    {
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|callback_edit_unique[users.name.0.]|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|sha1');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|sha1');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register/user_registration_view', $this->data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'birthday' => $this->input->post('birthday'),
                'gender' => $this->input->post('gender'),
                'role' => $this->input->post('role'),
                'language' => $this->input->post('language'),
                'measurement' => $this->input->post('measurement')
            );
            
            if ($id = $this->user_model->insertUser($data)) {
                
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">'.$this->lang->line('registration_succuss').'</div>');
                redirect('user/register', $data);
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">'.$this->lang->line('registration_error').'</div>');
                redirect('user/register');
            }
        }
    }
}