<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Packet extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('crud');
			if ($this->session->userdata('username') == '') {
				redirect('login','refresh');
			}
			$this->load->helper('file');
		}
	
		public function index() {
			$data['table'] = "active";
			$data['packtab'] = "active";
			$data['title'] = "BaperShop - Master Packet";
			$data['packet'] = $this->crud->SelectTable('paket','nama_paket');
			$this->load->view('packet/index',$data);
		}

		public function register() {
			$data['table'] = "active";
			$data['pack'] = "active";
			$data['title'] = "BaperShop - Packet Form";
			$data['code'] = $this->crud->getCode('paket','kode_paket');
			$this->load->view('packet/registration',$data);
		}

		public function edit($id) {
			$data['caps'] = "active";
			$data['title'] = "BaperShop - Customer Form Update";
			$where = array('id' => $id);
			$data['packetData'] = $this->crud->SelectTableWhere('paket',$where);
			$this->load->view('packet/update',$data);
		}

		public function create() {
			$nama = $this->input->post('nama');
			$deskripsi = $this->input->post('deskripsi');
			$harga = $this->input->post('harga');
			$jenis = $this->input->post('jenis');
			$kode = $this->input->post('kode');
			$file = basename($_FILES['gambar']['name']); //foto berbeda dengan form lain jadi harus menggunakan $_FILES

			if ($file == '') {
				echo "<script>alert('File not found!')</script>";
				redirect($this->agent->referrer()); // Kembali ke page sebelumnya
			}
			else{
				// pembuatan konfigurasi untuk upload
				$config['upload_path'] = './assets/images/gambar_paket/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg'; 
				$config['max_size']      = 0; // pengaturan size file upload
				$config['max_width']     = 0; // dibuat 0 agar unlimited, kali mau di batasi boleh
				$config['max_height']    = 0;
				$config['file_name'] = $file; //PEMBUATAN NAMA FILE DENGAN VARIABEL FILE

				// mendaftarkan konfigurasi
				$this->load->library('upload', $config) ;

				//begin validasi cek file upload sekaligus pemindahan file ke direktori tertentu
				if (!$this->upload->do_upload('gambar')){
					print_r ( $this->upload->display_errors()) ; // menampilkan pesan error
					exit ;
				}
				//end of validasi
				$data = array('nama_paket' => $nama,
							  'deskripsi' => $deskripsi,
							  'harga' => $harga,
							  'jenis' => $jenis,
							  'gambar' => $file,
							  'kode_paket' => $kode
							 );
				$this->crud->createData($data,'paket');
				redirect('packet/index','refresh');
			}
		}

		public function update() {
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
				$this->crud->updateData($data,'paket',$where);
				redirect('packet/index','refresh');
			}
			else{
				$config['upload_path'] = './assets/images/gambar_paket/';
				$config['allowed_types'] = 'gif|jpg|png'; 
				$config['max_size']      = 0; // pengaturan size file upload
				$config['max_width']     = 0; // 0 berarti tak terbatas
				$config['max_height']    = 0;
				$config['file_name'] = $file;
				$this->load->library('upload', $config) ;

				//begin validasi cek file upload 
				if (!$this->upload->do_upload('gambar')){
					print_r ( $this->upload->display_errors()) ;
					exit ;
				}
				//end of validasi
				$data = array('nama_paket' => $nama,
							  'deskripsi' => $deskripsi,
							  'harga' => $harga,
							  'jenis' => $jenis,
							  'gambar' => $file
							 );
				$where = array('id' => $id);
				$this->crud->updateData($data,'paket',$where);
				redirect('packet/index','refresh');
			}
		}

		public function delete($data,$column,$id) {
			if (unlink("./assets/images/gambar_paket/".$data)) {
				$this->crud->deleteData('paket',$column,$id);
				redirect($this->agent->referrer());
			}
		}
	
	}
	
	/* End of file packet.php */
	/* Location: ./application/controllers/packet.php */
?>