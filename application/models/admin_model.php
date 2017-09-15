<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function dashboard_fetch_comments($first,  $num_per_page) {
        
        $this->db->limit($num_per_page, $first);
        $this->db->select('*');
        $this->db->from('comments a');
        $this->db->join('users b', 'b.id=a.usr_id', 'left');
        $this->db->where('cm_is_active', 1);
        
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
       
    }
    function dashboard_fetch_discussions($first,  $num_per_page) {
        $this->db->limit($num_per_page, $first);
        $this->db->select('*');
        $this->db->from('discussions a');
        $this->db->join('users b', 'b.id=a.usr_id', 'left');
        $this->db->where('ds_is_active', 1);
        $query = $this->db->get();
        $result = $query->result_array();
            return $result;
       
    }
    
    function does_user_exist($email) {
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function update_comments($is_active, $id) {
        if ($is_active == 1) {
            $query = "UPDATE 'comments' SET 'cm_is_active' = ? WHERE 'cm_id' = ? " ;
            if ($this->db->query($query,array($is_active,$id))) {
                return true;
            } else {
                return false;
            }
        } else {
            $query = "DELETE FROM 'comments' WHERE 'cm_id' = ?  " ;
            if ($this->db->query($query,array($id))) {
                return true;
            } else {
                return false;
            }
        }
    }
    function update_discussions($is_active, $id) {
        if ($is_active == 1) {
            $query = "UPDATE 'discussions' SET 'ds_is_active' = ? WHERE 'ds_id' = ? " ;
            if ($this->db->query($query, array($is_active,$id))) {
                return true;
            } else {
                return false;
            }
        } else {
            $query = "DELETE FROM 'discussions' WHERE 'ds_id' = ?  " ;
            if ($this->db->query($query,array($id))) {
                $query = "DELETE FROM 'comments' WHERE 'ds_id' = ?  " ;
                if ($this->db->query($query,array($id))) {
                    return true;
                }
            } else {
                return false;
            }
        }
    }
}