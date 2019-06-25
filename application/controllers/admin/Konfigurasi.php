<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		//Halaman ini Hanya boleh di akses admin, Jika Bukan Admin di alihkan
		if($this->session->userdata('akses_level') != 'Admin') {
			$this->session->set_flashdata('sukses', 'Oops.. Hak akses anda tidak mencukupi...');
			redirect(base_url('login'), 'refresh');
		}	
		//End proteksi
	}

	public function index()
	{
		$konfigurasi =	$this->konfigurasi_model->listing();

		//validasi
		$valid = $this->form_validation->set_rules('namaweb', 'Nama Website', 'required',
								array('required'	=> 'Nama Organisasi Atau Perusahaan Harus diisi'));

		if($valid->run() === FALSE) {

		$data = array( 'title'		 =>	'Konfigurasi Website: '.$konfigurasi->namaweb,
					   'konfigurasi' =>	$konfigurasi,
					   'isi'		 => 'admin/konfigurasi/list'
					);	 
		$this->load->view('admin/layout/wrapper', $data);
		//Masuk Database
		}else {
			$i = $this->input;
			$data = array(	'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
							'id_user'				=> $this->session->userdata('id_user'),
							'namaweb'				=> $i->post('namaweb'),
							'tagline'				=> $i->post('tagline'),
							'deskripsi'				=> $i->post('deskripsi'),
							'keywords'				=> $i->post('keywords'),
							'email'					=> $i->post('email'),
							'website'				=> $i->post('website'),
							'facebook'				=> $i->post('facebook'),
							'twitter'				=> $i->post('twitter'),
							'instagram'				=> $i->post('instagram'),
							'map'					=> $i->post('map'),
							'metatext'				=> $i->post('metatext'),
							'telepon'				=> $i->post('telepon'),
							'alamat'				=> $i->post('alamat'),
							'max_hari_peminjaman'	=> $i->post('max_hari_peminjaman'),
							'max_jumlah_peminjaman'	=> $i->post('max_jumlah_peminjaman'),
							'denda_perhari'			=> $i->post('denda_perhari')
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Konfigurasi Telah Diupdate');
			redirect(base_url('admin/konfigurasi'), 'refresh');
		}
		//End Masuk Database
	}

	//Konfigurasi Logo
	public function logo()
	{
		$konfigurasi =	$this->konfigurasi_model->listing();

		//validasi
		$valid = $this->form_validation->set_rules('id_konfigurasi', 'ID Konfigurasi', 'required',
								array('required'	=> 'ID Organisasi Atau Perusahaan Harus diisi'));

		if($valid->run()) {
				$config['upload_path']		= './assets/upload/image/';
				$config['allowed_types'] 	= 'jpg|jpeg|gif|png';
				$config['max_size'] 		= '12000'; //KB
				$this->upload->initialize($config);
				if(! $this->upload->do_upload('logo')) {

		$data = array( 'title'		 	 =>	'Konfigurasi logo Website: '.$konfigurasi->namaweb,
					   'konfigurasi'	 =>	$konfigurasi,
					   'error'		     => $this->upload->display_errors(),
					   'isi'		 	 => 'admin/konfigurasi/logo'
					);	 
		$this->load->view('admin/layout/wrapper', $data);
		//Masuk Database
		}else {
			//Upload
			$upload_data = array('uploads' => $this->upload->data());

				//image Editor
			$config['image_library']	 = 'gd2';
			$config['source_image'] 	 = './assets/upload/image/'.$upload_data['uploads']['file_name'];
			$config['new_image']		 = './assets/upload/image/thumbs/';
			$config['create_thumb']		 = TRUE;
			$config['quality']			 = '100%';
			$config['maintain_ratio']	 = TRUE;
			$config['width']			 = 360; //pixel
			$config['height']			 = 360; //pixel
			$config['x_axis']			 = 0;
			$config['y_axis']			 = 0;
			$config['thumb_marker']		 = '';
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			//Hapus gambar Lama
			if($konfigurasi->logo != "") {
				unlink('./assets/upload/image/'.$konfigurasi->logo);
			 	unlink('./assets/upload/image/thumbs/'.$konfigurasi->logo);
			}
			//End Hapus Gambar Lama

			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
							'id_user'			=> $this->session->userdata('id_user'),
							'logo'				=>  $upload_data['uploads']['file_name']
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Logo Telah Diupdate');
			redirect(base_url('admin/konfigurasi/logo'), 'refresh');
		}}
		//End Masuk Database
		$data = array( 'title'		 =>	'Konfigurasi logo Website: '.$konfigurasi->namaweb,
					   'konfigurasi' =>	$konfigurasi,
					   'isi'		 => 'admin/konfigurasi/logo'
					);	 
		$this->load->view('admin/layout/wrapper', $data);
	}

	//Konfigurasi Icon
	public function icon()
	{
		$konfigurasi =	$this->konfigurasi_model->listing();

		//validasi
		$valid = $this->form_validation->set_rules('id_konfigurasi', 'ID Konfigurasi', 'required',
								array('required'	=> 'ID Organisasi Atau Perusahaan Harus diisi'));

		if($valid->run()) {
				$config['upload_path']		= './assets/upload/image/';
				$config['allowed_types'] 	= 'jpg|jpeg|gif|png';
				$config['max_size'] 		= '12000'; //KB
				$this->upload->initialize($config);
				if(! $this->upload->do_upload('icon')) {

		$data = array( 'title'		 	 =>	'Konfigurasi icon Website: '.$konfigurasi->namaweb,
					   'konfigurasi'	 =>	$konfigurasi,
					   'error'		     => $this->upload->display_errors(),
					   'isi'		 	 => 'admin/konfigurasi/icon'
					);	 
		$this->load->view('admin/layout/wrapper', $data);
		//Masuk Database
		}else {
			//Upload
			$upload_data = array('uploads' => $this->upload->data());

				//image Editor
			$config['image_library']	 = 'gd2';
			$config['source_image'] 	 = './assets/upload/image/'.$upload_data['uploads']['file_name'];
			$config['new_image']		 = './assets/upload/image/thumbs/';
			$config['create_thumb']		 = TRUE;
			$config['quality']			 = '100%';
			$config['maintain_ratio']	 = TRUE;
			$config['width']			 = 360; //pixel
			$config['height']			 = 360; //pixel
			$config['x_axis']			 = 0;
			$config['y_axis']			 = 0;
			$config['thumb_marker']		 = '';
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			//Hapus gambar Lama
			if($konfigurasi->icon != "") {
				unlink('./assets/upload/image/'.$konfigurasi->icon);
			 	unlink('./assets/upload/image/thumbs/'.$konfigurasi->icon);
			}
			//End Hapus Gambar Lama

			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
							'id_user'			=> $this->session->userdata('id_user'),
							'icon'				=>  $upload_data['uploads']['file_name']
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'icon Telah Diupdate');
			redirect(base_url('admin/konfigurasi/icon'), 'refresh');
		}}
		//End Masuk Database
		$data = array( 'title'		 =>	'Konfigurasi icon Website: '.$konfigurasi->namaweb,
					   'konfigurasi' =>	$konfigurasi,
					   'isi'		 => 'admin/konfigurasi/icon'
					);	 
		$this->load->view('admin/layout/wrapper', $data);
	}
}
