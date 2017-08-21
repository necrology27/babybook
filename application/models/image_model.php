<?php
class image_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function insertImage($data)
    {
        $this->db->insert('images', $data);
        return $this->db->insert_id();
    }
    
    
}