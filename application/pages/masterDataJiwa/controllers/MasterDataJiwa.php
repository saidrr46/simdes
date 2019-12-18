<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataJiwa extends MX_Controller
{

	public function __construct()
    {
		parent::__construct();
		$this->load->model('ServiceModel');
		$this->ServiceModel->logged_id();
		$this->load->model('MasterDataJiwaModel');
	}
	
	public function index()
	{
		$data['dusun'] = $this->MasterDataJiwaModel->get_data_dusun();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/sidebar');
		$this->load->view('master_data_jiwa_view', $data);
		$this->load->view('admin_template/footer');
	}
	public function get_data() {
		$data = $this->MasterDataJiwaModel->get_data_penduduk($this->input->get('id'));
		echo json_encode($data);
	}
}
