<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDusun extends MX_Controller
{

	public function __construct()
    {
		parent::__construct();
		$this->load->model('ServiceModel');
		$this->ServiceModel->logged_id();
		$this->load->model('MasterDusunModel');
	}
	
	public function index()
	{

		$this->load->view('admin_template/header');
		$this->load->view('admin_template/sidebar');
		$this->load->view('master_dusun_view');
		$this->load->view('admin_template/footer');
	}

	public function get_data() {
		$data = $this->MasterDusunModel->get_data_dusun();
		$output = '';
		if(is_array($data) && count($data) > 0)
		{
			foreach($data as $key=>$row)
			{
				$output .= '
				<tr>
					<td class="text-center">'.($key + 1).'</td>
					<td>'.$row->dukuh.'</td>
					<td>'.$row->nama_penduduk.'</td>
					<td class="align-middle">
					<div class="btn-group">
					  <button type="button" class="btn btn-sm btn-primary edit-data" data-id="'.$row->id_dukuh.'">Edit</button>
					  <button type="button" class="btn btn-sm btn-danger delete-data" data-id="'.$row->id_dukuh.'">Hapus</button>
					</div>
				  </td>
				</tr>
				';
			}
		}
		else
		{
			$output .= '
			<tr>
				<td colspan="4" align="center">Tidak ada data ditemukan</td>
			</tr>
			';
		}
		echo $output;
	}

	public function select_data(){
		$data = $this->MasterDusunModel->get_dusun_by_id($this->input->post('id'));
		echo json_encode($data);		
	}

	public function update_data (){
		$par = $this->input->post();
		$data = array(
			'id_desa' => 1,
			'dukuh' => $par['dukuh'],
		);
		if($par['action'] === 'edit') {
			$id = $par['id_dukuh'];
			$q = $this->MasterDusunModel->edit_data($id, $data);
			if ($q) {
				$resp = array('status' => 'sukses');
				echo json_encode($resp);
			}else{
				$resp = array('status' => 'gagal');
				echo json_encode($resp);
			}
		} else {

			if ($data) {
				$q =  $this->MasterDusunModel->add_data($data);
				if ($q) {
					$resp = array('status' => 'sukses');
					echo json_encode($resp);
				} else {
					$resp = array('status' => 'gagal');
					echo json_encode($resp);
				}
			}
		}
	}

	public function delete_data(){
		$data = $this->MasterDusunModel->delete_data($par = $this->input->post('id'));
		echo json_encode($data);		
	}
}
