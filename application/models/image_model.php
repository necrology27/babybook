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
    
    function get_def_img_id($child_id)
    {
        $this->db->select('default_image');
        $this->db->from('children');
        $this->db->where('child_id', $child_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['default_image'];
    }
    
    function get_def_img($id)
    {
        $image_id = $this->get_def_img_id($id);
        $this->db->select('file_name');
        $this->db->from('images');
        $this->db->where('id', $image_id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result[0]['file_name'];
        else
            return false;
    }
    
    function get_all_imgs($child_id)
    {
        $this->db->select('file_name, title, description');
        $this->db->from('images');
        $this->db->where('child_id', $child_id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result;
        else
            return false;
    }
    
    function changeDefaultImage($childId, $imageId)
    {
        $this->db->set('default_image', $imageId);
        $this->db->where('child_id', $childId);
        return $this->db->update('children');
    }
    
    function insertAlbum($childId, $albumName)
    {
        $data = array(
            'child_id' => $childId,
            'name' => $albumName
        );
        $this->db->insert('album', $data);
        return $this->db->insert_id();
    }
}