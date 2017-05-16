<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Capster extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('crud');
			if ($this->session->userdata('username') == '') {
				redirect('login','refresh');
			}
		}
	
		public function index() {
			$data['table'] = "active";
			$data['capstab'] = "active";
			$data['title'] = "BaperShop - Master Capster";
			$data['capster'] = $this->crud->SelectTable('tb_capster','nama');
			$this->load->view('capster/index',$data);
		}

		public function register() {
			$data['table'] = "active";
			$data['caps'] = "active";
			$data['title'] = "BaperShop - Capster Form";
			$data['code'] = $this->crud->getCode('tb_capster','kode');
			$this->load->view('capster/registration',$data);
		}

		public function edit($id) {
			$data['caps'] = "active";
			$data['title'] = "BaperShop - Capster Form Update";
			$where = array('id' => $id);
			$data['capsterData'] = $this->crud->SelectTableWhere('tb_capster',$where);
			$this->load->view('capster/update',$data);
		}

		public function create(){
			$data = $this->input->post('Capster');
			$this->crud->createData($data,'tb_capster');
			redirect('capster','refresh');
		}

		public function update($id) {
			$data = $this->input->post('Capster');

			$where = array('id' => $id);
			$this->crud->updateData($data,'tb_capster',$where);
			redirect('capster','refresh');
		}

		public function delete($table,$column,$id) {
			$this->crud->deleteData($table,$column,$id);
			redirect($this->agent->referrer());
		}
	
	}
	
	/* End of file capster.php */
	/* Location: ./application/controllers/capster.php */
?>