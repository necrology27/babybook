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
	
	function changePassword($data, $pwd)
	{
	    $sha_password = sha1($pwd);
	    $this->db->set('password', $sha_password);
	    $this->db->where('email', $data);
	    return $this->db->update('users');
	}
}