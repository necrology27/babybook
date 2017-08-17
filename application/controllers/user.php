<?php

class user extends CI_Controller
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

    function index()
    {
        $this->register();
    }
    
    function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
    }
    
    private function generatePassword($length){
        return substr(str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789') , 0 , $length);
    }
    
    public function forgot() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            // fails
            $this->load->view('register/user_forgot_view');
        } else {
            // insert the user registration details into database
            $data = $this->input->post('email');
            
            $pwd = $this->generatePassword(8);
            
            
            // insert form data into database
            if ($this->sendMail($data, $pwd)) {
                
                $this->user_model->changePassword($data, $pwd);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Mail sent, check your inbox!</div>');
                redirect('user/forgot');
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Can\'t send email.  Please try again later!!!</div>');
                redirect('user/forgot');
            }
        }
    }
    
    public function sendMail($target, $pwd) {
        $this->load->library('email');
        
        $this->email->from('babybook.contact@gmail.com', 'babybook Support');
        //$this->email->to($receiver_email);
        $this->email->to($target);
        $this->email->subject('babybook | Password reset');
        $this->email->message('Your new randomly generated password is: ' . $pwd . '. You may want to change this password as soon as possible.');
        return $this->email->send(); 
    }
    
    public function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }
    
    function register()
    {
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|sha1');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|sha1');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            // fails
            $this->load->view('register/user_registration_view');
        } else {
            // insert the user registration details into database
            $data = array(
                'name' => $this->input->post('name'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'birthday' => $this->input->post('birthday'),
                'role' => 2,
                'language' => 1,
                'measurement' => $this->input->post('measurement')
            );
            
            // insert form data into database
            if ($this->user_model->insertUser($data)) {
                
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
    function add_child()
    {
      
        $session_data = $this->session->userdata('logged_in');
        $userId = $session_data['id'];
        
        // set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required|callback_valid_date');
        
       
        
        // validate form input
        if ($this->form_validation->run() == FALSE) {
            $measurement = $this->user_model->get_user_data($userId)['measurement'];
            $data = array(
                'measurement' => $measurement                
            );
            $this->load->view('add_child', $data);
        } else {
            
            if($this->input->post('is_parent') == NULL)
            {
                $is_par=0;
            }
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
            if ($this->user_model->insertChild($data)) {
                
                // successfully sent mail
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You are Successfully ADD A CHILD!</div>');
                redirect('user/add_child');
            } else {
                // error
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Can\'t ADD CHILD.  Please try again later!!!</div>');
                redirect('user/add_child');
            }
        }
    }
}