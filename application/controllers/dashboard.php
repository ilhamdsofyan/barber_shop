<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('crud');
			if ($this->session->userdata('username') == '') {
				redirect('login','refresh');
			}
		}
	
		public function index()
		{
			$data['dashboard'] = "active";
			$data['title'] = "BaperShop - Dashboard";
			$data['customer'] = $this->crud->SelectTable('tb_customer','nama');
			$data['capster'] = $this->crud->SelectTable('tb_capster','nama');
			$data['packet'] = $this->crud->SelectTable('paket','nama_paket');
			$this->load->view('dashboard',$data);	
		}
	
	}
	
	/* End of file dashboard.php */
	/* Location: ./application/controllers/dashboard.php */
?>