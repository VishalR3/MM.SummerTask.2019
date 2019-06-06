<?php


class Users extends CI_Controller {

public function __construct() {
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    
public function signup() {
    $this->form_validation->set_rules('username', 'Username','trim|required');
    $this->form_validation->set_rules('email', 'Email','trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password','trim|required');

    if ($this->form_validation->run() == TRUE) {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $password = md5($this->input->post('password'));
        $this->Users_model->sign_up($username, $email, $name ,$password);
        $this->session->set_flashdata('signup_msg', 'Sign up successful! Login to your account');
        redirect(site_url());
    }

    else {
        redirect(site_url());
        $this->session->set_flashdata('signup_msg', 'Sign up unsuccessful! Try again');
    }
}

public function login() {
    $this->form_validation->set_rules('username','Username','trim|required');
    $this->form_validation->set_rules('password','Password','trim|required');

    if ($this->form_validation->run() == TRUE) {

    $user = array(
        'username'=>$this->input->post('username'),
        'password'=>md5($this->input->post('password'))
    );

    $data = $this->Users_model->login_user($user['username'], $user['password']);
    if ($data) {
        $this->session->set_userdata('id', $data['id']);
        $this->session->set_userdata('username', $data['username']);
        $this->session->set_userdata('email', $data['email']);
        $this->session->set_userdata('role', $data['role']);
        $this->session->set_userdata('logged_in', TRUE);

        $this->session->set_flashdata('msg_success','Login Successful!');

        redirect(site_url());
    }

    else {
        $this->session->set_flashdata('msg_error', 'Login unsuccessful. Try again...');
        redirect(site_url());
    }
    } else {
        redirect(site_url());
    }

}

public function logout() {
    $this->session->sess_destroy();
    redirect();
}

}


?>