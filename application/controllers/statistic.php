<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Statistic extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('crud');
			if ($this->session->userdata('username') == '') {
				redirect('login','refresh');
			}
		}
	
		public function index()
		{
			$data['statistic'] = 'active';
			$this->load->view('statistic/index', $data);
		}
	
	}
	
	/* End of file statistic.php */
	/* Location: ./application/controllers/statistic.php */
?>