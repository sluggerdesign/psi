<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

 class Authentication {

	var $CI;

	function Authentication() {
		$this->CI =& get_instance();
	}

	// Try Login
	function try_login($condition = array()) {
		$this->CI->db->select('id, name, email');
		$query = $this->CI->db->get_where('users', $condition, 1, 0);

		if ($query->num_rows() != 1) {
			return FALSE;
		} else {
			$row = $query->row();
			// if($row->status == 'Disabled') return FALSE;
			$this->CI->session->set_userdata(array('id'=>$row->id, 'email'=>$row->email, 'name'=>$row->name));
			return TRUE;
		}
	}

	// Logout
	function logout() {
		$this->CI->session->sess_destroy();
	}
 }

?>
