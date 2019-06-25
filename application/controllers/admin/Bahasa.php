<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa extends CI_Controller {

	//Halaman Utama

	public function __construct()
	{
		parent::__construct();
		$this->load->model('bahasa_model');	
	}

	//Halaman Utama

	public function index()
	{
		$bahasa = $this->bahasa_model->listing();
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bahasa', 'Nama', 'required',
			array(
				'required' => 'Nama Harus Diisi'
			));

		$valid->set_rules('kode_bahasa', 'Bahasaname', 'required|is_unique[bahasa.kode_bahasa]',
			array(
				'required' 	=> 'Kode Bahasa Harus Diisi',
				'is_unique' => 'Kode Bahasa <strong>'.$this->input->post('kode_bahasa').'</strong sudah ada, Buat Kode Bahasa Buku baru'
			));

		if($valid->run() === false)
		{
			//End Validasi

			$data = array(
				'title' => 'Kelola Bahasa Buku',
				'bahasa' => $bahasa,
				'isi' 	=> 'admin/bahasa/list'
			);

			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array( 
				'kode_bahasa' 		=> $i->post('kode_bahasa'),
				'nama_bahasa' 		=> $i->post('nama_bahasa'),
				'keterangan' 		=> $i->post('keterangan'),
				'urutan'			=> $i->post('urutan')
			);
			$this->bahasa_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Bahasa Buku telah di tambah');
			redirect(base_url('admin/bahasa'), 'refresh');
		}
		// End Masuk database
	}

	//Halaman Edit
	public function edit($id_bahasa)
	{
		$bahasa = $this->bahasa_model->detail($id_bahasa);

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bahasa', 'Nama', 'required',
			array(
				'required' => 'Nama Harus Diisi'
			));

		if($valid->run() === false)
		{
			//End Validasi

			$data = array(
				'title' => 'Edit Bahasa: '.$bahasa->nama_bahasa,
				'bahasa' 	=> $bahasa,
				'isi' 	=> 'admin/bahasa/edit'
			);

			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;

			$data = array(
				'id_bahasa'			=> $id_bahasa,
				'kode_bahasa' 		=> $i->post('kode_bahasa'),
				'nama_bahasa' 		=> $i->post('nama_bahasa'),
				'keterangan' 		=> $i->post('keterangan'),
				'urutan'			=> $i->post('urutan')
			);
			
			$this->bahasa_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di update');
			redirect(base_url('admin/bahasa'), 'refresh');
		}
		// End Masuk database
	}

	public function delete($id_bahasa)
	{
		//proteksi hapus disini
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
		$this->session->set_flashdata('sukses', 'Silahkan Login Dahulu');
		redirect(base_url('login'), 'refresh');
		}
		//End Proteksi	
		$data = array(
			'id_bahasa' => $id_bahasa
		);
		$this->bahasa_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah Di Hapus');
		redirect(base_url('admin/bahasa'), 'refresh');	
	}
}
							
