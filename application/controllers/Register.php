<?php

class Register
{

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function registerUser($username, $email, $password)
    {
        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $this->hash_password($password)
        );
        return $this->db->insert('table_name', $data);
    }
    
    public function index()
    {
        
        $this->load->view('templates/header', $data);
        $this->load->view('register/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
}