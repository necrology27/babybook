<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Discussions extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('string');
        $this->load->library('encrypt');
        $this->load->model('Discussions_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    }
    
    public function index() {
        $scripts = array(
            'rating.js'
        );
        
        $this->data['scripts'] = $scripts;
        
        if ($this->uri->segment(3)) {
            $filter = $this->uri->segment(4);
            $direction = $this->uri->segment(5);
            $page_data['dir'] = $this->uri->segment(5);
        } else {
            $filter = null;
            $direction = null;
            $page_data['dir'] = 'ASC';
        }
        
        ls_init_language();
        $this->data['title'] = $this->lang->line('discussions_title');
        $page_data['query'] = $this->Discussions_model->fetch_discussions($filter,$direction);
      
        
        $this->load->view('templates/header');
        $this->load->view('nav/top_nav');
        $this->load->view('discussions/view', $page_data);
        $this->load->view('templates/footer', $this->data);
    }
    
    public function create() {
        $this->form_validation->set_rules('ds_title', $this->lang->line('discussion_ds_title'), 'required|min_length[1]|max_length[255]');
       // $this->form_validation->set_rules('ds_link', $this->lang->line('discussion_ds_link'), 'callback_real_url');
        $this->form_validation->set_rules('ds_body', $this->lang->line('discussion_ds_body'), 'required|min_length[1]|max_length[5000]');
        
        ls_init_language();
        $this->data['title'] = $this->lang->line('top_nav_new_discussion');
        if ($this->form_validation->run() == FALSE) {
            ls_init_language();
            $this->data['title'] = $this->lang->line('discussions_title');
            $this->load->view('templates/header');
            $this->load->view('nav/top_nav');
            $this->load->view('discussions/new');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'ds_title' => $this->input->post('ds_title'),
                //'ds_link' => $this->input->post('ds_link'),
                'ds_body' =>  $this->input->post('ds_body')
            );
            
            if ($ds_id = $this->Discussions_model->create($data)) {
                ls_init_language();
                $this->data['title'] = $this->lang->line('discussions_title');
                redirect('comments/index/'.$ds_id);
            } else {
                // error
                // load view and flash sess error
            }
        }
    }
    public function flag() {
        $ds_id = $this->uri->segment(3);
        if ($this->Discussions_model->flag($ds_id)) {
            redirect('discussions/');
        } else {
            // error
            // load view and flash sess error
        }
    }
}