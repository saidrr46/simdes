<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterHalamanModel extends CI_Model {

	protected $tb_page = 'm_page';

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

	function get_data() {
        $query = $this->db->select('*')
        ->from('m_page a')
        ->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    
    function get_data_by_id($id) {
        $query = $this->db->select('*')
        ->from('m_page a')
        ->where(array('a.id_page' => $id))
        ->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

	public function add_data($data){
		$q = $this->db->insert($this->tb_page, $data);
		return $q;
	}

	public function edit_data($id, $data){
		$q = $this->db->where('id_page', $id)->update($this->tb_page, $data);
		return $q;
	}

	public function delete_data($id){
		$where = array('id_page' => $id);
		$q = $this->db->delete($this->tb_page, $where);			
		return $q;
	}


	
}