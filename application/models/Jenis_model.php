<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('jenis');
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail
	public function detail($id_jenis)
	{
		$this->db->select('*');
		$this->db->from('jenis');
		$this->db->where('id_jenis', $id_jenis);
		$this->db->order_by('id_jenis', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('jenis', $data);
	}

	//edit
	public function edit($data)
	{
		$this->db->where('id_jenis', $data['id_jenis']);
		$this->db->update('jenis', $data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_jenis', $data['id_jenis']);
		$this->db->delete('jenis', $data);
	}
	
}
							
