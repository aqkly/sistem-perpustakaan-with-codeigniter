<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->order_by('id_anggota', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail
	public function detail($id_anggota)
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('id_anggota', $id_anggota);
		$this->db->order_by('id_anggota', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Login
	public function Login($anggotaname, $password)
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where(array('anggotaname' => $anggotaname,
							   'password' => sha1($password)));
		$this->db->order_by('id_anggota', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('anggota', $data);
	}

	//edit
	public function edit($data)
	{
		$this->db->where('id_anggota', $data['id_anggota']);
		$this->db->update('anggota', $data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_anggota', $data['id_anggota']);
		$this->db->delete('anggota', $data);
	}
	
}
							
