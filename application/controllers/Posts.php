<?php 
    class Posts extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->library('session');
        }
        public function Index(){
            $data['title']='Latest Posts';

        $data['posts'] = $this->Post_model->get_posts(); 

            $this->load->view('templates/header',$data);
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }
        public function view($slug=NULL){
            $data['post']=$this->Post_model->get_posts($slug);
            if(empty($data['post'])){
                show_404();
            }
            $data['title']=$data['post']['title'];
            $data['comments']=$this->Post_model->get_comment($slug);

            $this->load->view('templates/header',$data);
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }
        public function create(){
            $data['title']="Create";
            $data['categories']=$this->Post_model->get_categories();

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run()=== FALSE){
                $this->load->view('templates/header',$data);
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');


            }else{
                $config['upload_path']='./assets/img/posts/';
                $config['allowed_types']='gif|jpg|png|jpeg';
                $config['max_size']='16777215';
                $config['max_width']='3000';
                $config['max_height']='3000';
                $this->load->library('upload', $config);
                $post_image = "noimage.jpg";
                

	            if ($this->upload->do_upload('userfile')) {
                    $post_image = $this->upload->data('file_name');}
                    else{
                        $errors= array('error'=> $this->upload->display_errors());
                        $post_image = "noimage.jpg";
                    }

                $this->Post_model->create_post($post_image);
                redirect("posts/create");
            }

            
        }
        public function delete($id){
            $this->Post_model->delete_post($id);
            redirect("posts");
        }
        public function edit($slug){
            $data['post']=$this->Post_model->get_posts($slug);
            if(empty($data['post'])){
                show_404();
            }
            $data['title']='Edit Post';
            $data['categories']=$this->Post_model->get_categories();

            $this->load->view('templates/header',$data);
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');

        }
        public function update(){
            $config['upload_path']='./assets/img/posts/';
            $config['allowed_types']='gif|jpg|png|jpeg';
            $config['max_size']='16777215';
                $config['max_width']='3000';
                $config['max_height']='3000';
                $this->load->library('upload', $config);
                $post_image = "noimage.jpg";
                

	            if ($this->upload->do_upload('userfile')) {
                    $post_image = $this->upload->data('file_name');}
                    else{
                        $errors= array('error'=> $this->upload->display_errors());
                        $post_image = "noimage.jpg";
                    }

            $this->Post_model->Update_post();
            redirect("posts");
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
            $this->Post_model->comment();
        }
        public function get_comments(){
            
        }
    }