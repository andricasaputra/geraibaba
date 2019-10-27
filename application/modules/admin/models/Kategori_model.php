<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model 
{
    protected $table = 'tb_kategori';

    public function all()
    {
        $this->db->order_by('id', 'DESC');
    	return $this->db->get($this->table)->result_array();
    }

    public function first($id)
    {
        return $this->db->get_where($this->table, [
            'id' => $id
        ])->row_array();
    }

    public function getKategori()
    {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('product', 'product.id_kategori = tb_kategori.id', 'right');
        $this->db->order_by('product.id', 'DESC');
        
		return $this->db->get()->result_array();
	}

    public function store()
    {
        $data = array('kategori' => ucfirst($this->input->post('kategori')));

        $this->db->insert($this->table, $data);
    }

    public function update($id)
    {
        $this->db->set('kategori', $this->input->post('kategori'));
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }

    public function delete($id)
    {
        $this->db->delete($this->table, [
            'id' => $id
        ]);
    }
}