<?php
class user_model extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	//insert into user table
	function insertUser($data)
    {
		return $this->db->insert('users', $data);
	}
	function insertChild($data)
	{
	    return $this->db->insert('children', $data);
	}
	
	function get_user_id($data){
	    $email[] = $data['email'];
	    $this->db->select('id');
	    $this->db->from('users');
	    $this->db->where('email', $email);
	    $query = $this->db->get();
	    $result = $query->result();
	    return $result;
	}
	
	function update_user_by_id($id,$data){
	    $this->db->where('id', $id);
	    return $this->db->update('users', $data);
	}
	
	function updateUser($data)
	{
	    $id = $this->get_user_id($data);
	    return $this->update_user_by_id($id, $data);
	}
	
	function changePassword($data, $pwd)
	{
	    $sha_password = sha1($pwd);
	    $this->db->set('password', $sha_password);
	    $this->db->where('email', $data);
	    return $this->db->update('users');
	}
}