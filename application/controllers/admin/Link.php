<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

	//Halaman Utama

	public function __construct()
	{
		parent::__construct();
		$this->load->model('link_model');	
	}

	//Halaman Utama

	public function index()
	{
		$link = $this->link_model->listing();
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_link', 'Nama', 'required',
				array('required' => 'Nama Harus Diisi'));

		$valid->set_rules('url', 'Alamat Link', 'required|is_unique[link.url]',
				array('required' 	=> 'Alamat Link Harus Diisi',
					  'is_unique' => 'Alamat Link <strong>'.$this->input->post('url').'</strong sudah ada, Buat Kode Link Buku baru'
					));

		if($valid->run() === false)
		{
			//End Validasi

			$data = array('title' 	=> 'Kelola Link',
						  'link' 	=> $link,
						  'isi'		=> 'admin/link/list'
			);

			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;
			$data = array( 'nama_link' 	=> $i->post('nama_link'),
					       'url' 		=> $i->post('url'),
						   'target' 	=> $i->post('target'),
						);

			$this->link_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Link telah di tambah');
			redirect(base_url('admin/link'), 'refresh');
		}
		// End Masuk database
	}

	//Halaman Edit
	public function edit($id_link)
	{
		$link = $this->link_model->detail($id_link);

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_link', 'Nama', 'required',
					array('required' => 'Nama Harus Diisi'));

		if($valid->run() === false)
		{
			//End Validasi

			$data = array('title' => 'Edit Link: '.$link->nama_link,
						  'link'  => $link,
						   'isi'  => 'admin/link/edit'
						);

			$this->load->view('admin/layout/wrapper', $data);
		} else {
			$i = $this->input;

			$data = array( 'id_link'	=> $id_link,
						   'nama_link' 	=> $i->post('nama_link'),
					       'url' 		=> $i->post('url'),
						   'target' 	=> $i->post('target'),
						);
			
			$this->link_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di update');
			redirect(base_url('admin/link'), 'refresh');
		}
		// End Masuk database
	}

	public function delete($id_link)
	{
		//proteksi hapus disini
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
		$this->session->set_flashdata('sukses', 'Silahkan Login Dahulu');
		redirect(base_url('login'), 'refresh');
		}
		//End Proteksi	
		$data = array('id_link' => $id_link);

		$this->link_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah Di Hapus');
		redirect(base_url('admin/link'), 'refresh');	
	}
}
							
