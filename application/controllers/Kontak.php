<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	//loadModel
	public function __construct()
	{
		parent::__construct();
	}

	//List Kontak Terbaru
	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		$data = array( 'title'			=>	'Menghubungi Kami '.$konfigurasi->namaweb,
					   'konfigurasi'	=> $konfigurasi,
						'isi'			=>	'kontak/list'
						);
		$this->load->view('layout/wrapper', $data);
	}
		
}
