<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterDataKeluargaModel extends CI_Model {

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
            $this->db->where(array('a.id_dukuh' => $id_dukuh));
        }
        $query = $this->db->select('*')
        ->from('ta_keluarga a')
        ->join('(SELECT id_keluarga, COUNT(*) as jumlah from ta_penduduk GROUP BY id_keluarga) b','a.id_keluarga = b.id_keluarga', 'left')
        ->join('m_dukuh h', 'a.id_dukuh = h.id_dukuh','left')
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