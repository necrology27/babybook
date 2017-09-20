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
        $this->data['num_per_page']=10;
    }

    public function index() {
        if (getCurrentUserRole() != 3) {
            redirect("home", 'refresh');
        }
        
    }

    public function users($page=0) {
        if (getCurrentUserRole() != 3) {
            redirect("home", 'refresh');
        }
        
        $this->load_scripts();
        $this->data['current_place']= "users";
        $this->data['current_page']= $page;
        $this->data['num_of_data']= $this->User_model->get_num_of_user();

        
        $first=$this->data['num_per_page']*$page;
       
        ls_init_language();
        $this->data['users'] = $this->User_model->get_all_info($first,  $this->data['num_per_page']);
      //  var_dump($this->data['users']); die();
        $this->data['title'] = $this->lang->line('admin_users');
        $this->data['active'] = 'users';
        
        $this->load->view('templates/header', $this->data);
        $this->load->view('nav/top_nav');
        $this->load->view('admin/admin_nav', $this->data);
        $this->load->view('admin/users', $this->data);
        $this->load->view('admin/pagination', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    
    public function discussions($page=0) {
        
        if (getCurrentUserRole() != 3) {
            redirect("home", 'refresh');
        }
        $this->load_scripts();
        ls_init_language();
        $this->data['current_place']= "discussions";
        $this->data['current_page']= $page;
        $this->data['num_of_data']= $this->Discussions_model->get_num_of_discussions();
     
        $first=$this->data['num_per_page']*$page;
        
        $this->data['discussion_query'] = $this->Admin_model->dashboard_fetch_discussions($first,  $this->data['num_per_page']);
        
       
        $this->data['title'] = $this->lang->line('admin_discussions');
        
        $this->load->view('templates/header', $this->data);
        $this->load->view('nav/top_nav');
        $this->load->view('admin/admin_nav', $this->data);
        $this->load->view('admin/discussions', $this->data);
        $this->load->view('admin/pagination', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    
   
    
    public function children($page=0) {
        
        if (getCurrentUserRole() != 3) {
            redirect("home", 'refresh');
        }
        $this->load_scripts();
        ls_init_language();
        $this->data['current_place']= "children";
        $this->data['current_page']= $page;
        $this->data['num_of_data']= $this->Child_model->get_num_of_child();
        $first=$this->data['num_per_page']*$page;
        $this->data['children'] = $this->Child_model->getAllChildren($first,  $this->data['num_per_page']);
        $this->data['title'] = $this->lang->line('admin_children');
        
        $this->load->view('templates/header', $this->data);
        $this->load->view('nav/top_nav');
        $this->load->view('admin/admin_nav', $this->data);
        $this->load->view('admin/children', $this->data);
        $this->load->view('admin/pagination', $this->data);
        $this->load->view('templates/footer', $this->data);
    }
    
    public function comments($page=0) {
        
        if (getCurrentUserRole() != 3) {
            redirect("home", 'refresh');
        }
        $this->load_scripts();
        
        $this->data['current_place']= "comments";
        $this->data['current_page']= $page;
        $this->data['num_of_data']= $this->Comments_model->get_num_of_comment();
        $first=$this->data['num_per_page']*$page;
        
        $this->data['comment_query'] = $this->Admin_model->dashboard_fetch_comments($first,  $this->data['num_per_page']);
        
        ls_init_language();
        $this->data['title'] = $this->lang->line('admin_comments');
        $this->load->view('templates/header', $this->data);
        $this->load->view('nav/top_nav');
        $this->load->view('admin/admin_nav', $this->data);
        $this->load->view('admin/comments', $this->data);
        $this->load->view('admin/pagination', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

    public function dashboard() {
        
        if (getCurrentUserRole() != 3) {
            redirect("home", 'refresh');
        }
        $this->users();
        
    }
    
    public function delete_user($id){
        $this->User_model->delete($id);
        redirect('admin/users');
    }
    
    public function change_role(){
        $user_id =  $this->input->post('user_id');
        $new_role_type =  $this->input->post('new_role_type');
        $this->User_model->change_role($user_id, $new_role_type);
      //  redirect('admin/users');
        echo $new_role_type;
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