<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_controller
{
	protected $member;

	protected $redirect = 'admin/kategori' ;

	public function __construct()
	{
		parent::__construct();

		if(! $this->session->userdata('email')){
			redirect(base_url());
		}

		$this->load->model('Member_model');
		$this->load->model('Kategori_model');

		$this->member = $this->Member_model->all();
	}

	public function index()
	{
    	$data['title'] = 'Kategori';
    	$data['member'] = $this->member;
    	$data['kategori'] = $this->Kategori_model->all();

    	$this->load->view('layouts/header', $data);
    	$this->load->view('kategori/index');	
    	$this->load->view('layouts/footer');
	}

	public function create()
	{
    	$data['title'] = 'Tambah Kategori';
    	$data['member'] = $this->member;
    	$data['kategori'] = $this->Kategori_model->all();

    	$this->load->view('layouts/header', $data);
    	$this->load->view('kategori/create');	
    	$this->load->view('layouts/footer');
	}

	public function store()
	{
		$this->Kategori_model->store();

		$this->session->set_flashdata('success', 'Nama Kategori Berhasil ditambahkan');

		redirect($this->redirect);
	}

	public function edit($id)
	{
    	$data['title'] = 'Edit Kategori';
    	$data['member'] = $this->member;
    	$data['kategori'] = $this->Kategori_model->first($id);

    	$this->load->view('layouts/header', $data);
    	$this->load->view('kategori/edit', $data);	
    	$this->load->view('layouts/footer');
	}

	public function update($id)
	{
		$this->Kategori_model->update($id);

		$this->session->set_flashdata('success', 'Nama Kategori Berhasil diubah.');

		redirect($this->redirect);
	}

	public function delete($id)
	{
		$this->Kategori_model->delete($id);

		$this->session->set_flashdata('success', 'Nama Kategori Berhasil dihapus.');

		redirect($this->redirect);
	}
}