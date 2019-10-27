<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller
{
	protected $member;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Member_model');

		$this->member = $this->Member_model->getMember();
	}

	public function add()
	{
		$data = array(
			'id' => rand(),
			'name' => $this->input->post('nama_product'),
			'gambar_product' => $this->input->post('gambar_product'),
			'qty' => $this->input->post('qty'),
			'price' => $this->input->post('harga')
		);

		$this->cart->insert($data);

		redirect('member/chart/show');
	}

	public function delete($rowid)
	{
		$data = array(
			'rowid' => $rowid,
			'qty' => 0
		);

		$this->cart->update($data);

		redirect('member/chart/show');
	}

	public function show()
	{
		$data['title'] = 'Keranjang Belanja';
		$data['cart'] = $this->cart->contents();
		$data['member'] = $this->member
		
		$this->load->view('member/layouts/header', $data);
		$this->load->view('cart', $data);
		$this->load->view('member/layouts/footer');
	}
}