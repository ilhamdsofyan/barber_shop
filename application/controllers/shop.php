<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('shop_head_model');
	}

	public function index() {
		$data['transaction'] = "active";
		$data['title'] = "BaperShop - Shopping";
		$this->load->view('shop/shopping',$data);
	}

	public function order() {
		$data['title'] = "BaperShop - Order";
		$data["customer"] = $this->shop_head_model->getCustomerCode();
		$data["capster"] = $this->shop_head_model->getCapsterCode();
		$data["product"] = $this->shop_head_model->getProduct();
		$this->load->view('shop/orders',$data);
	}

	public function getDataCustomer($kode) {
		$where = array("kode" => $kode);
		$data = $this->shop_head_model->selectCustomer($where);

		echo json_encode($data);
	}

	public function getDataCapster($kode) {
		$where = array("kode" => $kode);
		$data = $this->shop_head_model->selectCapster($where);

		echo json_encode($data);
	}

	public function getDataProduct($code) {
		$where = array('kode_paket' => $code);
		$data = $this->shop_head_model->selectPacket($where);

		echo json_encode($data);
	}

	public function saveOrder() {
		$kode_header = $this->shop_head_model->getShopCode();

		//POST Header
		$customer = $this->input->post('kode_customer');
		$capster = $this->input->post('kode_capster');
		$date = date("Y/m/d");
		$total = $this->input->post('subtot');

		$data_header = array(
				"shop_code" => $kode_header,
				"kode_capster" => $capster,
				"kode_customer" => $customer,
				"shop_date" => $date,
				"total" => $total
				);

		//POST Detail
		$data_detail = $this->input->post('Detail');

		//save header
		$this->db->insert('shop_header', $data_header);

		//save detail
		foreach ($data_detail as $detail) {
			$detail['shop_head_id'] = $kode_header;
			$this->db->insert('shop_detail', $detail);
		}
		
		echo "<script>alert('Your order have been saved!');location.href='".redirect('dashboard','refresh')."'</script>";
	}

}

/* End of file shop.php */
/* Location: ./application/controllers/shop.php */
