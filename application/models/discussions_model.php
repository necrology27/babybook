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
        $this->db->select('a.ds_id, b.role,  a.like_num, a.dislike_num, a.ds_title, a.ds_body, a.like_num, a.dislike_num, b.id, b.name');
        $this->db->from('discussions a');
        $this->db->join('users b', 'b.id=a.usr_id', 'left');
        $this->db->where('a.ds_is_active', 1);
   
        $this->db->order_by("ds_created_at", $dir);
        
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;

    }
    
    function get_current_user_ratings()
    {
        $this->db->select('a.ds_id, b.type');
        $this->db->from('discussions a');
        $this->db->join('ratings b', 'a.ds_id=b.ds_id', 'left outer');
        $this->db->where('a.ds_is_active', 1);
        $this->db->where("b.user_id", getCurrentUserID());
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
        
    }
    
    function fetch_discussion($ds_id) {
        $this->db->select('*');
        $this->db->from('discussions a');
        $this->db->join('ratings c', 'c.ds_id=a.ds_id', 'left');
        $this->db->join('users b', 'a.usr_id=b.id', 'left');
        $this->db->group_by('a.ds_id');
        $this->db->where_in('a.ds_id', array($ds_id));
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;

    }
    
    function create($data) {
       
        $discussion_data = array(
            'ds_title' => $data['ds_title'],
            'ds_body' => $data['ds_body'],
            'usr_id' => getCurrentUserID(),
            'ds_is_active' => '1');
        $this->db->insert('discussions',$discussion_data);
        $id=$this->db->insert_id();
        $this->inc_user_points_by_ds(getCurrentUserID(), 10);
            return $id;

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
    
     function add_like($ds_id, $like_value, $dislike_value){
        $this -> db -> where('ds_id', $ds_id);
        $this->db->update('discussions', array('like_num' => $like_value));
        
        $this->db->delete('ratings', array('user_id' => getCurrentUserID(), 'ds_id' => $ds_id));
        if($this->db->affected_rows()==1)
        {
           //$dislike_value=$dislike_value-1;
            $this -> db -> where('ds_id', $ds_id);
            $this->db->update('discussions', array('dislike_num' => $dislike_value-1));
        }
        
        $rating = array(
            'user_id' => getCurrentUserID(),
            'ds_id' => $ds_id,
            'type' => "1",
            
        );
        
        $this->inc_user_points_by_ds($ds_id, 1);
        $this->db->insert('ratings', $rating);
        
        return true;
    }
    
    function inc_user_points_by_ds($ds_id, $num){
        //pontszamok novelese
        $this->db->select('usr_id');
        $this->db->from('discussions');
        $this->db->where('ds_id', $ds_id);
        $query = $this->db->get();
        $us_id= $query->result_array()[0]['usr_id'];
        
        $this->db->select('points');
        $this->db->from('users');
        $this->db->where('id', $us_id);
        $query = $this->db->get();
        $us_points= $query->result_array()[0]['points'];
        
        $this -> db -> where('id', $us_id);
        $this->db->update('users', array('points' => $us_points+10));
        
        return $us_points;
    }
    
    function add_dislike($ds_id, $like_value, $dislike_value){
        $this -> db -> where('ds_id', $ds_id);
        $this->db->update('discussions', array('dislike_num' => $dislike_value));
        
        $this->db->delete('ratings', array('user_id' => getCurrentUserID(), 'ds_id' => $ds_id));
        if($this->db->affected_rows()==1)
        {
            $like_value=$like_value-1;
            $this -> db -> where('ds_id', $ds_id);
            $this->db->update('discussions', array('like_num' => $like_value)); 
        }
      
        $rating = array(
            'user_id' => getCurrentUserID(),
            'ds_id' => $ds_id,
            'type' => "0",
            
        );
        $this->db->insert('ratings', $rating);
        return true;
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