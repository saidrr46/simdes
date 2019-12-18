<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataJiwaModel extends CI_Model {

    protected $tb_dukuh = 'm_dukuh';
    protected $tb_keluarga = 'ta_keluarga';
    protected $tb_penduduk = 'ta_penduduk';
    
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

	function get_data_penduduk($id_dukuh = false) {
        $return = new stdClass();
        if (isset($id_dukuh) && $id_dukuh){
            $this->db->where(array('g.id_dukuh' => $id_dukuh));
        }
        $query = $this->db->select('*')
        ->from('ta_penduduk a')
        ->join('m_status_keluarga b', 'a.id_status_keluarga = b.id_status_keluarga','left')
        ->join('m_agama c', 'a.id_agama = c.id_agama','left')
        ->join('m_pekerjaan d', 'a.id_pekerjaan = d.id_pekerjaan','left')
        ->join('m_pendidikan e', 'a.id_pendidikan = e.id_pendidikan','left')
        ->join('m_jenis_kelamin f', 'a.id_jenis_kelamin = f.id_jenis_kelamin','left')
        ->join('ta_keluarga g', 'a.id_keluarga = g.id_keluarga','left')
        ->join('m_dukuh h', 'g.id_dukuh = h.id_dukuh','left')
        ->get();
        if ($query->num_rows() == 0) {
            $return->data = array();
            $return->total = 0;
        } else {
            $return->data = $query->result();
            $return->total = $query->num_rows();
        }
        return $return ;
    }
    

	
}