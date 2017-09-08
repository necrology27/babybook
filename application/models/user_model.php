<?php

class user_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    // insert into user table
    function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }
    
    function insert_user_by_facebook_id($data)
    {
        
        $res=$this->get_user_data_by_face_id($data['facebook_id']);
        if($res==false)
        {
            $this->db->insert('users', $data);
            return $this->db->insert_id();
        }
        else
            return $res['id'];
    }
    
    
    function get_user_data_by_face_id($facebook_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('facebook_id', $facebook_id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result[0];
            else
                return false;
    }

    
    
    function get_user_data($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result[0];
        else
            return false;
    }
    
    function login($email, $password)
    {
        $password_hash=sha1($password);
        $this -> db -> select('id, name, password, language');
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
    
    
    
    function get_users_children($id)
    {
        $this->db->select('*');
        $this->db->from('children');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result;
        else
            return false;
    }
    
   

    function get_user_lang($user_id)
    {
        $this->db->select('language');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        $result = $query->result_array();
            if ($this->db->affected_rows() > 0) {
                return $result[0]['language'];
            } else
                    return "english";
    }

    function update_user_by_id($id, $data)
    {
        $this->db->trans_start();
        $this->db->update('users', $data, array(
            'id' => $data['id']
        ));
        $this->db->trans_complete();
        
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            if ($this->db->trans_status() === FALSE) {
                return 0;
            } else {
                return 1;
            }
            return 0;
        }
    }

    function updateUser($data)
    {
        return $this->update_user_by_id($this->session->id, $data);
    }

    function changePassword($data, $pwd)
    {
        $sha_password = sha1($pwd);
        $this->db->set('password', $sha_password);
        $this->db->where('email', $data);
        return $this->db->update('users');
    }
    
}