<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('email')){
			redirect(base_url());
		}

		$this->load->model('User_model');
		$this->load->model('Member_model');
		$this->load->model('Order_model');
		$this->load->model('Product_model');
	}

	public function index()
	{
		$data['user'] = $this->User_model->getActiveUser();
		$data['title'] = 'List Report';

		$this->load->view('layouts/header', $data);
		$this->load->view('report/index', $data);
		$this->load->view('layouts/footer');
	}

	public function order()
	{
		$data['user'] = $this->User_model->getActiveUser();
		$data['title'] = 'Dashboard';
		$data['getCountOrderChartColumn'] = $this->Order_model->getCountOrderChartColumn();
		$data['getPercentage_qtyorder'] = $this->Order_model->getPercentage_qtyorder();

		$this->load->view('layouts/header', $data);
		$this->load->view('report/order', $data);
		$this->load->view('layouts/footer');
	}

	public function member()
	{
		$data['user'] = $this->User_model->getActiveUser();
		$data['title'] = 'Dashboard';
		$data['getCountMemberChartColumn'] = $this->Member_model->getCountMemberChartColumn();
		$data['getPercentage_member'] = $this->Member_model->getPercentage_member();

		$this->load->view('layouts/header', $data);
		$this->load->view('report/member', $data);
		$this->load->view('layouts/footer');
	}

	public function product()
	{
		$data['user'] = $this->User_model->getActiveUser();
		$data['title'] = 'Dashboard';
		$data['getCountProductChartColumn'] = $this->Product_model->getCountProductChartColumn();
		$data['getPercentage_product'] = $this->Product_model->getPercentage_product();

		$this->load->view('layouts/header', $data);
		$this->load->view('report/product', $data);
		$this->load->view('layouts/footer');
	}

}