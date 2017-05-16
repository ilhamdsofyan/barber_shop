<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Customer extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('crud');
			if ($this->session->userdata('username') == '') {
				redirect('login','refresh');
			}
		}

		public function index() {
			$data['table'] = "active";
			$data['custab'] = "active";
			$data['title'] = "BaperShop - Master Customer";
			$data['customer'] = $this->crud->SelectTable('tb_customer','nama');
			$this->load->view('customer/index',$data);
		}

		public function register() {
			$data['form'] = "active";
			$data['cust'] = "active";
			$data['title'] = "BaperShop - Customer Form";
			$data['code'] = $this->crud->getCode('tb_customer','kode');
			$this->load->view('customer/registration',$data);
		}

		public function edit($id) {
			$data['caps'] = "active";
			$data['title'] = "BaperShop - Customer Form Update";
			$where = array('id' => $id);
			$data['customerData'] = $this->crud->SelectTableWhere('tb_customer',$where);
			$this->load->view('customer/update',$data);
		}

		public function create() {
			$data['customer'] = $this->input->post('Customer');
			$save = $this->crud->createData($data['customer'],'tb_customer');

			if ($save) {
				redirect('customer/index','refresh');
			}
		}

		public function update($id) {
			$data = $this->input->post('Customer');

			$where = array('id' => $id);
			$this->crud->updateData($data,'tb_customer',$where);
			redirect('customer/index','refresh');
		}

		public function delete($table,$column,$id) {
			$this->crud->deleteData($table,$column,$id);
			redirect($this->agent->referrer());
		}
	
	}
	
	/* End of file customer.php */
	/* Location: ./application/controllers/customer.php */
?>