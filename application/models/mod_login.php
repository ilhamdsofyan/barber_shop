<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Mod_login extends CI_Model {
	
		public function aksi_login($data) {
			return $this->db->get_where('tb_user',$data);
		}
	
	}
	
	/* End of file mod_login.php */
	/* Location: ./application/models/mod_login.php */
?>