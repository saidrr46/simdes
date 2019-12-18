<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataKeluarga extends MX_Controller
{

	public function __construct()
    {
		parent::__construct();
		$this->load->model('ServiceModel');
		$this->ServiceModel->logged_id();
		$this->load->model('MasterDataKeluargaModel');
	}
	
	public function index()
	{
		$data['dusun'] = $this->MasterDataKeluargaModel->get_data_dusun();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/sidebar');
		$this->load->view('master_data_keluarga_view', $data);
		$this->load->view('admin_template/footer');
	}
	public function get_data() {
		$data = $this->MasterDataKeluargaModel->get_data_penduduk($this->input->get('id'));
		echo json_encode($data);
	}
}
