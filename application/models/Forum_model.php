<?php
    class Forum_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function get_questions($slug = FALSE){
            if($slug===FALSE){
                $this->db->order_by('forum.id','DESC');
                $query= $this->db->get('forum');
                return $query->result_array();
            }
            $query =  $this->db->get_where('forum',array('slug'=>$slug));
            $data = $query->row_array();
            $views= $data['views'];
            $views++;
            $this->db->where('slug',$slug);
            $this->db->update("forum",array('views'=>$views));
            return $data;

        }
        public function create_thread(){
            $slug=url_title($this->input->post('question'));

            $data = array(
                'title'=>$this->input->post('title'),
                'question'=>$this->input->post('question'),
                'slug'=>$slug,
            );
            return $this->db->insert('forum',$data);
        }
        public function delete_thread($id){
            $this->db->where('id', $id);
            $this->db->delete('forum');
            return true;
        }
        public function get_popular() {
            $query = $this->db->query('SELECT * FROM forum ORDER BY views DESC;');
            return $query->result_array();
        }
        public function comment(){
            $thread_id= $this->input->post('thread');
            $data= array(
                'comment' => $this->input->post('cmt'),
                'thread'=> $thread_id,
                'user' => $this->input->post('user'),
                'user_role' => $this->input->post('role'),
                'status' => "Approved"
            );
            $this->db->insert("comments_forum",$data);
            $query=$this->db->query("SELECT * FROM forum WHERE id =".$thread_id);
            $thread=$query->row_array();
            $comments=$thread['answers']+1;
            $this->db->where("id",$thread_id);
            $this->db->update('forum',array("answers"=>$comments));
        }
        public function get_comment($slug){
            $thread =  $this->db->get_where('forum',array('slug'=>$slug));
            $data=$thread->row_array();
            $thread_id=$data['id'];
            $query=$this->db->get_where("comments_forum",array('thread'=>$thread_id));
            $comments=sizeof($query->result_array());
            $this->db->where('id',$thread_id);
            $this->db->update('forum',array("answers"=> $comments));
            return $query->result_array();
        }
    }