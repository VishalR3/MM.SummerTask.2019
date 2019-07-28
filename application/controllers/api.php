<?php
    class API extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->library('session');
        }

        public function posts(){
            $data['posts'] = $this->Post_model->get_posts(); 
            echo json_encode($data);
        }
        public function view($slug=NULL){
            $data['post']=$this->Post_model->get_posts($slug);
            if(empty($data['post'])){
                show_404();
            }
            else{
                echo json_encode($data);
            }
        }
        public function get_featured(){
            $data['featured'] = $this->Post_model->get_featured_posts();
            echo json_encode($data);
        }
        public function users(){
            $data['users']=$this->Users_model->get_users();
            echo json_encode($data);
        }
        public function login(){
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

                $this->session->set_flashdata('login_stat','Login Successful!');
                echo "Login Succesful!";
            }

            else {
                $this->session->set_flashdata('login_stat', 'Login unsuccessful. Try again...');
                echo "Login Unsuccesful. Try again...";
            }
            } else {
                echo "Not Valid";
            }
        }
        public function signup(){
            $this->form_validation->set_rules('username', 'Username','trim|required|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email','trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password','trim|required');

            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $name = $this->input->post('name');
                $password = md5($this->input->post('password'));
                $this->Users_model->sign_up($username, $email, $name ,$password);
                $this->session->set_flashdata('signup_stat', 'Sign up successful! Login to your account');
            }

            else {
                $this->session->set_flashdata('signup_stat', 'Sign up unsuccessful! Try again');
            }
            echo "Sign Up unsuccessful! Try again.... ";
        }
        public function logout() {
            $this->session->sess_destroy();
            echo "Logged Out";
        }

    }
?>