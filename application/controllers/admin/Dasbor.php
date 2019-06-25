<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');	
	}

	public function index()
	{
		$data = array('title' => 'Halaman Dashboard',
					  'isi' => 'admin/dasbor/list'
				);

		$this->load->view('admin/layout/wrapper', $data);
	}

	//Profile
	public function profile()
	{
		$id_user = $this->session->userdata('id_user');
		$user 	 = $this->user_model->detail($id_user);

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
				'title' => 'Update Profile: '.$user->nama,
				'user' 	=> $user,
				'isi' 	=> 'admin/dasbor/profile'
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
			$this->session->set_flashdata('sukses', 'Profile telah di update');
			redirect(base_url('admin/dasbor/profile'), 'refresh');
		}
		// End Masuk database
	}
}
							
