<?php
    class Post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function get_posts($slug = FALSE){
            if($slug===FALSE){
                $this->db->order_by('posts.id','DESC');
                $this->db->join('categories','categories.id=posts.category_id');
                $query= $this->db->get('posts');
                return $query->result_array();
            }
            $query =  $this->db->get_where('posts',array('slug'=>$slug));
            $data = $query->row_array();
            $views= $data['views'];
            $views++;
            $this->db->where('slug',$slug);
            $this->db->update("posts",array('views'=>$views));
            return $data;

        }
        public function create_post($post_image){
            $slug=url_title($this->input->post('title'));

            $data = array(
                'title'=>$this->input->post('title'),
                'slug'=>$slug,
                'body'=>$this->input->post('body'),
                'category_id'=>$this->input->post('category_id'),
                'post_image'=>$post_image
            );
            return $this->db->insert('posts',$data);
        }
        public function delete_post($id){
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }
        public function update_post(){
            $slug=url_title($this->input->post('title'));

            $data = array(
                'title'=>$this->input->post('title'),
                'slug'=>$slug,
                'body'=>$this->input->post('body'),
                'category_id'=>$this->input->post('category_id')
            );
            $this->db->where('id', $this->input->post('id'));

            return $this->db->update('posts',$data);

        }
        public function get_categories(){
            $this->db->ORDER_BY("name");
            $query= $this->db->get('categories');
            return $query->result_array();
        }
        public function get_posts_by_category($category_id){
            $this->db->ORDER_BY("posts.id",'DESC');
             $this->db->join('categories','categories.id=posts.category_id');
                $query= $this->db->get_where('posts',array('category_id'=>$category_id));
                return $query->result_array();

        }

        public function get_featured_posts() {
            $query = $this->db->query('SELECT * FROM posts WHERE featured=1 ORDER BY date DESC LIMIT 3;');
            return $query->result_array();
        }
        public function get_editorial() {
            $query = $this->db->query('SELECT * FROM posts ORDER BY views DESC LIMIT 3;');
            return $query->result_array();
        }
        public function get_latest_posts() {
                $query = $this->db->query("SELECT * FROM posts ORDER BY date DESC LIMIT 3;");
                return $query->result_array();
        }
        public function get_highlights() {
            $query = $this->db->query("SELECT * FROM posts WHERE highlight=1 ORDER BY date DESC LIMIT 3;");
            return $query->result_array();
        }
        public function del_high($id){

            $data = array(
                'highlight'=>'0'
            );
            $this->db->where('id', $id);

            return $this->db->update('posts',$data);

        }
        public function m_high($slug){
            
            $data = array(
                'highlight'=>'1'
            );
            $this->db->where('slug', $slug);

            return $this->db->update('posts',$data);
            
        }
        public function del_featured($id){

            $data = array(
                'featured'=>'0'
            );
            $this->db->where('id', $id);

            return $this->db->update('posts',$data);

        }
        public function m_featured($id){
            $data = array(
                'featured'=>'1'
            );
            $this->db->where('slug', $slug);

            return $this->db->update('posts',$data);
        }
        public function comment(){
            $post_id= $this->input->post('post');
            $data= array(
                'comment' => $this->input->post('cmt'),
                'post'=> $post_id,
                'user' => $this->input->post('user'),
                'user_role' => $this->input->post('role'),
                'status' => "Approved"
            );
            $this->db->insert("comments",$data);
            $query=$this->db->query("SELECT * FROM posts WHERE id =".$post_id);
            $post=$query->row_array();
            $comments=$post['comments']+1;
            $this->db->where("id",$post_id);
            $this->db->update('posts',array("comments"=>$comments));
        }
        public function get_comment($slug){
            $post =  $this->db->get_where('posts',array('slug'=>$slug));
            $data=$post->row_array();
            $post_id=$data['id'];
            $query=$this->db->get_where("comments",array('post'=>$post_id));
            $comments=sizeof($query->result_array());
            $this->db->where('id',$post_id);
            $this->db->update('posts',array("comments"=> $comments));
            return $query->result_array();
        }
    }