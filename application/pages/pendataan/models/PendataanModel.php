<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendataanModel extends CI_Model {

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

	function get_data_penduduk() {
        $query = $this->db->select('*')
        ->from('ta_penduduk a')
        ->join('m_status_keluarga b', 'a.id_status_keluarga = b.id_status_keluarga','left')
        ->join('m_agama c', 'a.id_agama = c.id_agama','left')
        ->join('m_pekerjaan d', 'a.id_pekerjaan = d.id_pekerjaan','left')
        ->join('m_pendidikan e', 'a.id_pendidikan = e.id_pendidikan','left')
        ->join('m_jenis_kelamin f', 'a.id_jenis_kelamin = f.id_jenis_kelamin','left')
        ->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
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
    
    public function get_data_agama() {
        $query = $this->db->select('*')
        ->from('m_agama a')
        ->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_data_pekerjaan() {
        $query = $this->db->select('*')
        ->from('m_pekerjaan a')
        ->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_data_pendidikan() {
        $query = $this->db->select('*')
        ->from('m_pendidikan a')
        ->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function get_data_status() {
        $query = $this->db->select('*')
        ->from('m_status_keluarga a')
        ->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

}