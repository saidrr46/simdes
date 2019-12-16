<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterPendudukModel extends CI_Model {

	protected $tb_menu = 'md_menu';
	protected $tb_group_menu = 'td_group_menu';
	protected $tb_insiden = 'td_insiden';
	protected $tb_insiden_sql = 'td_insiden';
	protected $tb_ruas = 'mst_lane';
	protected $tb_heartbeat = 'mst_heartbeat';

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
        ->join('ta_keluarga c', 'a.id_keluarga = b.keluarga','left')
        ->get();
    if ($query->num_rows() == 0) {
        return FALSE;
    } else {
        return $query->result();
    }
	}


	
}