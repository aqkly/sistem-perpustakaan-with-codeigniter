<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_buku_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$this->db->select('file_buku.*,
						   buku.judul_buku,
						   user.nama');
		$this->db->from('file_buku');
		//Join dengan table Buku
		$this->db->join('buku','buku.id_buku = file_buku.id_buku', 'LEFT');
		$this->db->join('user','user.id_user = file_buku.id_user', 'LEFT');
		//End Join
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//listing file per Buku
	public function buku($id_buku)
	{
		$this->db->select('file_buku.*,
						   buku.judul_buku,
						   user.nama');
		$this->db->from('file_buku');
		//Join dengan table Buku
		$this->db->join('buku','buku.id_buku = file_buku.id_buku', 'LEFT');
		$this->db->join('user','user.id_user = file_buku.id_user', 'LEFT');
		//End Join dan start where
		$this->db->where('file_buku.id_buku',$id_buku);
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail
	public function detail($id_file_buku)
	{
		$this->db->select('*');
		$this->db->from('file_buku');
		$this->db->where('id_file_buku', $id_file_buku);
		$this->db->order_by('id_file_buku', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('file_buku', $data);
	}

	//edit
	public function edit($data)
	{
		$this->db->where('id_file_buku', $data['id_file_buku']);
		$this->db->update('file_buku', $data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_file_buku', $data['id_file_buku']);
		$this->db->delete('file_buku', $data);
	}
	
}
							
