<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('email')){
			redirect(base_url());
		}

		$this->load->model('User_model');
		$this->load->model('Product_model');
		$this->load->model('Member_model');
		$this->load->model('Order_model');
	}

	public function index()
	{
		$data['user'] = $this->User_model->getActiveUser();
		$data['title'] = 'Dashboard';
		$data['countProducts'] = $this->Product_model->count();
		$data['countTransaksi'] = $this->Order_model->count();
		$data['countMember'] = $this->Member_model->count();
		$data['getRevenue'] = $this->Order_model->getRevenue();
		$data['getPercentage'] = $this->Order_model->getPercentage();

		$this->load->view('layouts/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layouts/footer');
	}
}