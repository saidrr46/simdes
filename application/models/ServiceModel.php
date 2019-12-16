<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceModel extends CI_Model 
{
	// digunakan untuk mengecek session
	function logged_id()
	{
		if(!$this->session->userdata('user_id')) {
            redirect('login','refresh');
        }
	}

    //fungsi check login
    function signing_in($username, $password)
    {
        $this->db->select('*');
        $this->db->from('m_user');
        $this->db->where($username);
        $this->db->where($password);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }


}

/* End of file Mlogin.php */
/* Location: ./application/models/Mlogin.php */