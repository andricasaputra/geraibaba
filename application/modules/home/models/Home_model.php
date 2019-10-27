<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model 
{
	public function dataProduct($limit, $start)
	{
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
		$this->db->order_by('product.id', 'DESC');

		return $this->db->get('product', $limit, $start)->result_array();
	}

	public function countAllProducts()
	{
		return $this->db->get('product')->num_rows();
	}

	public function getKategori($limit, $start, $kategori=null)
	{
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
		$this->db->order_by('product.id', 'DESC');
		$this->db->where('kategori',$kategori);

		return $this->db->get('product', $limit, $start)->result_array();
	}
}