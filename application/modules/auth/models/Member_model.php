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

	public function first($email)
	{
		return $this->db->get_where($this->table, [
			'email'=> $email
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

	public function isActive($email)
	{
		return $this->db->get_where('member', ['email'=> $email, 'is_active' => 1])->row_array();
	}

	public function store($data, $token)
	{
		$user_token = [
			'email'=>$this->input->post('email'),
			'token' => $token,
			'date_created' => time()
		];

		$this->db->insert($this->table, $data);
		$this->storeToken($user_token);
	}

	public function storeToken($data)
	{
		$this->db->insert('user_token', $data);
	}

	public function userToken($token)
	{
		return $this->db->get_where('user_token', ['token' => $token])->row_array();
	}

	public function update($email, $password = null)
	{
		$this->db->set('is_active', 1);

		if (isset($password)) {
			$this->db->set('password', $password);
		}

		$this->db->where('email', $email);

		$this->db->update($this->table);
	}


	public function delete($email)
	{
		$this->db->delete($this->table, ['email' => $email]);
	}

	public function deleteToken($email)
	{
		$this->db->delete('user_token', ['email' => $email]);
	}
}