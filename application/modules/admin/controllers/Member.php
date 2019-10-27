<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_controller
{
	protected $member;

	protected $redirect = 'admin/member' ;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Role_model');
		$this->load->model('Member_model');

		$this->member = $this->Member_model->all();
	}

	public function index()
	{
    	$data['title'] = 'List Member';
    	$data['member'] = $this->member;
    	$data['roles'] = $this->Role_model->all();

    	$this->load->view('layouts/header', $data);
    	$this->load->view('member/index');	
    	$this->load->view('layouts/footer');
	}

	public function updateRoleMember($id)
	{
		$this->Member_model->updateRoleMember($id);

		$this->session->set_flashdata('success', 'Berhasil Menambahkan Role Member!.');
	}
	
	public function delete($id)
	{
		$this->Member_model->delete($id);

		$this->session->set_flashdata('success', 'Hapus Akun Berhasil!.');

		redirect($this->redirect);
	}
}