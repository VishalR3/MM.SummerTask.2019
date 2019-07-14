<?php

class Admin extends CI_Controller {
    public function __construct() {
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('cookie');
    }
    public function panel(){
        $data['title']="Admin Panel";
        $data['posts'] = $this->Post_model->get_posts(); 
        $data['latest'] = $this->Post_model->get_latest_posts();
        $data['featured'] = $this->Post_model->get_featured_posts();
        $data['editorial'] = $this->Post_model->get_editorial();
        $data['highlights']=$this->Post_model->get_highlights();
        $data['questions']=$this->admin_model->get_questions();


        $this->load->view("templates/header",$data);
        $this->load->view("admin/panel",$data);
        $this->load->view("templates/footer");


    }
    public function admins(){
        $data['title']="Admin Management";
        $data['users']=$this->Users_model->get_users();
        $data['admins']=$this->Users_model->get_admins();

        $this->load->view("templates/header",$data);
        $this->load->view("admin/admins",$data);
        $this->load->view("templates/footer");

    }
    public function beta(){
        $data['title']="Beta Ground";
        $data['poll']=$this->admin_model->get_poll();

        $this->load->view("templates/header",$data);
        $this->load->view("admin/beta",$data);
        $this->load->view("templates/footer");

    }
    public function delete_high($slug){
        $this->Post_model->del_high($slug);
        redirect("admin/panel");
    }
    public function make_high($slug){
        $this->Post_model->m_high($slug);
        redirect("admin/panel");
    }
    public function delete_featured($slug){
        $this->Post_model->del_featured($slug);
        redirect("admin/panel");
    }
    public function make_featured($slug){
        $this->Post_model->m_featured($slug);
        redirect("admin/panel");
    }
    public function make_admin($username){
        $this->Users_model->m_admin($username);
        redirect("admin/admins");
    }
    public function remove_admin($username){
        $this->Users_model->rem_admin($username);
        redirect("admin/admins");
    }
    public function poll_create(){
        $this->form_validation->set_rules('poll_ques', 'Poll_ques', 'required');
        $this->form_validation->set_rules('poll_1', 'Poll_1', 'required');
        $this->form_validation->set_rules('poll_2', 'Poll_2', 'required');
        $this->form_validation->set_rules('poll_3', 'Poll_3', 'required');
        
        if($this->form_validation->run()=== TRUE){
            $this->admin_model->create_poll();
            redirect("admin/panel");
        }

    }
    public function cast_vote(){
        $this->admin_model->cast_vote();
        $this->admin_model->cookie();
    }
    public function get_cookies(){
        $data=$this->input->cookie('Voted');
        echo json_encode($data);
    }
    public function ask(){
        $ques=$this->input->post("question");
        echo $this->admin_model->askques($ques);
    }
    public function answer(){
        $this->admin_model->answerques();
        redirect("admin/panel");
    }






}



?>