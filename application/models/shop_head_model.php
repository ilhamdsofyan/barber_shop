<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_head_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table_header = "shop_header";
	}

	public function FunctionName($value='') {
		$this->db->from('shop_header');
		$this->db->order_by('id', 'desc');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function getCustomerCode() {
		$this->db->select('kode, nama');
		$this->db->from('tb_customer');
		$sql = $this->db->get();

		$dc[''] = " - Please Select Customer - ";
		if ($sql->num_rows() > 0) {
			foreach ($sql->result_array() as $key) {
				$dc[$key["kode"]] = $key["kode"]." - ".$key["nama"];
			}
			return $dc;
		}
	}

	public function selectCustomer($param) {
		$this->db->from('tb_customer');
		$this->db->where($param);
		$data = $this->db->get();
		return $data->result_array();
	}

	public function getCapsterCode() {
		$this->db->select('kode, nama');
		$this->db->from('tb_capster');
		$sql = $this->db->get();

		$dc[''] = " - Please Select Capster - ";
		if ($sql->num_rows() > 0) {
			foreach ($sql->result_array() as $key) {
				$dc[$key["kode"]] = $key["kode"]." - ".$key["nama"];
			}
			return $dc;
		}
	}

	public function getProduct() {
		$this->db->select('kode_paket, nama_paket');
		$this->db->from('paket');
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function selectCapster($param) {
		$this->db->from('tb_capster');
		$this->db->where($param);
		$data = $this->db->get();
		return $data->result_array();
	}

	public function selectPacket($code) {
		$data = $this->db->get_where("paket", $code);
		return $data->result_array();
	}

	public function getShopCode() {
		$data = $this->db->get('shop_header');

		$count = $data->num_rows() + 1;
		if ($count < 10) {
			$code = "SHO-00".$count;
		} elseif ($count < 100) {
			$code = "SHO-0".$count;
		} else {
			$code = "SHO-".$count;
		}

		return $code;
	}
}

/* End of file shop_head_model.php */
/* Location: ./application/models/shop_head_model.php */