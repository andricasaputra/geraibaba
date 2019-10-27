<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
	protected $redirect = 'admin/product';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Product_model');
		$this->load->model('User_model');
		$this->load->model('Kategori_model');
	}

	public function index()
	{
		$data['title'] = 'Product';
		$data['user'] = $this->User_model->getActiveUser();
		$data['product'] = $this->Product_model->all();

		$this->load->view('layouts/header', $data);
		$this->load->view('product/index');
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$data['title'] = 'Add Product';
		$data['user'] = $this->User_model->getActiveUser();
		$data['kategori'] = $this->Kategori_model->all();

		$this->load->view('layouts/header', $data);
		$this->load->view('product/create', $data);
		$this->load->view('layouts/footer');
	}

	public function store()
	{
        if ($this->Product_model->store()){

        	$this->session->set_flashdata('success', 'Tambah Product Berhasil!.');

			redirect($this->redirect);

        }
        
		$this->session->set_flashdata('error', 'Gagal Tambah Produk ' . $this->upload->display_errors()); 
		redirect('admin/product/create');
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Product';
		$data['user'] = $this->User_model->getActiveUser();
    	$data['product'] = $this->Product_model->first($id);
    	$data['kategori'] = $this->Kategori_model->all();

		$this->load->view('layouts/header', $data);
		$this->load->view('product/edit', $data);
		$this->load->view('layouts/footer');		
	}

	public function update($id)
	{
		$this->Product_model->update($id);

		$this->session->set_flashdata('success', 'Update Product Berhasil!.');

	  	redirect($this->redirect);
	}

	public function delete($id)
	{
		$this->Product_model->delete($id);
		
		$this->session->set_flashdata('success', 'Hapus Product Berhasil!.');

		redirect($this->redirect);
	}

	public function showImages($product_id)
	{
		$data['title'] = 'Gambar Product';
		$data['product'] = $this->Product_model->showImages($product_id);

		$this->load->view('layouts/header', $data);
		$this->load->view('product/images/index', $data);
		$this->load->view('layouts/footer');
	}

	public function createProductImage($product_id)
	{
		$data['title'] = 'Add Product Image';
		$data['product'] = $this->Product_model->first($product_id);
		$data['product_id'] = $product_id;

		$this->load->view('layouts/header', $data);
		$this->load->view('product/images/create', $data);
		$this->load->view('layouts/footer');
	}

	public function storeProductImage()
	{
		$product_id = $this->input->post('product_id');

		if ($this->Product_model->storeImageProduct($product_id)){

        	$this->session->set_flashdata('success', 'Tambah Gambar Product Berhasil!.');

			redirect('admin/product/showImages/' . $product_id);

        }
        
		$this->session->set_flashdata('error', 'Gagal Tambah Gambar Produk ' . $this->upload->display_errors()); 
		redirect('admin/product/showImages/' . $product_id);
	}

	public function setMainImages($product_id, $id)
	{
		$this->Product_model->setAsMainImage($product_id, $id);
		
		$this->session->set_flashdata('success', 'Update gambar sebagai gambar utama berhasil!.');

		redirect($this->redirect . '/showImages/' . $product_id);
	}

	public function deleteImage($product_id, $id)
	{
		$this->Product_model->deleteImageProduct($id);
		
		$this->session->set_flashdata('success', 'Hapus Gambar Product Berhasil!.');

		redirect($this->redirect . '/showImages/' . $product_id);
	}
}