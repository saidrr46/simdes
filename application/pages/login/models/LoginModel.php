<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model 
{

    protected $tb_users = 'm_user';
    protected $tb_has = 'tr_group_has_user';
    protected $tb_group = 'm_group';

	// digunakan untuk mengecek session
	function logged_id()
	{
		return $this->session->userdata('user_id');
	}

    //fungsi check login
    function signing_in($u, $p)
    {
    	$where = array('a.username' => $u,'a.password' => $p,'a.active' => 1);
	    $query = $this->db->select('a.username, a.id_user, c.id_group, c.group')
            ->from($this->tb_users.' a')
            ->join($this->tb_has. ' b', 'a.id_user = b.id_user', 'left')
	    	->join($this->tb_group.' c', 'b.id_group = b.id_group','left')
	    	->where($where)
	    	->get();
	    if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }


}

/* End of file Mlogin.php */
/* Location: ./application/models/Mlogin.php */