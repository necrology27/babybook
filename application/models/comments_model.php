<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function fetch_comments($ds_id) {
        
        $this->db->select('*');
        $this->db->from('comments a');
        $this->db->join('discussions b', 'b.ds_id=a.ds_id', 'left');
        $this->db->join('users c', 'c.id=a.usr_id', 'left');
        $this->db->where('a.cm_is_active', 1);
        $this->db->where_in('b.ds_id',  array($ds_id));
        $this->db->order_by("a.cm_created_at", 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
        
    }
    function new_comment($data) {
       
        $comment_data = array(
            'cm_body' => $data['cm_body'],
            'ds_id' => $data['ds_id'],
            'cm_is_active' => '1',
            'usr_id' => getCurrentUserID()
        );
        if ($this->db->insert('comments',$comment_data) ) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    function flag($cm_id) {
        $this->db->where('cm_id', $cm_id);
        if ($this->db->update('comments', array('cm_is_active' => '0'))) {
            return true;
        } else {
            return false;
        }
    }
}