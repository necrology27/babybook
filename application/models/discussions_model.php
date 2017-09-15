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
    
    function get_like_rating($ds_id){
        $this->db->select('COUNT(b.id) as like_num');
        $this->db->from('discussions a');
        $this->db->join('ratings b', 'b.ds_id=a.ds_id', 'left');
        $this->db->where('a.ds_id', $ds_id);
        $this->db->where('type', "1");
        $query = $this->db->get();
        $result = $query->result_array();
        return $this->db->affected_rows()['like_num']; 
    }
    function get_dislike_rating($ds_id){
        $this->db->select('COUNT(ds_id) as dislike_num');
        $this->db->from('discussions');
        $this->db->join('skills b', 'b.id=a.skill_id', 'left');
        $this->db->where('ds_id', $ds_id);
        $this->db->where('type', "0");
        $query = $this->db->get();
        $r['dislike_num']= $this->db->affected_rows()['dislike_num'];
        return $r;
     }
    
    function add_like($ds_id, $value){
        $this -> db -> where('ds_id', $ds_id);
        $this->db->update('discussions', array('like_num' => $value));
       
        $this->db->delete('ratings', array('user_id' => getCurrentUserID(), 'ds_id' => $ds_id));
        $rating = array(
            'user_id' => getCurrentUserID(),
            'ds_id' => $ds_id,
            'type' => "1",
            
        );
        $this->db->insert('ratings', $rating);
        return $this->db->insert_id();
    }
    
    function add_dislike($ds_id, $value){
        $this -> db -> where('ds_id', $ds_id);
        $this->db->update('discussions', array('dislike_num' => $value));
        
        $this->db->delete('ratings', array('user_id' => getCurrentUserID(), 'ds_id' => $ds_id));
        //if($this->db->affected_rows()==1)
        //{
            //kellett törölni, tehat discussions-ben like_num= like_num-1
//             $this->db->from('discussions');
//             $this -> db -> where('ds_id', $ds_id);
         //    $this->db->set('like_num', 'like_num - ' . (int) 1, FALSE);
           // $this->db->update('discussions', array('like_num' => $this->get_like_rating($ds_id)-1));
       //     $this->db->update('discussions', array('like_num' => 'like_num - ' . (int) 1)); 
     //   }
      
        $rating = array(
            'user_id' => getCurrentUserID(),
            'ds_id' => $ds_id,
            'type' => "0",
            
        );
        $this->db->insert('ratings', $rating);
        return $this->get_like_rating($ds_id);
    }
    
    function get_vote($user_id, $ds_id){
        
        $this->db->select('type');
        $this->db->from('ratings');
        $this->db->where('user_id', $user_id);
        $this->db->where('ds_id', $ds_id);
        $query = $this->db->get();
        $result = $query->result_array();
        
    }
    
    
}