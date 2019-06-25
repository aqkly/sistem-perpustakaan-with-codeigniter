<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	//Halaman Utama

	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_model');
		$this->load->model('jenis_model');
		$this->load->model('bahasa_model');
		$this->load->model('file_buku_model');	
	}

	public function index()
	{
		$buku = $this->buku_model->listing();

		$data = array(
			'title' 	=> 'Data Buku ('.count($buku).')',
			'buku' 		=> $buku,
			'isi' 		=> 'admin/buku/list'
		);

		$this->load->view('admin/layout/wrapper', $data);
	}

	//Halaman Tambah

	public function tambah()
	{
		$jenis  = $this->jenis_model->listing();
		$bahasa = $this->bahasa_model->listing();

		//validasi
		$valid  = $this->form_validation;

		$valid->set_rules('judul_buku', 'Judul Buku', 'required',
			array(
				'required' => 'Judul Buku Harus Diisi'
			));

		$valid->set_rules('penulis_buku', 'Penulis Buku', 'required',
			array(
				'required' => 'Penulis Buku Harus Diisi'
			));

		if($valid->run())
		{
			//Kalo cover di upload / Tidak Kosong
			if(!empty($_FILES['cover_buku']['name'])){

			$config['upload_path']		= './assets/upload/image';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|jpeg';
			$config['max_size'] 		= '12000'; //KB
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('cover_buku')) {

			//End Validasi

			$data = array(
				'title'  => 'Tambah Buku',
				'jenis'  => $jenis,
				'bahasa' => $bahasa,
				'error'  => $this->upload->display_error(),
				'isi' 	 => 'admin/buku/tambah'
			);

			$this->load->view('admin/layout/wrapper', $data);
			//Ga ada error, maka masuk database
		} else {

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

			//End Upload
			$i = $this->input;
			$data = array( 
				'id_user' 			=> $this->session->userdata('id_user'),
				'id_jenis' 			=> $i->post('id_jenis'),
				'id_bahasa' 		=> $i->post('id_bahasa'),
				'judul_buku' 		=> $i->post('judul_buku'),
				'penulis_buku'		=> $i->post('penulis_buku'),
				'subyek_buku' 		=> $i->post('subyek_buku'),
				'letak_buku' 		=> $i->post('letak_buku'),
				'kode_buku' 		=> $i->post('kode_buku'),
				'kolasi' 			=> $i->post('kolasi'),
				'penerbit' 			=> $i->post('penerbit'),
				'tahun_terbit' 		=> $i->post('tahun_terbit'),
				'nomor_seri' 		=> $i->post('nomor_seri'),
				'status_buku' 		=> $i->post('status_buku'),
				'ringkasan' 		=> $i->post('ringkasan'),
				'cover_buku' 		=> $upload_data['uploads']['file_name'],
				'jumlah_buku' 		=> $i->post('jumlah_buku'),
				'tanggal_entri' 	=> date('Y-m-d H:i:s')
			);
			$this->buku_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah di tambah');
			redirect(base_url('admin/buku'), 'refresh');
		}} else{
			//Script masukan data tanpa upload cover
			$i = $this->input;
			$data = array( 
				'id_user' 			=> $this->session->userdata('id_user'),
				'id_jenis' 			=> $i->post('id_jenis'),
				'id_bahasa' 		=> $i->post('id_bahasa'),
				'judul_buku' 		=> $i->post('judul_buku'),
				'penulis_buku'		=> $i->post('penulis_buku'),
				'subyek_buku' 		=> $i->post('subyek_buku'),
				'letak_buku' 		=> $i->post('letak_buku'),
				'kode_buku' 		=> $i->post('kode_buku'),
				'kolasi' 			=> $i->post('kolasi'),
				'penerbit' 			=> $i->post('penerbit'),
				'tahun_terbit' 		=> $i->post('tahun_terbit'),
				'nomor_seri' 		=> $i->post('nomor_seri'),
				'status_buku' 		=> $i->post('status_buku'),
				'ringkasan' 		=> $i->post('ringkasan'),
				'jumlah_buku' 		=> $i->post('jumlah_buku'),
				'tanggal_entri' 	=> date('Y-m-d H:i:s')
			);
			$this->buku_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah di tambah');
			redirect(base_url('admin/buku'), 'refresh');
		}}
		// End Masuk database
		$data = array(
				'title'  => 'Tambah Buku',
				'jenis'  => $jenis,
				'bahasa' => $bahasa,
				'isi' 	 => 'admin/buku/tambah'
			);

			$this->load->view('admin/layout/wrapper', $data);
	}

	//Halaman Edit
	public function edit($id_buku)
	{
		$buku 	= $this->buku_model->detail($id_buku);
		$jenis  = $this->jenis_model->listing();
		$bahasa = $this->bahasa_model->listing();

		//validasi
		$valid  = $this->form_validation;

		$valid->set_rules('judul_buku', 'Judul Buku', 'required',
			array(
				'required' => 'Judul Buku Harus Diisi'
			));

		$valid->set_rules('penulis_buku', 'Penulis Buku', 'required',
			array(
				'required' => 'Penulis Buku Harus Diisi'
			));

		if($valid->run())
		{
			//Kalo cover di upload / Tidak Kosong
			if(!empty($_FILES['cover_buku']['name'])){

			$config['upload_path']		= './assets/upload/image';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|jpeg';
			$config['max_size'] 		= '12000'; //KB
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('cover_buku')) {

			//End Validasi

			$data = array(
				'title'  => 'Edit Buku: '.$buku->judul_buku,
				'buku'	 => $buku,
				'jenis'  => $jenis,
				'bahasa' => $bahasa,
				'error'  => $this->upload->display_error(),
				'isi' 	 => 'admin/buku/edit'
			);

			$this->load->view('admin/layout/wrapper', $data);
			//Ga ada error, maka masuk database
		} else {

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

			//Jika upload cover buku, maka file cover lama harus di hapus
			 if($buku->cover_buku != "") {
			 	unlink('./assets/upload/image/'.$buku->cover_buku);
			 	unlink('./assets/upload/image/thumbs/'.$buku->cover_buku);
			 }

			//End Upload
			$i = $this->input;
			$data = array( 
				'id_buku'			=> $id_buku,
				'id_user' 			=> $this->session->userdata('id_user'),
				'id_jenis' 			=> $i->post('id_jenis'),
				'id_bahasa' 		=> $i->post('id_bahasa'),
				'judul_buku' 		=> $i->post('judul_buku'),
				'penulis_buku'		=> $i->post('penulis_buku'),
				'subyek_buku' 		=> $i->post('subyek_buku'),
				'letak_buku' 		=> $i->post('letak_buku'),
				'kode_buku' 		=> $i->post('kode_buku'),
				'kolasi' 			=> $i->post('kolasi'),
				'penerbit' 			=> $i->post('penerbit'),
				'tahun_terbit' 		=> $i->post('tahun_terbit'),
				'nomor_seri' 		=> $i->post('nomor_seri'),
				'status_buku' 		=> $i->post('status_buku'),
				'ringkasan' 		=> $i->post('ringkasan'),
				'cover_buku' 		=> $upload_data['uploads']['file_name'],
				'jumlah_buku' 		=> $i->post('jumlah_buku')
			);
			$this->buku_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('admin/buku'), 'refresh');
		}} else{
			//Script masukan data tanpa upload cover
			$i = $this->input;
			$data = array( 
				'id_buku'			=> $id_buku,
				'id_user' 			=> $this->session->userdata('id_user'),
				'id_jenis' 			=> $i->post('id_jenis'),
				'id_bahasa' 		=> $i->post('id_bahasa'),
				'judul_buku' 		=> $i->post('judul_buku'),
				'penulis_buku'		=> $i->post('penulis_buku'),
				'subyek_buku' 		=> $i->post('subyek_buku'),
				'letak_buku' 		=> $i->post('letak_buku'),
				'kode_buku' 		=> $i->post('kode_buku'),
				'kolasi' 			=> $i->post('kolasi'),
				'penerbit' 			=> $i->post('penerbit'),
				'tahun_terbit' 		=> $i->post('tahun_terbit'),
				'nomor_seri' 		=> $i->post('nomor_seri'),
				'status_buku' 		=> $i->post('status_buku'),
				'ringkasan' 		=> $i->post('ringkasan'),
				'jumlah_buku' 		=> $i->post('jumlah_buku')
			);
			$this->buku_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('admin/buku'), 'refresh');
		}}
		// End Masuk database
		$data = array(
				'title'  => 'Edit Buku: '.$buku->judul_buku,
				'buku'	 => $buku,
				'jenis'  => $jenis,
				'bahasa' => $bahasa,
				'isi' 	 => 'admin/buku/edit'
			);

			$this->load->view('admin/layout/wrapper', $data);
	}

	public function delete($id_buku)
	{
		//proteksi hapus disini
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
		$this->session->set_flashdata('sukses', 'Silahkan Login Dahulu');
		redirect(base_url('login'), 'refresh');
		}
		//End Proteksi	

		//Delete Gambar
		$buku = $this->buku_model->detail($id_buku);

		if($buku->cover_buku != ""){
			unlink('./assets/upload/image/'.$buku->cover_buku);
			unlink('./assets/upload/image/thumbs/'.$buku->cover_buku);
		}
		//End Delete Gambar

		$data = array(
			'id_buku' => $id_buku
		);
		$this->buku_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah Di Hapus');
		redirect(base_url('admin/buku'), 'refresh');	
	}
}
							
