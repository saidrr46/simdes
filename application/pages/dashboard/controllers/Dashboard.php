<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller
{

	public function __construct()
    {
        parent::__construct();
		$this->load->model('ServiceModel');
		$this->ServiceModel->logged_id();
	}
	
	public function index()
	{
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/sidebar');
		$this->load->view('dashboard_view');
		$this->load->view('admin_template/footer');

	}
}
