<?php

class MY_Controller extends CI_Controller
{

    function alpha_dash_space($str)
    {
        $CI = & get_instance();
        $CI->load->database();
        
        $CI->form_validation->set_message('alpha_dash_space', "Invalid characters in %s.");
        
        return (! preg_match("/^([-a-z_ Ã­Ã©Ã¡Å‘ÃºÅ±Ã¶Ã¼Ã³Ã�Ã‰Ã�Å�ÃšÅ°Ã–ÃœÃ“])+$/i", $str)) ? FALSE : TRUE;
    }

    function load_lang($id = NULL)
    {
        if ($this->session->userdata('logged_in')) {
            $language = $this->user_model->get_user_data($id)['language'];
        } else {
            $language = 1;
        }
        
        // Choose language file according to selected lanaguage
        if ($language == 2)
            $this->lang->load('hungarian_lang', 'hungarian');
        else if ($language == 3)
            $this->lang->load('romanian_lang', 'romanian');
        else
            $this->lang->load('english_lang', 'english');
        
        $data['lang'] = $language;
        $data['msg'] = $this->lang->line('msg');
        $data['home_title'] = $this->lang->line('home_title');
        $data['login_title'] = $this->lang->line('login_title');
        $data['forgot_title'] = $this->lang->line('forgot_title');
        $data['register_title'] = $this->lang->line('register_title');
        $data['update_title'] = $this->lang->line('update_title');
        
        $data['add_child'] = $this->lang->line('add_child');
        $data['edit_profile'] = $this->lang->line('edit_profile');
        $data['logout'] = $this->lang->line('logout');
        $data['forum'] = $this->lang->line('forum');
        $data['settings'] = $this->lang->line('settings');
        $data['back_to_home'] = $this->lang->line('back_to_home');
        $data['save_button'] = $this->lang->line('save_button');
        $data['cancel_button'] = $this->lang->line('cancel_button');
        $data['add_button'] = $this->lang->line('add_button');
        $data['signup_button'] = $this->lang->line('signup_button');
        $data['send_email_button'] = $this->lang->line('send_email_button');
        $data['back_to_login'] = $this->lang->line('back_to_login');
        
        $data['my_children'] = $this->lang->line('my_children');
        $data['name_label'] = $this->lang->line('name_label');
        $data['password_label'] = $this->lang->line('password_label');
        $data['new_password_label'] = $this->lang->line('new_password_label');
        $data['confirm_password_label'] = $this->lang->line('confirm_password_label');
        $data['gender_label'] = $this->lang->line('gender_label');
        $data['male'] = $this->lang->line('male');
        $data['female'] = $this->lang->line('female');
        $data['email_label'] = $this->lang->line('email_label');
        $data['birthday_label'] = $this->lang->line('birthday_label');
        $data['language_label'] = $this->lang->line('language_label');
        $data['measurement_label'] = $this->lang->line('measurement_label');
        $data['old_password_label'] = $this->lang->line('old_password_label');
        $data['no_child'] = $this->lang->line('no_child');
        $data['logged_in_as'] = $this->lang->line('logged_in_as');
        $data['my_child_label'] = $this->lang->line('my_child_label');
        $data['birth_weight_label'] = $this->lang->line('birth_weight_label');
        $data['birth_length_label'] = $this->lang->line('birth_length_label');
        $data['apgar_score_label'] = $this->lang->line('apgar_score_label');
        $data['genetical_disorders_label'] = $this->lang->line('genetical_disorders_label');
        $data['other_disorders_label'] = $this->lang->line('other_disorders_label');
        $data['default_image_label'] = $this->lang->line('default_image_label');
        
        $data['child_name_placeholder'] = $this->lang->line('child_name_placeholder');
        $data['none_placeholder'] = $this->lang->line('none_placeholder');
        $data['ex_mail'] = $this->lang->line('ex_mail');
        
        return $data;
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
        
        if ($query->row() && $query->row()->userId == $current_id) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

