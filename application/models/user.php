<?php

Class User extends CI_Model{ 
    
    function login($email, $password)
    {
        $password_hash=sha1($password);
        $this -> db -> select('id, name, password');
        $this -> db -> from('users');
        $this -> db -> where('email', $email);
        $this -> db -> where('password', $password_hash);
        $this -> db -> limit(1);
        
        $query = $this -> db -> get();
        
     
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}
?>