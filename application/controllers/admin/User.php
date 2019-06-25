<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//Halaman Utama

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');	
	}

	public function index()
	{
		$user = $this->user_model->listing();

		$data = array(
			'title' 	=> 'Data User ('.count($user).')',
			'user' 		=> $user,
			'isi' 		=> 'admin/user/list'
		);

		$this->load->view('admin/layout/wrapper', $data);
	}

	//Halaman Tambah

	public function tambah()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama', 'required',
			array(
				'required' => 'Nama Harus Diisi'
			));

		$valid->set_rules('email', 'E-mail', 'required|valid_email',
			array(
				'required'	 => 'E-mail Harus Diisi',
				'valid_email' => 'Format E-mail tidak benar'
			));

		$valid->set_rules('username', 'Username', 'required|is_unique[user.username]',
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
				'title' => 'Tambah User',
				'isi' 	=> 'admin/user/tambah'
			);

			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array( 
				'nama' 			=> $i->post('nama'),
				'email' 		=> $i->post('email'),
				'username' 		=> $i->post('username'),
				'password' 		=> sha1($i->post('password')),
				'akses_level'	=> $i->post('akses_level'),
				'keterangan' 	=> $i->post('keterangan')
			);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah di tambah');
			redirect(base_url('admin/user'), 'refresh');
		}
		// End Masuk database
	}

	//Halaman Edit
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama', 'required',
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
				'title' => 'Edit User: '.$user->nama,
				'user' 	=> $user,
				'isi' 	=> 'admin/user/edit'
			);

			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;

			//jika input pass > 6 karakter
			if(strlen($i->post('password')) >= 6) {
					$data = array(
						'id_user'		=> $id_user, 
						'nama' 			=> $i->post('nama'),
						'email' 		=> $i->post('email'),
						'password' 		=> sha1($i->post('password')),
						'akses_level'	=> $i->post('akses_level'),
						'keterangan' 	=> $i->post('keterangan')
				);
			} else {
					$data = array(
					'id_user'		=> $id_user, 
					'nama' 			=> $i->post('nama'),
					'email' 		=> $i->post('email'),
					'akses_level'	=> $i->post('akses_level'),
					'keterangan' 	=> $i->post('keterangan')
				);
			}
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di update');
			redirect(base_url('admin/user'), 'refresh');
		}
		// End Masuk database
	}

	public function delete($id_user)
	{
		//proteksi hapus disini
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
		$this->session->set_flashdata('sukses', 'Silahkan Login Dahulu');
		redirect(base_url('login'), 'refresh');
		}
		//End Proteksi	
		$data = array(
			'id_user' => $id_user
		);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah Di Hapus');
		redirect(base_url('admin/user'), 'refresh');	
	}
}
							
