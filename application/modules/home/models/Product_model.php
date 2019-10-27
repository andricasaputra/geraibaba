<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model 
{
	protected $table = 'product';

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

	public function dataProduct($limit, $start, $keyword = null)
	{
		if($keyword){

			$this->db->like('kategori', $keyword);
			$this->db->or_like('harga', $keyword);
			$this->db->or_like('nama_product', $keyword);	
		}

		$this->db->select('product.*, tb_kategori.kategori');
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
		$this->db->order_by('product.id', 'DESC');

		$query = $this->db->get('product', $limit, $start)->result_array();

		return $this->withImages($query);
	}

	protected function withImages(array $query)
	{
		foreach($query as $i => $product) {

			if (is_array($product)) {

				$this->product_id = $product['id'];

				// Get an array of products images
		   		$all_images = $this->db->where('product_id', $this->product_id);

				// Add the images array to the array entry for this product
		   		$query[$i]['images'] = $all_images->get('image_product')->result_array();
				
			} else {

				$this->product_id = $query['id'];

				// Get an array of products images
		   		$all_images = $this->db->where('product_id', $this->product_id);
		   		
				// Add the images array to the array entry for this product
		   		$query['images'] = $all_images->get('image_product')->result_array();
			
			}
		   
		}

		return $query;
	}

	public function getKategori($limit, $start, $kategori=null)
	{
		$this->db->select('product.*, tb_kategori.kategori');
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
		$this->db->order_by('product.id', 'DESC');
		$this->db->where('kategori', $kategori);

		$query = $this->db->get('product')->result_array();

		return $this->withImages($query);
	}

	public function detail($nama_product)
	{
		$nama_product = urldecode($nama_product);

		$this->db->select('product.*, image_product.gambar');
		$this->db->join('image_product', 'product.id = image_product.product_id');
		$this->db->where('nama_product', $nama_product);

		$query = $this->db->get($this->table)->row_array();
	
		return $this->withImages($query);
	}

	public function getRandomProduct()
	{
		$this->db->limit(6);

		$this->db->order_by('rand()');

		return $this->db->get($this->table)->result_array();
	}

	public function potonganMember(string $role)
	{
		if ($role == 'reseller') {
			$this->db->select('pot_reseller');
		} elseif($role == 'marketter'){
			$this->db->select('pot_marketter');
		} 

		return $this->db->get($this->table)->result_array();
	}
}