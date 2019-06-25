<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

	//loadModel
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usulan_model');
	}

	//List Usulan Terbaru
	public function index()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul', 'Judul', 'required|min_length[5]',
			array('required'	=>	'%s harus diisi',
				  'min_length'	=>	'%s minimal 5 karakter'));


		$valid->set_rules('penulis', 'Penulis', 'required|min_length[6]',
			array('required'	=>	'%s harus diisi',
				  'min_length'	=>	'%s minimal 6 karakter'));


		$valid->set_rules('penerbit', 'Penerbit', 'required|min_length[6]',
			array('required'	=>	'%s harus diisi',
				  'min_length'	=>	'%s minimal 6 karakter'));

		$valid->set_rules('nama_pengusul', 'Nama Pengusul', 'required|min_length[6]',
			array('required'	=>	'%s harus diisi',
				  'min_length'	=>	'%s minimal 6 karakter'));

		$valid->set_rules('email_pengusul', 'E-mail Pengusul', 'required|valid_email',
			array('required'	=>	'%s harus diisi',
				  'valid_email'	=>	'%s tidak valid'));

		if($valid->run() === FALSE) {
			//End Validasi

		$data = array( 'title'	=>	'Usulan Buku Baru',
						'isi'	=>	'usulan/list'
						);
		$this->load->view('layout/wrapper', $data);
		//Masuk Database
		}else {
			$i = $this->input;
			$data = array( 'judul'			=>	$i->post('judul'),
						   'penulis'		=>	$i->post('penulis'),
						   'penerbit'		=>	$i->post('penerbit'),
						   'keterangan'		=>	$i->post('keterangan'),
						   'nama_pengusul'	=>	$i->post('nama_pengusul'),
						   'email_pengusul' =>	$i->post('email_pengusul'),
						   'ip_address' 	=>	$this->input->ip_address(),
						   'status_usulan' 	=>	'Baru',
						   'tanggal_usulan' =>	date('Y-m-d H:i:s')
						);
			$this->usulan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Terimakasih, Usulan anda telah kami terima. kami akan segera melengkapi buku sesuai usulan Anda.');
			redirect(base_url('usulan'), 'refresh');
		}
		//End masuk database
	}
		
}
