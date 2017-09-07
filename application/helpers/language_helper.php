<?php

if (!function_exists('ls_switch_language_by_id')) {

    function ls_switch_language_by_id($language_id) {

        $CI = &get_instance();
       
        $CI->lang->load(strtolower(LANG_NAME($language_id)), strtolower(LANG_NAME($language_id)));
    }
}

if (!function_exists('ls_get_current_language_id')) {
   
    function ls_get_current_language_id() {
       
        $CI = &get_instance();
        $active_user = $CI->session->userdata("logged_in");
        if (isset($active_user['user_language_id']) && $active_user['user_language_id'] > 0) {
            
            return $active_user['user_language_id'];
        }
        return 0;
    }
}

if (!function_exists('ls_get_current_system_language_id')) {
   
    function ls_get_current_system_language_id() {
       
        $CI = &get_instance();
        $active_store = $CI->session->userdata("active_store");
       
        if (isset($active_store['language_id']) && $active_store['language_id'] > 0) {
            return $active_store['language_id'];
        }
        return 0;
    }
}

if (!function_exists('ls_init_language')) {

    function ls_init_language($system = false) {
       
        $CI = &get_instance();
        if ($system === false) {
            $language_id = ls_get_current_language_id();
        } else {
            if ($system === true) {
                $language_id = ls_get_current_system_language_id();
            } else {
                // ha string
                $language_id = LANG_ID($system);
            }
        }
       
        if ($language_id > 0) {
            ls_switch_language_by_id($language_id);
        } else {
            $CI->lang->load('english', 'english');
        }
    }
}

if (!function_exists('__')) {

    function __($key, $system = false) {
       
        if ($system) {
            ls_init_language($system);
        }
       
        $CI = &get_instance();
        $text = $CI->lang->line(trim($key), false);
       
        if ($text === false) {
            ls_init_language($system);
            $text = $CI->lang->line(trim($key), false);
        }

        if ($system) {
            ls_init_language(false);
        }
        return ($text !== false) ? trim($text) : trim($key);
    }
}

if (!function_exists('_e')) {

    function _e($key, $system = false) {
       
        $CI = &get_instance();
        echo __($key, $system);
    }
}

if (!function_exists('LANG_ID')) {
   
    function LANG_ID($code = null) {
       
        $ids = array(
            'english' => '1',
            'hungarian' => '2',
            'romanian' => '3',
        );
       
        if (isset($code) && isset($ids[$code])) {
            return $ids[$code];
        }
        return $ids;
    }
}

if (!function_exists('LANG_CODE')) {
   
    function LANG_CODE($id = null) {
        $codes = array(
            '1' => 'english',
            '2' => 'hungarian',
            '3' => 'romanian',
        );
       
        if (isset($id) && isset($codes[$id])) {
            return $codes[$id];
        }
        return $codes;
    }
}

if (!function_exists('LANG_NAME')) {
   
    function LANG_NAME($id = null) {
        $codes = array(
            '1' => 'english',
            '2' => 'hungarian',
            '3' => 'romanian',
        );
       
        if (isset($id) && isset($codes[$id])) {
            return $codes[$id];
        }
        return $codes;
    }
}
