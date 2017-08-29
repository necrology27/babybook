<?php
class child_model extends CI_Model
{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function insertChild($data)
    {
        $this->db->insert('children', $data);
        return $this->db->insert_id();
    }
    
    function update_child_by_id($child_id, $data)
    {
        $this->db->trans_start();
        $this->db->update('children', $data, array(
            'child_id' => $data['child_id']
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
    
    function is_parent_child_relation($child_id, $user_id)
    {
        $this->db->select('*');
        $this->db->from('children');
        $this->db->where('child_id', $child_id);
        $query = $this->db->get();
        $result = $query->result_array();
        if($result[0]['user_id'] == $user_id)
        {
            return true;
        }
        else
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Oops! Error. Not yor child!!!</div>');
            return false;
        }
    }
    function get_child_data($id)
    {
        $this->db->select('*');
        $this->db->from('children');
        $this->db->where('child_id', $id);
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
        $this->db->where('child_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($this->db->affected_rows() > 0)
            return $result[0];
            else
                return false;
    }
    
    public function get_child_age_by_id($child_id)
    {
        
        $birthday = $this->get_child_birthday($child_id)['birthday'];
        $today = new DateTime();
        $today->format('Y-m-d');
        $diff = date_diff(new DateTime($birthday), $today);
        
        $age_in_month=($diff->y*12)+$diff->m+($diff->d/30);
        return $age_in_month;
    }
    
}
?>