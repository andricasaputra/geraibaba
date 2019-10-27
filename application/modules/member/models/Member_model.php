<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model 
{
	protected $table = 'member';

	public function all()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		
		return $this->db->get()->row_array();
	}

	public function getMember()
	{
		return $this->db->get_where($this->table, [
			'email'=>$this->session->userdata('email')
		])->row_array();
	}

	public function getRole($id)
	{
		$this->db->select('member.*, role.name');
		$this->db->from($this->table);
		$this->db->join('role', 'member.role_id=role.id');
		$this->db->where('member.id', $id);
		
		return $this->db->get()->row();
	}
}