<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDusunModel extends CI_Model {

	protected $tb_dukuh = 'm_dukuh';

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

	function get_data_dusun() {
        $query = $this->db->select('a.id_dukuh, a.dukuh, a.id_kepala_dukuh, b.nama_penduduk')
        ->from('m_dukuh a')
        ->join('ta_penduduk b', 'a.id_kepala_dukuh = b.id_penduduk','left')
        ->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    
    function get_dusun_by_id($id) {
        $query = $this->db->select('a.id_dukuh, a.dukuh, a.id_kepala_dukuh, b.nama_penduduk')
        ->from('m_dukuh a')
        ->join('ta_penduduk b', 'a.id_kepala_dukuh = b.id_penduduk','left')
        ->where(array('a.id_dukuh' => $id))
        ->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

	public function add_data($data){
		$q = $this->db->insert($this->tb_dukuh, $data);
		return $q;
	}

	public function edit_data($id, $data){
		$q = $this->db->where('id_dukuh', $id)->update($this->tb_dukuh, $data);
		return $q;
	}

	public function delete_data($id){
		$where = array('id_dukuh' => $id);
		$q = $this->db->delete($this->tb_dukuh, $where);			
		return $q;
	}


	
}