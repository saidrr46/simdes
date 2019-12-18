<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendataan extends MX_Controller
{

	public function __construct()
    {
		parent::__construct();
		$this->load->model('ServiceModel');
		$this->ServiceModel->logged_id();
		$this->load->model('PendataanModel');
	}
	
	public function index()
	{
		$data['dusun'] = $this->PendataanModel->get_data_dusun();
		$data['agama'] = $this->PendataanModel->get_data_agama();
		$data['pekerjaan'] = $this->PendataanModel->get_data_pekerjaan();
		$data['pendidikan'] = $this->PendataanModel->get_data_pendidikan();
		$data['status'] = $this->PendataanModel->get_data_status();

		$this->load->view('admin_template/header');
		$this->load->view('admin_template/sidebar');
		$this->load->view('pendataan_view', $data);
		$this->load->view('admin_template/footer');
	}

	public function get_data() {
		$data = $this->PendataanModel->get_data_penduduk($this->input->get('id'));
		$output = '';
		if(is_array($data) && count($data) > 0)
		{
			foreach($data as $key=>$row)
			{
				$output .= '
				<tr>
					<td class="text-center">'.($key + 1).'</td>
					<td>'.$row->nik.'</td>
					<td>'.$row->nama_penduduk.'</td>
					<td>'.$row->status_keluarga.'</td>
					<td>'.$row->jenis_kelamin.'</td>
					<td>'.$row->pekerjaan.'</td>
					<td>'.$row->pendidikan.'</td>
					<td>'.$row->agama.'</td>
					<td class="align-middle">
					<div class="btn-group">
					  <button type="button" class="btn btn-sm btn-primary edit-data" data-id="'.$row->id_penduduk.'">Edit</button>
					  <button type="button" class="btn btn-sm btn-danger delete-data" data-id="'.$row->id_penduduk.'">Hapus</button>
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
		$data = $this->PendataanModel->get_penduduk_by_id($this->input->post('id'));
		echo json_encode($data);		
	}

	public function update_data(){
		$par = $this->input->post();
		if(isset($par['id_keluarga']) && $par['id_keluarga']) {
			$q = $this->PendataanModel->edit_data($par['id_keluarga'], $par);
			if ($q) {
				$resp = array('success' => true, 'msg' => 'Berhasil Menyimpan');
				echo json_encode($resp);
			}else{
				$resp = array('status' => 'gagal');
				echo json_encode($resp);
			}
		} else {
			if ($par) {
				$q =  $this->PendataanModel->add_data($par);
				if ($q) {
					$resp = array('success' => true, 'msg' => 'Berhasil Menyimpan', 'id_keluarga' => $q);
					echo json_encode($resp);
				}else{
					$resp = array('status' => 'gagal');
					echo json_encode($resp);
				}
			}
		}
	}

	public function update_data_penduduk(){
		$par = $this->input->post();
		if(isset($par['id_penduduk']) && $par['id_penduduk']) {
			$q = $this->PendataanModel->edit_data_penduduk($par['id_penduduk'], $par);
			if ($q) {
				$resp = array('success' => true, 'msg' => 'Berhasil Menyimpan');
				echo json_encode($resp);
			}else{
				$resp = array('status' => 'gagal');
				echo json_encode($resp);
			}
		} else {
			if ($par) {
				$q =  $this->PendataanModel->add_data_penduduk($par);
				if ($q) {
					$resp = array('success' => true, 'msg' => 'Berhasil Menyimpan');
					echo json_encode($resp);
				}else{
					$resp = array('status' => 'gagal');
					echo json_encode($resp);
				}
			}
		}
	}

	public function delete_data(){
		$data = $this->PendataanModel->delete_data($par = $this->input->post('id'));
		echo json_encode($data);		
	}
}
