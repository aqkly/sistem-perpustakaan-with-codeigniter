<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	//loadModel
	public function __construct()
	{
		parent::__construct();
		$this->load->model('buku_model');
		$this->load->model('file_buku_model');
	}

	//List Buku Terbaru
	public function index()
	{
		$buku = $this->buku_model->baru();

		$data = array( 'title'	=>	'Data Buku',
						'buku'	=>	$buku,
						'isi'	=>	'buku/list'
						);
		$this->load->view('layout/wrapper', $data);
	}
		
}
