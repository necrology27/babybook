<?php defined('BASEPATH') OR exit('No direct script access allowed');

function getCurrentLoggedInUser()
{
    $CI =& get_instance();
    $user_data = $CI->session->userdata('logged_in');
    
    return $user_data;
}

function setCurrentUserData($user_data)
{
    $CI =& get_instance();
    $CI->session->set_userdata('logged_in', $user_data);
}

function removeCurrentUserData(){
    $CI =& get_instance();
    $CI->session->unset_userdata('logged_in');
}

function getCurrentUserName()
{
    $CI =& get_instance();
    $user_data = $CI->session->userdata('logged_in');
    
    return $user_data['name'];
}

function getCurrentUserID()
{
    $CI =& get_instance();
    $user_data = $CI->session->userdata('logged_in');
    
    return $user_data['id'];
}

function getCurrentUserRole()
{
    $CI =& get_instance();
    $user_data = $CI->session->userdata('logged_in');
    $CI->load->model('user_model');
    
    return $CI->user_model->get_user_role_by_id($user_data['id']);
}
function getCurrentUserPoints()
{
    $CI =& get_instance();
    $user_data = $CI->session->userdata('logged_in');
    $CI->load->model('user_model');
    
    return $CI->user_model->get_user_points_by_id($user_data['id']);
}
