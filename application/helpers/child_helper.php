<?php defined('BASEPATH') OR exit('No direct script access allowed');

function getChildDataById($child_id)
{
    $CI =& get_instance();
    $child_data = $CI->child_model->get_child_data($child_id);
    
    return $child_data;
}