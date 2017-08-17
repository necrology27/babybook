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
	
	function get_user_data($id){
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
	
	function update_user_by_id($id, $data){
	    $this->db->trans_start();
	    $this->db->update('users', $data, array('id' => $data['id']));
	    $this->db->trans_complete();
	    
	    if ($this->db->affected_rows() > 0) {
	        return 1;
	    } else {
	        if ($this->db->trans_status() === FALSE)
	        {
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