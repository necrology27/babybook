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
    
    function get_answers_with_data_by_child($child_id)
    {
        $this->db->select('*');
        $this->db->from('answers a');
        $this->db->join('skills b', 'b.id=a.skill_id', 'left');
        $this->db->where('a.child_id', $child_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    function count_score($full_answers, $age)
    {
        $score=null;
        
        foreach ($full_answers as $one_answer)
        {
        
            if($one_answer["learned"]=="Pass")
            {
                if($age<$one_answer["passed25pct"])
                    $score += 4;
                    elseif($age<$one_answer["passed50pct"])
                    $score += 3;
                    elseif ($age<$one_answer["passed75pct"])
                    $score += 2;
                    elseif ($age<$one_answer["passed90pct"])
                    $score += 1;
            }
            
            if($one_answer["learned"]=="Fail" )
            {
                if($age>$one_answer["passed90pct"])
                    $score -= 4;
                    elseif($age>$one_answer["passed75pct"])
                    $score -= 3;
                    elseif ($age>$one_answer["passed50pct"])
                    $score -= 2;
                    elseif ($age>$one_answer["passed25pct"])
                    $score -= 1;
            }
        }
        return $score;
    }
    
    
    function get_score($child_id)
    {
        $full_answers = $this->get_answers_with_data_by_child($child_id);
        $age=$full_answers[0]["age"];
            #skill_group/ok szerint
        $ans1=array();
        $ans2=array();
        $ans3=array();
        $ans4=array();
        
       
        
        foreach ($full_answers as $one_answer)
        {
            #echo '<pre>' .var_dump($one_answer). '</pre>';
            
            if($one_answer["skill_group_id"]==1)
                $ans1[] = $one_answer;
                elseif($one_answer["skill_group_id"]==2)
                $ans2[] = $one_answer;
                    elseif($one_answer["skill_group_id"]==3)
                    $ans3[]= $one_answer;
                        elseif($one_answer["skill_group_id"]==4)
                        $ans4[]=$one_answer;
        }
       
        $scores['personal_social']=$this->count_score($ans1, $age);
        $scores['fine_motor']=$this->count_score($ans2, $age);
        $scores['language']=$this->count_score($ans3, $age);
        $scores['gross_motor']=$this->count_score($ans4, $age);
        return $scores;
    }
}
?>