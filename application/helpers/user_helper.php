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