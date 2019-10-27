<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller 
{
	protected $redirect = 'admin/auth/login';

	public function index()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('success', 'Logout Berhasil.');

		redirect($this->redirect);
	}
}