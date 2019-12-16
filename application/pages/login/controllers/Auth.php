<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller 
{
	public function __construct()
	{
		parent::__construct();
		// Load model LoginModel
		// $this->load->model('LoginModel');
		// $this->LoginModel->logged_id();
	}

	public function index() {
		redirect('dashboard', 'refresh');
	}

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/admin/welcome.php */