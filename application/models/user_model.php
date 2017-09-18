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
    
    function get_user_role_by_id($id)
    {
        $this->db->select('role');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result[0]['role'];
        else
            return false;
    }
    
    function change_role($id, $new_role_type)
    {
        
        if($new_role_type==="admin")
            $this->db->set('role', 3);
            
            elseif($new_role_type==="expert")
                $this->db->set('role', 2);
                
                else
                    $this->db->set('role', 1);
                  
                    $this->db->where('id', $id);
                    $this->db->update('users');
                    
                    return true;
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
    
    function getAllUsers()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        $result = $query->result_array();
            return $result;
    }
    
    function get_num_of_user(){
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $this->db->affected_rows();
    }
    
    function get_all_info($first,  $num_per_page){
        
        $this->db->limit($num_per_page, $first);
        $this->db->select('a.id, a.facebook_id, a.name, 	a.gender, email, a.registration_date, a.birthday, role, language, measurement, COUNT(child_id) as num_of_children, a.role');
        $this->db->from('users a');
        $this->db->join('children b', 'b.user_id=a.id', 'left');
        $this->db->group_by('a.id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    function delete($user_id){
        $this -> db -> where('id', $user_id);
        $this -> db -> delete('users');
    }
    
}