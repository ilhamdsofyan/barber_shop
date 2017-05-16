<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Con_main extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('mod_main');
			if ($this->session->userdata('username') == '') {
				redirect('con_login/index','refresh');
			}
		}

		public function index() {
			$data['dashboard'] = "active";
			$data['title'] = "BaperShop - Dashboard";
			$data['customer'] = $this->mod_main->SelectTable('tb_customer','nama');
			$data['capster'] = $this->mod_main->SelectTable('tb_capster','nama');
			$data['packet'] = $this->mod_main->SelectTable('paket','nama_paket');
			$this->load->view('dashboard',$data);
		}

		public function statistic() {
			$data['statistic'] = "active";
			$data['title'] = "BaperShop - Statistic";
			$this->load->view('statistic',$data);
		}

		public function customer() {
			$data['table'] = "active";
			$data['custab'] = "active";
			$data['title'] = "BaperShop - Master Customer";
			$data['customer'] = $this->mod_main->SelectTable('tb_customer','nama');
			$this->load->view('customer',$data);
		}

		public function capster() {
			$data['table'] = "active";
			$data['capstab'] = "active";
			$data['title'] = "BaperShop - Master Capster";
			$data['capster'] = $this->mod_main->SelectTable('tb_capster','nama');
			$this->load->view('capster',$data);
		}

		public function packet() {
			$data['table'] = "active";
			$data['packtab'] = "active";
			$data['title'] = "BaperShop - Master Packet";
			$data['packet'] = $this->mod_main->SelectTable('paket','nama_paket');
			$this->load->view('packet',$data);
		}

		public function customer_form() {
			$data['form'] = "active";
			$data['cust'] = "active";
			$data['title'] = "BaperShop - Customer Form";
			$this->load->view('form/customer',$data);
		}

		public function capster_form() {
			$data['table'] = "active";
			$data['caps'] = "active";
			$data['title'] = "BaperShop - Capster Form";
			$this->load->view('form/capster',$data);
		}

		public function packet_form() {
			$data['table'] = "active";
			$data['pack'] = "active";
			$data['title'] = "BaperShop - Packet Form";
			$this->load->view('form/paket',$data);
		}

		public function delete($table,$column,$id) {
			$this->mod_main->deleteData($table,$column,$id);
			redirect($this->agent->referrer());
		}

		public function create_capster() {
			$nama = $this->input->post('nama');
			$gaji = $this->input->post('salary');
			$kontak = $this->input->post('kontak');

			$data = array('nama' => $nama,
						  'salary' => $gaji,
						  'kontak' => $kontak
						 );
			$this->mod_main->createData($data,'tb_capster');
			redirect('con_main/capster','refresh');
		}

		public function capdate($id) {
			$data['caps'] = "active";
			$data['title'] = "BaperShop - Capster Form Update";
			$where = array('id' => $id);
			$data['capsterData'] = $this->mod_main->SelectTableWhere('tb_capster',$where);
			$this->load->view('form/capdate',$data);
		}

		public function update_capster() {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$gaji = $this->input->post('salary');
			$kontak = $this->input->post('kontak');

			$data = array('nama' => $nama,
						  'salary' => $gaji,
						  'kontak' => $kontak
						 );

			$where = array('id' => $id);
			$this->mod_main->updateData($data,'tb_capster',$where);
			redirect('con_main/capster','refresh');
		}

		public function create_customer() {
			$nama = $this->input->post('nama');
			$telepon = $this->input->post('telepon');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');

			$data = array('nama' => $nama,
						  'telepon' => $telepon,
						  'email' => $email,
						  'alamat' => $alamat
						 );
			$this->mod_main->createData($data,'tb_customer');
			redirect('con_main/customer','refresh');
		}

		public function cusdate($id) {
			$data['caps'] = "active";
			$data['title'] = "BaperShop - Customer Form Update";
			$where = array('id' => $id);
			$data['customerData'] = $this->mod_main->SelectTableWhere('tb_customer',$where);
			$this->load->view('form/cusdate',$data);
		}

		public function update_customer() {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$telepon = $this->input->post('telepon');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');

			$data = array('nama' => $nama,
						  'telepon' => $telepon,
						  'email' => $email,
						  'alamat' => $alamat
						 );

			$where = array('id' => $id);
			$this->mod_main->updateData($data,'tb_customer',$where);
			redirect('con_main/customer','refresh');
		}

		public function create_packet() {
			$nama = $this->input->post('nama');
			$deskripsi = $this->input->post('deskripsi');
			$harga = $this->input->post('harga');
			$jenis = $this->input->post('jenis');
			$file = basename($_FILES['gambar']['name']);
			$extension = pathinfo($file, PATHINFO_EXTENSION);
			// $namafile = str_replace(' ', '_', strtolower($nama)).'.'.$extension;

			if ($file == '') {
				echo "<script>alert('File not found!')</script>";
				redirect($this->agent->referrer());
			}
			else{
				$config['upload_path'] = './assets/images/gambar_paket/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
				$config['max_size'] = '1000';
				$config['max_width'] = '1024'; 
				$config['max_height'] = '900';
				$config['file_name'] = $file;
		        $this->load->library('upload', $config);
		        $this->upload->do_upload('gambar');

				$data = array('nama_paket' => $nama,
							  'deskripsi' => $deskripsi,
							  'harga' => $harga,
							  'jenis' => $jenis,
							  'gambar' => $file
							 );
				$this->mod_main->createData($data,'paket');
				redirect('con_main/packet','refresh');
			}
		}

		public function pacdate($id) {
			$data['caps'] = "active";
			$data['title'] = "BaperShop - Customer Form Update";
			$where = array('id' => $id);
			$data['packetData'] = $this->mod_main->SelectTableWhere('paket',$where);
			$this->load->view('form/pakdate',$data);
		}

		public function update_packet() {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$deskripsi = $this->input->post('deskripsi');
			$harga = $this->input->post('harga');
			$jenis = $this->input->post('jenis');
			$file = basename($_FILES['gambar']['name']);
			// $extension = pathinfo($file, PATHINFO_EXTENSION);
			// $namafile = str_replace(' ', '_', strtolower($nama)).'.'.$extension;

			if ($file == '') {
				$data = array('nama_paket' => $nama,
							  'deskripsi' => $deskripsi,
							  'harga' => $harga,
							  'jenis' => $jenis
							 );
				$where = array('id' => $id);
				$this->mod_main->updateData($data,'paket',$where);
				redirect('con_main/packet','refresh');
			}
			else{
				$config['upload_path'] = './assets/images/gambar_paket/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
				$config['max_size'] = '1000';
				$config['max_width'] = '1024'; 
				$config['max_height'] = '900';
				$config['file_name'] = $file;
		        $this->load->library('upload', $config);
		        $this->upload->do_upload('gambar');

				$data = array('nama_paket' => $nama,
							  'deskripsi' => $deskripsi,
							  'harga' => $harga,
							  'jenis' => $jenis,
							  'gambar' => $file
							 );
				$where = array('id' => $id);
				$this->mod_main->updateData($data,'paket',$where);
				redirect('con_main/packet','refresh');
			}
		}
	
	}
?>