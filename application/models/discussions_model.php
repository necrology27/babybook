<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discussions_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function fetch_discussions($filter = null, $direction = null) {
        
        
        if ($filter != null) {
            if ($filter == 'age') {
                $filter = 'ds_created_at';
                switch ($direction) {
                    case 'ASC':
                        $dir = 'ASC';
                        break;
                    case 'DESC':
                        $dir = 'DESC';
                        break;
                    default:
                        $dir = 'ASC';
                }
            }
        } else {
            $dir = 'ASC';
        }
        $this->db->select('*');
        $this->db->from('discussions a');
        $this->db->join('users b', 'b.id=a.usr_id', 'left');
        $this->db->where('a.ds_is_active', 1);
        $this->db->order_by("ds_created_at", $dir);
        $query = $this->db->get();
        $result = $query->result_array();
       
            return $result;

    }
    
    function fetch_discussion($ds_id) {
        $this->db->select('*');
        $this->db->from('discussions a');
        $this->db->join('users b', 'b.id=a.usr_id', 'left');
        $this->db->where_in('a.ds_id', array($ds_id));
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;

    }
    
    function create($data) {
       
        $discussion_data = array(
            'ds_title' => $data['ds_title'],
            'ds_link' => $data['ds_link'],
            'ds_body' => $data['ds_body'],
            'usr_id' => getCurrentUserID(),
            'ds_is_active' => '1');
        if ($this->db->insert('discussions',$discussion_data) ) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    function flag($ds_id) {
        $this->db->where('ds_id', $ds_id);
        if ($this->db->update('discussions', array('ds_is_active' => '0'))) {
            return true;
        } else {
            return false;
        }
    }
    function delete($id){
        $this -> db -> where('ds_id', $id);
        $this->db->update('discussions', array('ds_is_active' => '0'));
    }
    
    function get_num_of_discussions(){
        $this->db->select('*');
        $this->db->from('discussions');
        $query = $this->db->get();
        return $this->db->affected_rows();
    }
}