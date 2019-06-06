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

}

?>