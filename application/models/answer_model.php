<?php

class answer_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function insert_answer($data)
    {
        $this->db->delete('answers', array('child_id' => $data['child_id'], 'skill_id' => $data['skill_id']));
        return $this->db->insert('answers', $data);
    }
    
    function child_answers($childID)
    {
        $this->db->select('*');
        $this->db->from('answers');
        $this->db->where('child_id', $childID);
        $query = $this->db->get();
        
        $result = $query->result_array();
        # return $this->db->affected_rows();
        if ($this->db->affected_rows() > 0)
            return $result;
            else
                return false;
    }
    #SELECT * FROM skills where id IN (SELECT skill_id FROM answers WHERE child_id = 379 AND learned='Fail')
    
    function get_fail_skill_id($childID)
    {
        $this->db->select('skill_id');
        $this->db->from('answers');
        $this->db->where('child_id', $childID);
        $this->db->where('learned', 'Fail');
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result;
            else
                return false;
                
    }
    
    
    function last_checked_skill($childID)
    {
        $this->db->select('skill_group_id, MAX(skill_id) as max_skill_id');
        $this->db->from('answers');
        $this->db->where('child_id', $childID);
        $this->db->group_by('skill_group_id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    #SELECT skill_group_id, COUNT(user_id) as fail_num FROM `answers` WHERE`child_id` = 232 AND `learned`='Fail' GROUP BY `skill_group_id`
    function get_nr_fail_answer($childID)
    {
        $this->db->select('skill_group_id, IFNULL(COUNT(user_id), 0) as fail_num', false);
        
        
        $this->db->from('answers');
        $this->db->where('child_id', $childID);
        $this->db->where('learned', 'Fail');
        $this->db->group_by('skill_group_id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
}
?>