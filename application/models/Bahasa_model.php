<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('bahasa');
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail
	public function detail($id_bahasa)
	{
		$this->db->select('*');
		$this->db->from('bahasa');
		$this->db->where('id_bahasa', $id_bahasa);
		$this->db->order_by('id_bahasa', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('bahasa', $data);
	}

	//edit
	public function edit($data)
	{
		$this->db->where('id_bahasa', $data['id_bahasa']);
		$this->db->update('bahasa', $data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_bahasa', $data['id_bahasa']);
		$this->db->delete('bahasa', $data);
	}
	
}
							
