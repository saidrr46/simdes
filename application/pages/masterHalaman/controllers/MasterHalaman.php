<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MasterHalaman extends MX_Controller
{

	public function __construct()
    {
		parent::__construct();
		$this->load->model('ServiceModel');
		$this->ServiceModel->logged_id();
		$this->load->model('MasterHalamanModel');
	}
	
	public function index()
	{

		$this->load->view('admin_template/header');
		$this->load->view('admin_template/sidebar');
		$this->load->view('master_halaman_view');
		$this->load->view('admin_template/footer');
	}

	public function get_data() {
		$data = $this->MasterHalamanModel->get_data();
		$output = '';
		if(is_array($data) && count($data) > 0)
		{
			foreach($data as $key=>$row)
			{
				$output .= '
				<tr>
					<td class="text-center">'.($key + 1).'</td>
					<td>'.$row->judul_page.'</td>
					<td>'.$row->update_at.'</td>
					<td class="align-middle">
					<div class="btn-group">
					  <button type="button" class="btn btn-sm btn-primary edit-data" data-id="'.$row->id_page.'">Edit</button>
					  <button type="button" class="btn btn-sm btn-danger delete-data" data-id="'.$row->id_page.'">Hapus</button>
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
		$data = $this->MasterHalamanModel->get_data_by_id($this->input->post('id'));
		echo json_encode($data);		
	}

	public function update_data (){
		$par = $this->input->post();
		$data = array(
			'judul_page' => $par['judul_page'],
			'isi' => $par['isi'],
			'update_at' => date('Y-m-d H:i:s')
		);
		if($par['action'] === 'edit') {
			$id = $par['id_page'];
			$q = $this->MasterHalamanModel->edit_data($id, $data);
			if ($q) {
				$resp = array('status' => 'sukses');
				echo json_encode($resp);
			}else{
				$resp = array('status' => 'gagal');
				echo json_encode($resp);
			}
		} else {

			if ($data) {
				$q =  $this->MasterHalamanModel->add_data($data);
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
		$data = $this->MasterHalamanModel->delete_data($par = $this->input->post('id'));
		echo json_encode($data);		
	}
}
