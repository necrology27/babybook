<?php
   class Lang_controller extends CI_Controller {

      public function index(){
         //Load form helper
         $this->load->helper('form');

         //Get the selected language
         $language = $this->input->post('language');
		
         //Choose language file according to selected lanaguage
         if($language == "hungarian")
            $this->lang->load('hungarian_lang','hungarian');
         else if($language == "romanian")
            $this->lang->load('romanian_lang','romanian');
         else
            $this->lang->load('english_lang','english');
		
         //Fetch the message from language file.
         $data['msg'] = $this->lang->line('msg');
		
         $data['language'] = $language;
         //Load the view file
         $this->load->view('lang_view',$data);
      }
   }
?>