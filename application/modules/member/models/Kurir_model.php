<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir_model extends CI_Model 
{
	protected $table = 'kurir';

	public function all()
	{
		return $this->db->get($this->table)->result_array(); 
	}
}