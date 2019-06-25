<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	//Halaman Utama

	public function __construct()
	{
		parent::__construct();
		$this->load->model('peminjaman_model');
		$this->load->model('buku_model');	
		$this->load->model('anggota_model');
	}

	//main Page Peminjaman
	public function index()
	{
		$peminjaman = $this->peminjaman_model->listing();

		$data = array( 'title' 		 => 'Data Peminjaman Buku ('.count($peminjaman).')',
					   'peminjaman'  => $peminjaman,
				       'isi' 		 => 'admin/peminjaman/list'
		);

		$this->load->view('admin/layout/wrapper', $data);
	}

	// Tambah
	public function tambah()
	{
		$anggota = $this->anggota_model->listing();

		$data = array( 'title' 	 => 'Peminjaman Buku',
					   'anggota' => $anggota,
				       'isi' 	 => 'admin/peminjaman/list_anggota'
		);

		$this->load->view('admin/layout/wrapper', $data);
	}

	// Add Peminjaman
	public function add($id_anggota)
	{
		$anggota 	 = $this->anggota_model->detail($id_anggota);
		$peminjaman  = $this->peminjaman_model->anggota($id_anggota);
		$limit		 =	$this->peminjaman_model->limit_peminjaman_anggota($id_anggota);
		$buku 		 = $this->buku_model->listing();
		$konfigurasi = $this->konfigurasi_model->listing();

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('id_buku', 'Pilih Judul Buku', 'required', 
			array('required'	=>	'Pilih Judul Buku'));

		if($valid->run() === FALSE) { 
		//End Validasi
		$data = array( 'title' 		 => 'Peminjaman Buku atas nama: '.$anggota->nama_anggota,
					   'anggota' 	 => $anggota,
					   'peminjaman'	 =>	$peminjaman,
					   'buku'		 => $buku,
					   'konfigurasi' =>	$konfigurasi,
					   'limit'		 => $limit,
				       'isi' 		 => 'admin/peminjaman/tambah'
		);

		$this->load->view('admin/layout/wrapper', $data);
		//Proses Database
		}else {
			$i = $this->input;
			$data = array('id_user'			=>	$this->session->userdata('id_user'),
						  'id_buku'			=>	$i->post('id_buku'),
						  'id_anggota'		=>	$id_anggota,
						  'tanggal_pinjam'	=>	$i->post('tanggal_pinjam'),
						  'tanggal_kembali'	=>	$i->post('tanggal_kembali'),
						  'keterangan'		=>	$i->post('keterangan'),
						  'status_kembali'	=>	$i->post('status_kembali')
					);
			$this->peminjaman_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah Ditambahkan');
			redirect(base_url('admin/peminjaman/add/'.$id_anggota), 'refresh');
		}
		//End proses
	}

	// Edit Peminjaman
	public function edit($id_peminjaman)
	{
		$peminjaman  = $this->peminjaman_model->detail($id_peminjaman);
		$id_anggota	 = $peminjaman->id_anggota;
		$anggota 	 = $this->anggota_model->detail($id_anggota);
		$buku 		 = $this->buku_model->listing();
		$konfigurasi = $this->konfigurasi_model->listing();

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('id_buku', 'Pilih Judul Buku', 'required', 
			array('required'	=>	'Pilih Judul Buku'));

		if($valid->run() === FALSE) { 
		//End Validasi
		$data = array( 'title' 		 => 'Edit Peminjaman Buku atas nama: '.$anggota->nama_anggota,
					   'anggota' 	 => $anggota,
					   'peminjaman'	 =>	$peminjaman,
					   'buku'		 => $buku,
					   'konfigurasi' =>	$konfigurasi,
				       'isi' 		 => 'admin/peminjaman/edit'
		);

		$this->load->view('admin/layout/wrapper', $data);
		//Proses Database
		}else {
			$i = $this->input;
			$data = array('id_peminjaman'	=>	$id_peminjaman,
						  'id_user'			=>	$this->session->userdata('id_user'),
						  'id_buku'			=>	$i->post('id_buku'),
						  'id_anggota'		=>	$id_anggota,
						  'tanggal_pinjam'	=>	$i->post('tanggal_pinjam'),
						  'tanggal_kembali'	=>	$i->post('tanggal_kembali'),
						  'keterangan'		=>	$i->post('keterangan'),
						  'status_kembali'	=>	$i->post('status_kembali')
					);
			$this->peminjaman_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah Diedit');
			redirect(base_url('admin/peminjaman'), 'refresh');
		}
		//End proses
	}

	//Pengembalian Buku
	public function kembali($id_peminjaman)
	{
		$peminjaman = $this->peminjaman_model->detail($id_peminjaman);

		$data = array('id_peminjaman'	=>	$id_peminjaman,
					  'id_user'			=>	$this->session->userdata('id_user'),
					  'status_kembali'	=>	'Sudah'
					);
		$this->peminjaman_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah Diedit');
		redirect(base_url('admin/peminjaman'), 'refresh');
	}

	//Delete
	public function delete($id_peminjaman)
	{
		//proteksi hapus disini
		if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
		$this->session->set_flashdata('sukses', 'Silahkan Login Dahulu');
		redirect(base_url('login'), 'refresh');
		}
		//End Proteksi	
		$data = array(
			'id_peminjaman' => $id_peminjaman
		);
		$this->peminjaman_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data Telah Di Hapus');
		redirect(base_url('admin/peminjaman'), 'refresh');	
	}

}