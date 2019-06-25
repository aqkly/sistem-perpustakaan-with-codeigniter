<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//loadModel
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('buku_model');
		$this->load->model('jenis_model');
		$this->load->model('bahasa_model');
		$this->load->model('file_buku_model');
		$this->load->model('link_model');
	}

	//HomePage
	public function index()
	{
		$slider		 	= $this->berita_model->slider();
		$berita 		= $this->berita_model->berita();
		$buku   		= $this->buku_model->buku();
		$konfigurasi    = $this->konfigurasi_model->listing();
		$link 			= $this->link_model->listing();

		$data = array('title'		=> $konfigurasi->namaweb.' - '.$konfigurasi->tagline,
					  'slider'		=>	$slider,
					  'berita'		=>	$berita,
					  'buku'		=>	$buku,
					  'link'		=>	$link,
					  'isi'			=> 'home/list'
				);
		$this->load->view('layout/wrapper', $data);
	}
}
