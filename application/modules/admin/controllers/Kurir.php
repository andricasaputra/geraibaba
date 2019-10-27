<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller
{
	protected $redirect = 'admin/kurir';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Kurir_model');
	}

	public function index()
	{
    	$data['title'] = 'Kurir';
    	$data['kurir'] = $this->Kurir_model->all();

    	$this->load->view('layouts/header', $data);
    	$this->load->view('kurir/index');	
    	$this->load->view('layouts/footer');
	}

	public function create()
	{
    	$data['title'] = 'Tambah Kurir';
    	$data['kurir'] = $this->Kurir_model->all();

    	$this->load->view('layouts/header', $data);
    	$this->load->view('kurir/create');	
    	$this->load->view('layouts/footer');
	}

	public function store()
	{
		$this->Kurir_model->store();

		$this->session->set_flashdata('success', 'Nama kurir Berhasil ditambahkan.');

		redirect($this->redirect);
	}

	public function edit($id)
	{
    	$data['title'] = 'Edit Kurir';
    	$data['kurir'] = $this->Kurir_model->first($id);

    	$this->load->view('layouts/header', $data);
    	$this->load->view('kurir/edit', $data);	
    	$this->load->view('layouts/footer');
	}

	public function update($id)
	{
    	$this->Kurir_model->update($id);

		$this->session->set_flashdata('success', 'Nama kurir Berhasil diubah.');

		redirect($this->redirect);
	}

	public function delete($id)
	{
		$this->Kurir_model->delete($id);

		$this->session->set_flashdata('success', 'Nama kurir Berhasil dihapus.');

		redirect($this->redirect);
	}
}