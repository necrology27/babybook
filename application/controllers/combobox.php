<?php

class combobox extends CI_Controller  {
    
    function dynamic_combobox(){
        // retrieve the album and add to the data array
        $this->load->model('combobox_model');
        $data['measurement'] = $this->combobox_model->getmeasurements();
        $this->load->view('combobox', $data);
    }
    
}
