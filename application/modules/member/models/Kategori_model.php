<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model 
{
	protected $table = 'tb_kategori';

	public function all()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		
		return $this->db->get()->result_array();
	}

	public function withCount()
	{
		$this->db->select('*');
		$this->db->from($this->table);

		return $this->db->count_all_results();
	}

	public function selectKategori($kategori)
	{
		$this->db->like('kategori', $kategori);
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join($this->table, 'product.id_kategori = tb_kategori.id');

		return $this;
	}

	public function count()
	{
		return $this->db->count_all_results();
	}
}