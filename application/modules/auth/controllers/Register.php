<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller 
{
	protected $emailConfig = [
		'protocol'=>'smtp',
		'smtp_host'=>'ssl://smtp.googlemail.com',
		'smtp_user'=>'geraibabaolshop@gmail.com',
		'smtp_pass'=>'@Geraibaba123',
		'smtp_port'=>465,
		'mailtype'=>'html',
		'charset'=>'utf-8',
		'newline'=>"\r\n"
	];

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Member_model');
	}

	public function index()
	{
		//registrasi member
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim', [
		    'required'=>'Nama Depan tidak boleh kosong'    
	    ]);

		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'trim');

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[member.email]', [
			'is_unique'=>'Email ini sudah terdaftar',
			'valid_email'=>'Email tidak valid',
			'required'=>'Email tidak boleh kosong'
		]);

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches'=>'Password tidak sama',
			'min_length'=>'Password terlalu pendek',
			'required'=>'Password tidak boleh kosong'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if($this->form_validation->run() == false){

			$data ['title'] = 'Form Registrasi | Gerai-Baba';

			$this->load->view('register', $data);

		} else {

			$data = [
				'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
				'nama_belakang' => htmlspecialchars($this->input->post('nama_belakang', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			//token
			$token = base64_encode(random_bytes(32));

			$this->Member_model->store($data, $token);

			$this->_sendEmail($token);

			$this->session->set_flashdata('success', 'Selamat! Akun anda berhasil terdaftar, Silahkan Cek Email untuk Aktivasi Akun Anda.');

			redirect('auth/login');
		}
	}

	private function _sendEmail($token)
	{
		$this->load->library('email', $this->emailConfig);

		$this->email->set_mailtype('html');

		$this->email->from('geraibabaolshop@gmail.com', 'Verikasi akun');
		$this->email->to($this->input->post('email'));


		$data['link'] =  base_url() . 'auth/register/verify?email=' .$this->input->post('email'). '&token=' . urlencode($token);

		$data['nama'] = htmlspecialchars($this->input->post('nama_depan', true));

		$template = $this->load->view('member/mail/verification', $data, true);

		$this->email->subject('Verifikasi Akun');
		$this->email->message($template);	

		$this->email->send();
	} 

	public function verify()
	{
		$token = $this->input->get('token');
		$email = $this->input->get('email');

		$user = $this->Member_model->first($email);

		if (! $user) {

			$this->session->set_flashdata('error', 'Aktivasi Akun Failed! Email Salah.');

			redirect(base_url('auth/login'));

			return false;

		}

		$user_token = $this->Member_model->userToken($token);

		if (! $user_token) {

			$this->session->set_flashdata('error', 'Aktivasi Akun Failed! Token Salah.');

			redirect(base_url('auth/login'));

			return false;
		}

		if(time() - $user_token['date_created'] > (60*60*72)){
			
			$this->Member_model->delete($email);

			$this->Member_model->deleteToken($email);

			$this->session->set_flashdata('error', 'Aktivasi Akun Failed! Token sudah Expired.');

			redirect(base_url('auth/login'));

			return false;

		}

		$this->Member_model->update($email);

		$this->Member_model->deleteToken($email);

		$this->session->set_flashdata('success', 'Email : '.$email.' sudah aktif! Silahkan Login.');

		redirect(base_url('auth/login'));

	}

}