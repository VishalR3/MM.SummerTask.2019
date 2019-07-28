<?php 
    class Forum extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->library('session');
        }
        public function Index(){
            $data['title']='Forum';

        $data['questions'] = $this->Forum_model->get_questions();
        $data['pop_thread']=$this->Forum_model->get_popular(); 

            $this->load->view('templates/header',$data);
            $this->load->view('forum/index', $data);
            $this->load->view('templates/footer');
        }
        public function view($slug=NULL){
            $data['thread']=$this->Forum_model->get_questions($slug);
            if(empty($data['thread'])){
                show_404();
            }
            $data['title']=$data['thread']['question'];
            $data['comments']=$this->Forum_model->get_comment($slug);

            $this->load->view('templates/header',$data);
            $this->load->view('forum/view', $data);
            $this->load->view('templates/footer');
        }
        public function create(){
            $data['title']="Create Thread";

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('question', 'Question', 'required');

            if($this->form_validation->run()=== FALSE){
                $this->load->view('templates/header',$data);
            $this->load->view('forum/create', $data);
            $this->load->view('templates/footer');


            }else{
                $this->Forum_model->create_thread();
                redirect("forum");
            }

            
        }
        public function delete($id){
            $this->Forum_model->delete_thread($id);
            redirect("forum");
        }
        public function categories($name){
            $data['title']=$name;
            $data['cat']=$this->category_model->get_id($name);
            $data['posts']= $this->Post_model->get_posts_by_category($data['cat']['id']);

            $this->load->view('templates/header',$data);
                $this->load->view('posts/index', $data);
                $this->load->view('templates/footer');

        }
        public function comment(){
            $this->Forum_model->comment();
        }
    }