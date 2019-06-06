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
            return $query->row_array();

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

    }