<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public $email;

	public $password;

	public $user = null;

	public $redirect = 'auth/login';

	protected $memberModel;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Member_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if(! $this->form_validation->run()){

			$this->load->view('auth/login');

		}else{

			$this->proccessLogin();
		}
	}

	private function proccessLogin()
	{
		if (! $this->isUser()) {

			$this->session->set_flashdata('warning', 'Email Belum Terdaftar!');

			redirect($this->redirect);
		}

		if (! $this->isActive()) {

			$this->session->set_flashdata('warning', 'Email ini belum diaktivasi!');

			redirect($this->redirect);
		}

		if (! $this->hasCorrectPassword()) {

			$this->session->set_flashdata('error', 'Password Salah!');

			redirect($this->redirect);
		}

		$data = [
			'email'=> $this->user['email'],
			'role_id'=>$this->user['role_id'],
			'nama_depan'=>$this->user['nama_depan'],
			'nama_belakang'=>$this->user['nama_belakang']
		];

		$this->session->set_userdata($data);

		redirect(base_url('member/product'));
	}

	private function checkData(): ?array
	{
		$this->email = $this->input->post('email');
		$this->password = $this->input->post('password');

		$this->user = $this->Member_model->first($this->email);

		return $this->user;
	}

	private function isUser(): bool
	{
		return !is_null($this->checkData());
	}

	private function isActive(): bool
	{
		return $this->user['is_active'] != 0;
	}	

	private function hasCorrectPassword(): bool
	{
		return password_verify($this->password, $this->user['password']);
	}
}