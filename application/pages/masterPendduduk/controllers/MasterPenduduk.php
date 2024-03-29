<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller
{

	public function __construct()
    {
        parent::__construct();
		$this->load->model('ServiceModel');
		$this->ServiceModel->logged_id();
		$this->load->model('MasterPendudukModel');
	}
	
	public function index()
	{

		$data['data_penduduk'] = $this->MasterPendudukModel->get_data_penduduk();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/sidebar');
		$this->load->view('master_penduduk_view', $data);
		$this->load->view('admin_template/footer');

	}
}
