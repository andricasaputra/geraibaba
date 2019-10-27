<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model 
{
	public function memberProfile($id)
	{
		return $this->db->get_where('member', [
			'id' => $id
		])->row_array();
	}

	public function update($id)
	{
		$this->db->set('nama_depan', $this->input->post('nama_depan'));
	    $this->db->set('nama_belakang', $this->input->post('nama_belakang'));
	    $this->db->set('provinsi', $this->input->post('provinsi'));
	    $this->db->set('kabupaten', $this->input->post('kabupaten'));
	    $this->db->set('kecamatan', $this->input->post('kecamatan'));
		$this->db->set('telp', $this->input->post('telp'));
		$this->db->set('alamat', $this->input->post('alamat'));

		$this->db->where('id', $id);

		$this->db->update('member');
	}

}