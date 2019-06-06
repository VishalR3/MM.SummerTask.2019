<?php
class Pages extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->library('session');
        }

        public function view($page = 'home')
        {
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        if($page=='home'){
                $data['latest'] = $this->Post_model->get_latest_posts();
                $data['featured'] = $this->Post_model->get_featured_posts();
                $data['editorial'] = $this->Post_model->get_editorial();
                $data['highlights']=$this->Post_model->get_highlights();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
        }
}