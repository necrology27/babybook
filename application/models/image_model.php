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
    
    function get_def_img($id)
    {
        $this->db->select('file_name');
        $this->db->from('images');
        $this->db->where('title', 'Default image');
        $this->db->where('child_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result[0]['file_name'];
            else
                return false;
    }
    
    function changeDefaultImage($childId, $imageId)
    {
        $this->db->set('default_image', $imageId);
        $this->db->where('id', $childId);
        return $this->db->update('children');
    }
    
    
}