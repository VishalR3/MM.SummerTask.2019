<?php

class Users_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function sign_up($username, $email, $name ,$password){
		$data = array(
			'username'=>$username,
			'email'=>$email,
			'name'=>$name,
			'password'=>$password,
			'role'=>"subscriber"
		);
		return $this->db->insert('users',$data);
	}

	public function login_user($uname, $psw) {
		$username = $uname;
		$password = $psw;
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
		if ($query) {
			return $query->row_array();
		}
		else {
			return FALSE;
		}
	}
	public function get_users(){
		$this->db->order_by('id','DESC');
		$query=$this->db->get('users');
		return $query->result_array();
	}
	public function get_admins(){
		$this->db->order_by('id','DESC');
		$query=$this->db->get_where('users',array('role'=>'admin'));
		return $query->result_array();
	}
	public function m_admin($username){
		$this->db->where('username',$username);
		return $this->db->update('users',array('role'=>'admin'));
	}
	public function rem_admin($username){
		$this->db->where('username',$username);
		return $this->db->update('users',array('role'=>'subscriber'));
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

}

?>