<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	//Halaman Utama

	public function __construct()
	{
		parent::__construct();
		$this->load->model('anggota_model');	
	}

	public function index()
	{
		$anggota = $this->anggota_model->listing();

		$data = array(
			'title' 	=> 'Data Anggota ('.count($anggota).')',
			'anggota' 		=> $anggota,
			'isi' 		=> 'admin/anggota/list'
		);

		$this->load->view('admin/layout/wrapper', $data);
	}

	//Halaman Tambah

	public function tambah()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota', 'Nama Anggota', 'required',
			array(
				'required' => 'Nama Harus Diisi'
			));

		$valid->set_rules('email', 'E-mail', 'required|valid_email',
			array(
				'required'	 => 'E-mail Harus Diisi',
				'valid_email' => 'Format E-mail tidak benar'
			));

		$valid->set_rules('username', 'Username', 'required|is_unique[anggota.username]',
			array(
				'required' 	=> 'Username Harus Diisi',
				'is_unique' => 'Username <strong>'.$this->input->post('username').'</strong sudah ada, Buat Username baru'
			));

		$valid->set_rules('password', 'Password', 'required|min_length[6]',
			array(
				'required' 		=> 'Password Harus Diisi',
				'min_length'	=> 'Password Minimal 6 Karakter'
			));

		if($valid->run() === false)
		{
			//End Validasi

			$data = array(
				'title' => 'Tambah Anggota',
				'isi' 	=> 'admin/anggota/tambah'
			);

			$this->load->view('admin/layout/wrapper', $data);
			//ga ada errot, maka masuk database
		} else {
			$i = $this->input;
			$data = array(
				'id_user'			=> $this->session->userdata('id_user'),
				'status_anggota' 	=> $i->post('status_anggota'),
				'nama_anggota' 		=> $i->post('nama_anggota'),
				'email' 			=> $i->post('email'),
				'telepon' 			=> $i->post('telepon'),
				'instansi' 			=> $i->post('instansi'),
				'username' 			=> $i->post('username'),
				'password' 			=> sha1($i->post('password'))
				
			);
			$this->anggota_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah di tambah');
			redirect(base_url('admin/anggota'), 'refresh');
		}
		// End Masuk database
	}

	//Halaman Edit
	public function edit($id_anggota)
	{
		$anggota = $this->anggota_model->detail($id_anggota);

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota', 'Nama', 'required',
			array(
				'required' => 'Nama Harus Diisi'
			));

		$valid->set_rules('email', 'E-mail', 'required|valid_email',
			array(
				'required'	 => 'E-mail Harus Diisi',
				'valid_email' => 'Format E-mail tidak benar'
			));

		if($valid->run() === false)
		{
			//End Validasi

			$data = array(
				'title' => 'Edit Anggota: '.$anggota->nama_anggota,
				'anggota' 	=> $anggota,
				'isi' 	=> 'admin/anggota/edit'
			);

			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;

			//jika input pass > 6 karakter
			if(strlen($i->post('password')) >= 6) {
					$data = array(
						'id_anggota'		=> $id_anggota, 
						'id_user'			=> $this->session->userdata('id_user'),
						'status_anggota' 	=> $i->post('status_anggota'),
						'nama_anggota' 		=> $i->post('nama_anggota'),
						'email' 			=> $i->post('email'),
						'telepon' 			=> $i->post('telepon'),
						'instansi' 			=> $i->post('instansi'),
						'password' 			=> sha1($i->post('password'))
				);
			} else {
					$data = array(
					'id_anggota'		=> $id_anggota, 
					'id_user'			=> $this->session->userdata('id_user'),
					'status_anggota' 	=> $i->post('status_anggota'),
					'nama_anggota' 		=> $i->post('nama_anggota'),
					'email' 			=> $i->post('email'),
					'telepon' 			=> $i->post('telepon'),
					'instansi' 			=> $i->post('instansi')
				);
			}
			$this->anggota_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di update');
			redirect(base_url('admin/anggota'), 'refresh');
		}
		// End Masuk database
	}

	public function delete($id_anggota)
	{
		//proteksi hapus disini
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
		$this->session->set_flashdata('sukses', 'Silahkan Login Dahulu');
		redirect(base_url('login'), 'refresh');
		}
		//End Proteksi	
		$data = array(
			'id_anggota' => $id_anggota
		);
		$this->anggota_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah Di Hapus');
		redirect(base_url('admin/anggota'), 'refresh');	
	}
}
							
