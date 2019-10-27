<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function index()
	{
		redirect(base_url('home/product'));
	}

	public function carapembelian()
	{
		$data['title'] = "Syar'i Is Beauty | Gerai Baba - Home";

		$this->load->view('templates/home_header', $data);
		$this->load->view('petunjuk');
		$this->load->view('templates/home_footer');
	}
}