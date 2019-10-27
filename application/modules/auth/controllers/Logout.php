<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller 
{
	protected $redirect = 'auth/login';

	public function index()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('nama_depan');
		$this->session->unset_userdata('nama_belakang');
		$this->cart->destroy();

		$this->session->set_flashdata('success', 'Logout Berhasil.');

		redirect($this->redirect);
	}
}