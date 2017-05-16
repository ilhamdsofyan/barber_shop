<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Crud extends CI_Model {
		//READ
		public function SelectTable($table,$sort) {
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($sort, 'asc');

			$data = $this->db->get();
			return $data->result_array();
		}

		//READ PARAM
		public function SelectTableWhere($table,$id) {
			$this->db->where($id);
			$this->db->select('*');
			$this->db->from($table);

			$data = $this->db->get();
			return $data->result_array();
		}

		//DELETE
		public function deleteData($table,$column,$id) {
			$this->db->where($column,$id);
			$this->db->delete($table);
		}

		//CREATE
		public function createData($data = null,$table) {
			if ($data != null) {
				$this->db->insert($table, $data);
				if ($this->db->affected_rows() > 0) {
					return true;
				} else {
					echo "Gagal";
					return false;
				}
			}
		}

		//UPDATE
		public function updateData($data,$table,$where) {
			$this->db->where($where);
			$this->db->update($table, $data);
		}

		//Show Only Code
		public function getCode($table,$select) {
			$this->db->select($select);
			$this->db->from($table);
			$this->db->order_by('id', 'desc');
			$this->db->limit(1);

			$data = $this->db->get();
			return $data->result_array();
		}
	}
?>