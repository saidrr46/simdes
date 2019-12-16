<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function index() {

		if($this->LoginModel->logged_id())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("dashboard");
            }else{
            	$this->load->view('login_view');
		}
	}

	public function cek(){
		$u = $this->input->post('user');
		$p = $this->input->post('pass');
		$login = $this->LoginModel->signing_in($u,$p);
		if ($login != FALSE) {
			foreach ($login as $key) {
				$session_data = array(
					'user' => $key->username,
					'group_id' => $key->id_group,
					'user_id' => $key->id_user,
					'nama_group'=> $key->group
				);
				//set session userdata
                $this->session->set_userdata($session_data);
                $data = array('status' => 'sukses');
                echo json_encode($data);
			}
		}else{
			$data = array('status' => 'gagal');
			echo json_encode($data);
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */