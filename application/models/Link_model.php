<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('link');
		$this->db->order_by('id_link', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail
	public function detail($id_link)
	{
		$this->db->select('*');
		$this->db->from('link');
		$this->db->where('id_link', $id_link);
		$this->db->order_by('id_link', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('link', $data);
	}

	//edit
	public function edit($data)
	{
		$this->db->where('id_link', $data['id_link']);
		$this->db->update('link', $data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_link', $data['id_link']);
		$this->db->delete('link', $data);
	}
	
}
							
