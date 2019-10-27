<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public $email;

	public $password;

	public $user = null;

	public $redirect = 'admin/auth/login';

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if(! $this->form_validation->run()){

			$this->load->view('admin/auth/login');

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

		$data = ['email'=> $this->user['email']];

		$this->session->set_userdata($data);

		redirect(base_url('admin/home'));
	}

	private function checkData(): ?array
	{
		$this->email = $this->input->post('email');
		$this->password = $this->input->post('password');

		$this->user = $this->db->get_where('user', [
			'email' => $this->email]
		)->row_array();

		return $this->user;
	}

	private function isUser(): bool
	{
		if(is_null($this->checkData())){

			return false;
		}

		return true;
	}

	private function isActive(): bool
	{
		if(is_null($this->user['is_active'])){

			return false;
		} 

		return true;
		
	}	

	private function hasCorrectPassword(): bool
	{
		if(password_verify($this->password, $this->user['password'])){

			return true;
		}

		return false;
	}
}