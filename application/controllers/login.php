<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('mod_login');
			// if ($this->session->userdata('username') != '') {
			// 	redirect('dashboard','refresh');
			// }
		}

		public function index() {
			$data['title'] = "BaperShop | Login";
			$this->load->view('login',$data);
		}
	
		public function aksilogin() {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array('username' => $username, 
						  'password' => $password);

			$check = $this->mod_login->aksi_login($data)->num_rows();
			if ($check > 0) {
				$data_session = array('username' => $username,
									  'status' => "login");
				$this->session->set_userdata($data_session);
				redirect('dashboard/index','refresh');
			}
			else{
				// echo "<script>alert('Username or Password wrong!')</script>";
				redirect('login','refresh');
			}
		}

		public function logout() {
			$data_session = array('username' => '',
									  'status' => '');
			$this->session->unset_userdata($data_session);
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	
	}
	
	/* End of file login.php */
	/* Location: ./application/controllers/login.php */
?>