<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller 
{
	protected $redirect = 'admin/auth/login';

	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique'=>'Email ini sudah terdaftar'
		]);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches'=>'Password tidak sama',
			'min_length'=>'Password terlalu pendek'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if($this->form_validation->run() == false){

			$data ['title'] = 'Form Registrasi | Gerai Baba';
			$this->load->view('auth/register', $data);

		} else {

			$data = [
				'nama' =>htmlspecialchars($this->input->post('nama', true)),
				'email' =>htmlspecialchars($this->input->post('email', true)),
				'image' =>'default.jpg',
				'password' =>password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'is_active'=>1,
				'date_created'=>time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('success', 'Selamat! Akun anda berhasil terdaftar.');

			redirect($this->redirect);
		}
	}

}