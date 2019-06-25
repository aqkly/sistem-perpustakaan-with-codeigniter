<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//Halaman Login
	public function index()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('username', 'Username', 'required',
		array(
			'required' => 'Username Harus Diisi'
		));

		$valid->set_rules('password', 'Password', 'required|min_length[6]',
		array('required'	 => 'Password Harus Diisi',
			  'min_length'	 => 'Password minimal 6 Karakter'
		));

		if($valid->run() === FALSE){
			// END validasi
			$data = array('title' => 'Login Administrator');
			$this->load->view('admin/login_view', $data, FALSE);
			//Check username dan password compare dengan database
		}else{
			$i = $this->input;
			$username 	 = $i->post('username');
			$password 	 = $i->post('password');
			//check di database
			$check_login = $this->user_model->login($username, $password);
			//Kalo ada record, maka create session dan redirect ke Halaman Dashboard
			if(count($check_login) == 1) {
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('akses_level', $check_login->akses_level);
				$this->session->set_userdata('id_user', $check_login->id_user);
				$this->session->set_userdata('nama', $check_login->nama);
				redirect(base_url('admin/dasbor'), 'refresh');
			} else {
				//Kalo Username password tidak cocok, Error
				$this->session->set_flashdata('sukses', 'Username atau Password tidak cocok');
				redirect(base_url('login'), 'refresh');
			}

		}
		// END CHECKING
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('akses_level');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('sukses', 'Anda Berhasil Logout');
		redirect(base_url('login'), 'refresh');
	}

}
							
