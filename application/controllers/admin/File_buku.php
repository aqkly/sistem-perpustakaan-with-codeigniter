<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_buku extends CI_Controller {

	//Halaman Utama

	public function __construct()
	{
		parent::__construct();
		$this->load->model('file_buku_model');
		$this->load->model('buku_model');	
	}

	//Halaman Utama
	public function index()
	{
		$file_buku = $this->file_buku_model->listing();

		$data = array(
			'title' 			=> 'Data File Buku ('.count($file_buku).')',
			'file_buku' 		=> $file_buku,
			'isi' 				=> 'admin/file_buku/list'
		);

		$this->load->view('admin/layout/wrapper', $data);
	}

	//Unduh File
	public function unduh($id_file_buku) 
	{
		$file_buku 	= $this->file_buku_model->detail($id_file_buku);
		//proses download
		$folder		= './assets/upload/files/';
		$file 		= $file_buku->nama_file;
		force_download($folder.$file, NULL);
	}

	//Kelola file buku
	public function kelola($id_buku)
	{
		$file_buku = $this->file_buku_model->buku($id_buku);
		$buku = $this->buku_model->detail($id_buku);

		//validasi
		$valid  = $this->form_validation;

		$valid->set_rules('judul_file', 'Judul File', 'required',
			array(
				'required' => 'Judul File Harus Diisi'
			));


		if($valid->run())
		{
			$config['upload_path']		= './assets/upload/files/';
			$config['allowed_types'] 	= 'pdf|docx|xls|xlsx|ppt|pptx';
			$config['max_size'] 		= '12000'; //KB
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('nama_file')) {

			//End Validasi

		$data = array(
			'title' 			=> 'Data File Buku: '.$buku->judul_buku.' ('.count($file_buku).')',
			'file_buku' 		=> $file_buku,
			'buku'				=> $buku,
			'error'				=> $this->upload->display_errors(),
			'isi' 				=> 'admin/file_buku/list'
		);

		$this->load->view('admin/layout/wrapper', $data);

		//Ga ada error, maka masuk database
		} else {

			//Upload
			$upload_data = array('uploads' => $this->upload->data());
			
			//End Upload
			$i = $this->input;
			$data = array( 
				'id_user' 			=> $this->session->userdata('id_user'),
				'id_buku' 			=> $id_buku,
				'judul_file' 		=> $i->post('judul_file'),
				'nama_file' 		=> $upload_data['uploads']['file_name'],
				'keterangan'		=> $i->post('keterangan'),
				'urutan'			=> $i->post('urutan')
				
			);
			$this->file_buku_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah di tambah');
			redirect(base_url('admin/file_buku/kelola/'.$id_buku), 'refresh');
		}}
		// End Masuk database
		$data = array(
			'title' 			=> 'Data File Buku: '.$buku->judul_buku.' ('.count($file_buku).')',
			'file_buku' 		=> $file_buku,
			'buku'				=> $buku,
			'isi' 				=> 'admin/file_buku/list'
		);

		$this->load->view('admin/layout/wrapper', $data);
	}

	
	//Halaman Edit
	public function edit($id_file_buku)
	{
		$file_buku = $this->file_buku_model->detail($id_file_buku);
		$id_buku = $file_buku->id_buku;
		$buku = $this->buku_model->detail($id_buku);

		//validasi
		$valid  = $this->form_validation;

		$valid->set_rules('judul_file', 'Judul File', 'required',
			array(
				'required' => 'Judul File Harus Diisi'
			));


		if($valid->run())
		{
			if(!empty($_FILES['nama_file']['name'])) {

				$config['upload_path']		= './assets/upload/files/';
				$config['allowed_types'] 	= 'pdf|docx|xls|xlsx|ppt|pptx';
				$config['max_size'] 		= '12000'; //KB
				$this->upload->initialize($config);
				if(! $this->upload->do_upload('nama_file')) {

			//End Validasi

		$data = array(
			'title' 			=> 'Edit File Buku: '.$buku->judul_buku.' ('.count($file_buku).')',
			'file_buku' 		=> $file_buku,
			'buku'				=> $buku,
			'error'				=> $this->upload->display_errors(),
			'isi' 				=> 'admin/file_buku/edit'
		);

		$this->load->view('admin/layout/wrapper', $data);

		//Ga ada error, maka masuk database
		} else {

			//Upload
			$upload_data = array('uploads' => $this->upload->data());

			//Hapus file Lama
			unlink('./assets/upload/files/'.$file_buku->nama_file);
			//End Hapus File Lama
			
			//End Upload
			$i = $this->input;
			$data = array( 
				'id_file_buku'		=> $id_file_buku,
				'id_user' 			=> $this->session->userdata('id_user'),
				'id_buku' 			=> $id_buku,
				'judul_file' 		=> $i->post('judul_file'),
				'nama_file' 		=> $upload_data['uploads']['file_name'],
				'keterangan'		=> $i->post('keterangan'),
				'urutan'			=> $i->post('urutan')
				
			);
			$this->file_buku_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di tambah');
			redirect(base_url('admin/file_buku/kelola/'.$id_buku), 'refresh');
		}} else {
			$i = $this->input;
			$data = array( 
				'id_file_buku'		=> $id_file_buku,
				'id_user' 			=> $this->session->userdata('id_user'),
				'id_buku' 			=> $id_buku,
				'judul_file' 		=> $i->post('judul_file'),
				'keterangan'		=> $i->post('keterangan'),
				'urutan'			=> $i->post('urutan')
				
			);
			$this->file_buku_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di edit');
			redirect(base_url('admin/file_buku/kelola/'.$id_buku), 'refresh');
		}}
		// End Masuk database
		$data = array(
			'title' 			=> 'Edit File Buku: '.$buku->judul_buku.' ('.count($file_buku).')',
			'file_buku' 		=> $file_buku,
			'buku'				=> $buku,
			'isi' 				=> 'admin/file_buku/edit'
		);

		$this->load->view('admin/layout/wrapper', $data);	
	}

	public function delete($id_file_buku, $id_buku)
	{
		//proteksi hapus disini
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
		$this->session->set_flashdata('sukses', 'Silahkan Login Dahulu');
		redirect(base_url('login'), 'refresh');
		}
		//End Proteksi	

		//Delete Gambar
		$file_buku = $this->file_buku_model->detail($id_file_buku);

		if($file_buku->nama_file != ""){
			unlink('./assets/upload/files/'.$file_buku->nama_file);
		}
		//End Delete Gambar

		$data = array(
			'id_file_buku' => $id_file_buku
		);
		$this->file_buku_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah Di Hapus');
		redirect(base_url('admin/file_buku/kelola/'.$id_buku), 'refresh');	
	}
}
							
