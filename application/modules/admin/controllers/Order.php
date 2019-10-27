<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller
{
	protected $key = 'SB-Mid-server-JjWxuiSm6ZcOusuIiGQXY69i';

	protected $production = false;

	protected $redirect = 'admin/order';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('User_model');
		$this->load->model('Member_model');
		$this->load->model('Order_model');

		//Midtrans
        $params = array('server_key' => $this->key, 'production' => $this->production);

		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
	}

	public function index()
	{
		$data['title'] = 'Check Order';
		$data['user'] = $this->User_model->getActiveUser();
		$data['transaksi'] = $this->Order_model->allObject();

		$this->load->view('layouts/header', $data);
		$this->load->view('order/index', $data);
		$this->load->view('layouts/footer');
	}

	public function show($order_id)
	{
    	$data['title'] = 'Transaksi Detail';
		$data['stt'] = $this->veritrans->status($order_id);
    	$data['member'] = $this->Member_model->all();
    	$data['orders']= $this->Order_model->first($data['stt']->order_id);
		$data['kurir'] = $this->Order_model->all();

		$this->Order_model->updateStatus($order_id, $data['stt']->transaction_status);

    	$this->load->view('layouts/header', $data);
    	$this->load->view('order/show', $data);	
    	$this->load->view('layouts/footer');
	}

	public function expire($order_id)
	{
		$this->veritrans->expire($order_id);
		$this->Order_model->expire($order_id);

		$this->session->set_flashdata('success', 'Transaksi expired!');

		redirect($this->redirect);
	}

	public function cancel($order_id)
	{
		$this->veritrans->cancel($order_id);
		$this->Order_model->cancel($order_id);

		$this->session->set_flashdata('success', 'Transaksi berhasil dibatalkan.');

		redirect($this->redirect . '/show');
	}

	public function resi($order_id)
	{
    	$data['title'] = 'Input Resi';
    	$data['order'] = $this->Order_model->first($order_id);

    	$this->load->view('layouts/header', $data);
    	$this->load->view('order/resi');	
    	$this->load->view('layouts/footer');
	}

	public function updateResi($order_id)
	{
		$this->form_validation->set_rules('resi', 'Resi', 'required|trim', [
			'required'=>'Field Resi tidak boleh kosong'
		]);
		
    	$data['title'] = 'Input Resi';
    	$data['member'] = $this->Order_model->updateResi($order_id);
    	
    	$this->session->set_flashdata('success', 'Berhasil memperbarui nomor resi.');

		redirect($this->redirect);
	}
}