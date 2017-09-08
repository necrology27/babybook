<?php

class MY_Controller extends CI_Controller
{

    public $data = array();
    
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function alpha_dash_space($str)
    {
        $CI = & get_instance();
        $CI->load->database();
        
        $CI->form_validation->set_message('alpha_dash_space', "Invalid characters in %s.");
        
        return (! preg_match("/^([-a-z_ áéöüóőúűíÉÁŐÚŰÖÜÓÍ])+$/i", $str)) ? FALSE : TRUE;
    }

    function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    function edit_unique($value, $params)
    {
        $CI = & get_instance();
        $CI->load->database();
        
        $CI->form_validation->set_message('edit_unique', "Sorry, that %s is already being used.");
        
        list ($table, $field, $current_id) = explode(".", $params);
        
        $query = $CI->db->select()
            ->from($table)
            ->where($field, $value)
            ->limit(1)
            ->get();
        
        if ($query->row() && $query->row()->id != $current_id) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function exists($value, $params)
    {
        $CI = & get_instance();
        $CI->load->database();
        
        $CI->form_validation->set_message('exists', "Sorry, that %s is already being used.");
        
        list ($table, $field, $current_id) = explode(".", $params);
        
        $query = $CI->db->select()
            ->from($table)
            ->where($field, $value)
            ->limit(1)
            ->get();
        
        if ($query->row() && $query->row()->user_id == $current_id) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

