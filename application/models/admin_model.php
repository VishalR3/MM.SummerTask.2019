<?php

class Admin_model extends CI_Model{
    public function __construct(){
        $this->load->database();
        $this->load->helper('cookie');
    }
    public function create_poll(){
        $slug=url_title($this->input->post('poll_ques'));

        $data = array(
            'poll_ques'=>$this->input->post('poll_ques'),
            'slug'=>$slug,
            'poll_1'=>$this->input->post('poll_1'),
            'poll_2'=>$this->input->post('poll_2'),
            'poll_3'=>$this->input->post('poll_3')
        );
        return $this->db->insert('poll',$data);
    }
    public function get_poll(){
        $query=$this->db->query("SELECT * From poll ORDER BY id DESC LIMIT 1");
        return $query->row_array();
    }
    public function cast_vote(){
        $poll=$this->admin_model->get_poll();
        if($this->input->post('vote')=='1'){
            $data= array(
            'vote_1'=>$poll['vote_1']+1,
            'votes'=>$poll['votes']+1
            );
            $this->db->where('id',$poll['id']);
            $this->db->update('poll',$data);
        }else if($this->input->post('vote')=='2'){
            $data= array(
                'vote_2'=>$poll['vote_2']+1,
                'votes'=>$poll['votes']+1
            );
                $this->db->where('id',$poll['id']);
                $this->db->update('poll',$data);

        }
        else{
            $data= array(
                'vote_3'=>$poll['vote_3']+1,
                'votes'=>$poll['votes']+1
            );
                $this->db->where('id',$poll['id']);
                $this->db->update('poll',$data);

        }
    }
    public function cookie(){
        $ip=$this->input->ip_address();
        $cookie = array(
            'name'   => 'Voted',
            'value'  => $ip,
            'expire' => '86500'
        );
    
    $this->input->set_cookie($cookie);
    }
    
}


?>