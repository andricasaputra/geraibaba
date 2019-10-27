<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller 
{
	protected $member;

	public function __construct()
	{
		parent::__construct();

		if(! $this->session->userdata('email')){
			redirect(base_url());
		}

		$this->load->model('Member_model');

		$this->member = $this->Member_model->getMember();
	}

	public function index()
	{
		redirect(base_url() . 'member/product');
	}
}
