<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	//Halaman Utama

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jenis_model');	
	}

	//Halaman Utama

	public function index()
	{
		$jenis = $this->jenis_model->listing();
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis', 'Nama', 'required',
			array(
				'required' => 'Nama Harus Diisi'
			));

		$valid->set_rules('kode_jenis', 'Jenisname', 'required|is_unique[jenis.kode_jenis]',
			array(
				'required' 	=> 'Kode Jenis Harus Diisi',
				'is_unique' => 'Kode Jenis <strong>'.$this->input->post('kode_jenis').'</strong sudah ada, Buat Kode Jenis Buku baru'
			));

		if($valid->run() === false)
		{
			//End Validasi

			$data = array(
				'title' => 'Kelola Jenis Buku',
				'jenis' => $jenis,
				'isi' 	=> 'admin/jenis/list'
			);

			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array( 
				'kode_jenis' 		=> $i->post('kode_jenis'),
				'nama_jenis' 		=> $i->post('nama_jenis'),
				'keterangan' 		=> $i->post('keterangan'),
				'urutan'			=> $i->post('urutan')
			);
			$this->jenis_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Jenis Buku telah di tambah');
			redirect(base_url('admin/jenis'), 'refresh');
		}
		// End Masuk database
	}

	//Halaman Edit
	public function edit($id_jenis)
	{
		$jenis = $this->jenis_model->detail($id_jenis);

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis', 'Nama', 'required',
			array(
				'required' => 'Nama Harus Diisi'
			));

		if($valid->run() === false)
		{
			//End Validasi

			$data = array(
				'title' => 'Edit Jenis: '.$jenis->nama_jenis,
				'jenis' 	=> $jenis,
				'isi' 	=> 'admin/jenis/edit'
			);

			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;

			$data = array(
				'id_jenis'			=> $id_jenis,
				'kode_jenis' 		=> $i->post('kode_jenis'),
				'nama_jenis' 		=> $i->post('nama_jenis'),
				'keterangan' 		=> $i->post('keterangan'),
				'urutan'			=> $i->post('urutan')
			);
			
			$this->jenis_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di update');
			redirect(base_url('admin/jenis'), 'refresh');
		}
		// End Masuk database
	}

	public function delete($id_jenis)
	{
		//proteksi hapus disini
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
		$this->session->set_flashdata('sukses', 'Silahkan Login Dahulu');
		redirect(base_url('login'), 'refresh');
		}
		//End Proteksi	
		$data = array(
			'id_jenis' => $id_jenis
		);
		$this->jenis_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah Di Hapus');
		redirect(base_url('admin/jenis'), 'refresh');	
	}
}
							
