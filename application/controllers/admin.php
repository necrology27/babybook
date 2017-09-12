<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Child_model');
        $this->load->model('Discussions_model');
        $this->load->model('Comments_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 
       
        
    }

    
    public function index() {
         

    }


    public function users($page=0) {
        $this->load_scripts();
        $this->data['current_place']= "users";
        $this->data['current_page']= $page;
        $this->data['num_of_data']= $this->User_model->get_num_of_user();
        $this->data['num_per_page']=5;
        $first=$this->data['num_per_page']*$page;
       // $this->data['users'] = $this->Child_model->getAllChildren($first,  $this->data['num_per_page']);
        
        
        ls_init_language();
        $this->data['users'] = $this->User_model->get_all_info($first,  $this->data['num_per_page']);
        
        
        //echo '<pre>'; var_dump($this->data['users']); echo '</pre>'; die();
        $this->data['title'] = $this->lang->line('forum');
        $this->data['active'] = 'users';
        
        $this->load->view('templates/header', $this->data);
        $this->load->view('nav/top_nav');
        $this->load->view('admin/admin_nav', $this->data);
        $this->load->view('admin/users', $this->data);
        $this->load->view('admin/pagination', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    
    public function discussions($page=0) {
        $this->load_scripts();
        $this->data['current_place']= "discussions";
        $this->data['current_page']= $page;
        $this->data['num_of_data']= $this->Discussions_model->get_num_of_discussions();
        $this->data['num_per_page']=5;
        $first=$this->data['num_per_page']*$page;
        
        $this->data['discussion_query'] = $this->Admin_model->dashboard_fetch_discussions($first,  $this->data['num_per_page']);
        
        ls_init_language();
        $this->data['title'] = $this->lang->line('forum');
        
        $this->load->view('templates/header', $this->data);
        $this->load->view('nav/top_nav');
        $this->load->view('admin/admin_nav', $this->data);
        $this->load->view('admin/discussions', $this->data);
        $this->load->view('admin/pagination', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    
   
    
    public function children($page=0) {
        $this->load_scripts();
        $this->data['current_place']= "children";
        $this->data['current_page']= $page;
        $this->data['num_of_data']= $this->Child_model->get_num_of_child();
        $this->data['num_per_page']=5;
        $first=$this->data['num_per_page']*$page;
        $this->data['children'] = $this->Child_model->getAllChildren($first,  $this->data['num_per_page']);
        
        ls_init_language();
        $this->data['title'] = $this->lang->line('forum');
        
        $this->load->view('templates/header', $this->data);
        $this->load->view('nav/top_nav');
        $this->load->view('admin/admin_nav', $this->data);
        $this->load->view('admin/children', $this->data);
        $this->load->view('admin/pagination', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    
    public function comments($page=0) {
        $this->load_scripts();
        
        $this->data['current_place']= "comments";
        $this->data['current_page']= $page;
        $this->data['num_of_data']= $this->Comments_model->get_num_of_comment();
        $this->data['num_per_page']=5;
        $first=$this->data['num_per_page']*$page;
        
        $this->data['comment_query'] = $this->Admin_model->dashboard_fetch_comments($first,  $this->data['num_per_page']);
        
        ls_init_language();
        $this->data['title'] = $this->lang->line('forum');
        $this->load->view('templates/header', $this->data);
        $this->load->view('nav/top_nav');
        $this->load->view('admin/admin_nav', $this->data);
        $this->load->view('admin/comments', $this->data);
        $this->load->view('admin/pagination', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

    public function dashboard() {
        
        $this->users();
        
    }
    
    public function delete_user($id){
        $this->User_model->delete($id);
        redirect('admin/users');
    }
    public function delete_child($id){
        $this->Child_model->delete($id);
        redirect('admin/children');
    }
    public function delete_comment($id){
        $this->Comments_model->delete($id);
        redirect('admin/comments');
    }
    public function delete_discussion($id){
        $this->Discussions_model->delete($id);
        redirect('admin/discussions');
    }

    public function update_item() {
//         if ($this->session->userdata('logged_in') == FALSE) {
//             redirect('admin/login');
//         } 

        if ($this->uri->segment(4) == 'allow') {
            $is_active = 1;
        } else {
            $is_active = 0;
        }

        if ($this->uri->segment(3) == 'ds') {
            $result = $this->Admin_model->update_discussions($is_active, $this->uri->segment(5));
        } else {
            $result = $this->Admin_model->update_comments($is_active, $this->uri->segment(5));
        }

        redirect('admin');
    }
    public function load_scripts(){
        
        $scripts = array(
            'admin.js'
        );
        $this->data['scripts'] = $scripts;
    }
}