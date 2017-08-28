<?php

class user_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    // insert into user table
    function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }

    function insertChild($data)
    {
        $this->db->insert('children', $data);
        return $this->db->insert_id();
    }
    
   

    function get_user_data($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result[0];
        else
            return false;
    }
    
    function is_parent_child_relation($child_id, $user_id)
    {
        $this->db->select('*');
        $this->db->from('children');
        $this->db->where('id', $child_id);
        $query = $this->db->get();
        $result = $query->result_array();
        if($result[0]['user_id'] == $user_id)
        {
            return true;
        }
        else
        {
            #$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Not yor child!!!</div>');
            return false;
        }
    }
    
    function get_child_data($id)
    {
        $this->db->select('*');
        $this->db->from('children');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result[0];
            else
                return false;
    }
    
    function get_child_birthday($id)
    {
        $this->db->select('birthday');
        $this->db->from('children');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result[0];
            else
                return false;
    }
    
    function get_children_by_parent($id)
    {
        $this->db->select('*');
        $this->db->from('children');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result;
            else
                return false;
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

    function get_user_lang($id)
    {
        $this->db->select('language');
        $this->db->from('users');
        $this->db->where('id', $this->session->id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0) {
            if ($result == 1) {
                return "english";
            } else if ($result == 2) {
                return "hungarian";
            } else {
                return "romanian";
            }
        } else
            return "english";
    }

    function update_user_by_id($id, $data)
    {
        $this->db->trans_start();
        $this->db->update('users', $data, array(
            'id' => $data['id']
        ));
        $this->db->trans_complete();
        
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            if ($this->db->trans_status() === FALSE) {
                return 0;
            } else {
                return 1;
            }
            return 0;
        }
    }

    function updateUser($data)
    {
        return $this->update_user_by_id($this->session->id, $data);
    }

    function changePassword($data, $pwd)
    {
        $sha_password = sha1($pwd);
        $this->db->set('password', $sha_password);
        $this->db->where('email', $data);
        return $this->db->update('users');
    }
    
    
    
        function get_skills_by_age($age)
    {
        $this->db->select('*');
        $this->db->from('skills');
        $this->db->where('passed25pct<', $age);
        $this->db->where('passed90pct>', $age);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    function changeDefaultImage($childId, $imageId)
    {
        $this->db->set('default_image', $imageId);
        $this->db->where('id', $childId);
        return $this->db->update('children');
    }
    
    function insertImage($data)
    {
        $this->db->insert('images', $data);
        return $this->db->insert_id();
    }
    function insert_answer($data)
    {
        $this->db->delete('answers', array('child_id' => $data['child_id'], 'skill_id' => $data['skill_id']));
        return $this->db->insert('answers', $data);
    }
    
    
    
    #################################### skill_model.php ###########
    
    
    #egy id-hoz képest a következő képességek egy adott csoportban
                    #SELECT * FROM skills WHERE id>110 AND skill_group_id=2 LIMIT 3
    function get_next_skills($id, $skill_group_id)
    {
        $this->db->select('*');
        $this->db->from('skills');
        $this->db->where('id>', $id);
        $this->db->where('skill_group_id', $skill_group_id);
        $this->db->limit(4);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result;
            else
                return false;
                
                
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
    
    #SELECT * FROM skills where id IN (SELECT skill_id FROM answers WHERE child_id = 379 AND learned='Fail')
    
   
    
    
    function get_fail_skill($skills_id)
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
    
    function child_has_answer($childID)
    {
        $this->db->select('*');
        $this->db->from('answers');
        $this->db->where('child_id', $childID);
        $query = $this->db->get();
 
        $result = $query->result_array();
        return $this->db->affected_rows();
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
    
}