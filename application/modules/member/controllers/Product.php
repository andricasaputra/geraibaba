<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
	protected $role;

	protected $member;

	protected $potonganMember;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');

		if(! $this->isLogin()){
			redirect(base_url());
		}

		$this->load->model('Member_model');
		$this->load->model('Product_model');
		$this->load->model('Kategori_model');

		$this->member = $this->Member_model->getMember();
	}

	protected function isLogin()
	{
		return !empty($this->session->userdata('nama_depan'));
	}

	public function index()
	{
		$data['title'] = "Syar'i Is Beauty | Gerai Baba - Member";

		$this->load->library('pagination');

		$config['base_url'] = base_url().'/member/product/index';
		$config['total_rows'] = $this->Product_model->withCount();
		$config['per_page'] = 8;

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['cart'] = $this->cart->contents();
		$data['kategori'] = $this->Kategori_model->all();
    	$data['member'] = $this->member;
    	$data['role'] = $this->Member_model->getRole($this->member['id'])->name;

    	$products = $this->Product_model->dataProduct($config['per_page'], $data['start']);

    	$data['product'] = $this->getMainImage($products);

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/topbar', $data);
		$this->load->view('member', $data);
		$this->load->view('layouts/footer');
	}

	protected function getMainImage($products)
	{
		return array_map(function($item){

    		$result = array_filter($item['images'], function($i){
    			return $i['main'] !== NULL;
    		});

    		$item['main_image'] = array_map(function($main_image, $key){
    			return $main_image['gambar'];
    		}, $result, array_keys($result));

    		return $item;

    	}, $products);
	}

	public function detail($nama_product)
	{
		$data['title'] = 'Busana Masa Kini | Gerai Baba - Product';
		$data['member'] = $this->Member_model->getMember();
		$data['productdetail'] = $this->Product_model->detail($nama_product);
		$data['product_random'] = $this->Product_model->getRandomProduct();
		$data['role'] = $this->Member_model->getRole($this->member['id'])->name;

		$this->load->view('layouts/header', $data);
		$this->load->view('product_detail', $data);
		$this->load->view('layouts/footer');
	}

	public function kategori($kategori)
	{
		$data['title'] = "Syar'i Is Beauty | Gerai Baba - Member";

		$this->load->library('pagination');

		$config['base_url'] = base_url()."/member/product/kategori/".$this->uri->segment(4)."/";
		
		if($kategori){

		    $data['kategori'] = $this->uri->segment(4);
		    $this->session->set_userdata('kategori', $data['kategori']);

		}else{

		    $data['kategori'] = $this->session->userdata('kategori');
		}

		$config['total_rows'] = $this->Kategori_model->selectKategori($kategori)->count();
		$config['per_page'] = 8;
		$data['start'] = $this->uri->segment(5);
    	$data['member'] = $this->member;

		$this->pagination->initialize($config);

		$data['cart'] = $this->cart->contents();
		$data['kategori'] = $this->Kategori_model->all();

		$products = $this->Product_model->getKategori($config['per_page'], $data['start'], $kategori);

    	$data['product'] = $this->getMainImage($products);

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/topbar', $data);
		$this->load->view('kategori', $data);
		$this->load->view('layouts/footer');
	}
}