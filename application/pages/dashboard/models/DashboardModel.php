<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {


	public function __construct(){
		parent::__construct();
	}

	public function last_query_db(){
		return $this->db->last_query();
	}

	//fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user');
    }

    public function get_rekap() {
        $return = array();
        $query = $this->db->select('id_dukuh')->from('m_dukuh')->get();
        $query2 = $this->db->select('id_rw')->from('m_rw')->get();
        $query3 = $this->db->select('id_rt')->from('m_rt')->get();
        $query4 = $this->db->select('id_keluarga')->from('ta_keluarga')->get();
        $query5 = $this->db->select('id_penduduk')->from('ta_penduduk')->get();
        $return['jumlah_dukuh'] = $query->num_rows();
        $return['jumlah_rw'] = $query2->num_rows();
        $return['jumlah_rt'] = $query3->num_rows();
        $return['jumlah_kk'] = $query4->num_rows();
        $return['jumlah_penduduk'] = $query5->num_rows();
        return $return;
    }

	
}