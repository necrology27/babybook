<?php
class skill_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_skills_name_and_language_by_id_and_lang($skills_id, $lang)
    {
        if($lang==3)
            $lang=1;
        $this->db->select('*');
        $this->db->from('skills a');
        $this->db->join('skill_language b', 'b.skill_id=a.id', 'left');
        $this->db->where_in('a.id', $skills_id);
        $this->db->where('b.lang_id', $lang);
        
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result;
//             else
//                 return false;
                
    }
    
    function get_skills_by_id($skills_id)
    {
        
        $this->db->select('*');
        $this->db->from('skills');
        $this->db->where_in('id', $skills_id);
        
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result;
            else
                return false;
                
    }
    function get_skills_by_age($age, $lang)
    {
        if($lang==3)
            $lang=1;
        $this->db->select('*');
        $this->db->from('skills a');
        $this->db->join('skill_language b', 'b.skill_id=a.id', 'left');
        $this->db->where('a.passed25pct<', $age);
        $this->db->where('a.passed90pct>', $age);
        $this->db->where('b.lang_id', $lang);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    #egy id-hoz képest a következő képességek egy adott csoportban
    #SELECT * FROM skills WHERE id>110 AND skill_group_id=2 LIMIT 3
    function get_next_skills($id, $skill_group_id, $lang)
    {
        if($lang==3)
            $lang=1;
        $this->db->select('*');
        $this->db->from('skills a');
        $this->db->join('skill_language b', 'b.skill_id=a.id', 'left');
        $this->db->where('a.id>', $id);
        $this->db->where('b.lang_id', $lang);
        $this->db->where('a.skill_group_id', $skill_group_id);
        $this->db->limit(4);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
        {
            
            return $result;
        }
             else
                 return array();
                
                
    }
    #egy id-hoz képest az előző képességek egy adott csoportban
    #SELECT * FROM skills WHERE id < 113 AND `skill_group_id`=3 ORDER BY id DESC LIMIT 4
    function get_previous_skills($id, $skill_group_id)
    {
        $this->db->select('*');
        $this->db->from('skills');
        $this->db->where('id<', $id);
        $this->db->where('skill_group_id', $skill_group_id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result;
            else
                return false;
                
                
    }
    
    
}
?>