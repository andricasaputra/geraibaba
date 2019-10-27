<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model 
{
    protected $table = 'role';

    public function all()
    {
    	$this->db->order_by('id', 'DESC');
        $this->db->where('id !=', 1);
    	return $this->db->get($this->table)->result_array();
    }

    public function first($id)
    {
        $this->db->select('member.*, role.*');
        $this->db->join('member', 'member.role_id=role.id');

    	return $this->db->get_where($this->table, [
    		'id' => $id
    	])->row_array();
    }

    public function store()
    {
    	$data = array(
    		'nama' => ucfirst($this->input->post('role')),
    		'created_at' => $this->timeStamp()
    	);
    	
		$this->db->insert($this->table, $data);
    }

    public function update($id)
    {
    	$this->db->set('nama', $this->input->post('role'));
		$this->db->where('id', $id);
		$this->db->update($this->table);
    }

    public function delete($id)
    {
    	$this->db->delete($this->table, [
    		'id' => $id
    	]);
    }

    protected function timeStamp($tz = 'Asia/Makassar', $format = "Y-m-d H:i:s")
    {
    	$date = new DateTime('now', new DateTimeZone($tz));
        return $date->format($format);
    }
}