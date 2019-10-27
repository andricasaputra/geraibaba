<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPassword extends CI_Controller 
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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
    		'valid_email'=>'Email tidak terdaftar'
    	]);

    	if($this->form_validation->run() == false){

			$this->load->view('forgot_password');

    	}else{

    		$email = $this->input->post('email');
    		$user = $this->Member_model->isActive($email);

    		if($user){

    			$token = base64_encode(random_bytes(32));

    			$user_token = [
    				'email' => $email,
    				'token' => $token,
    				'date_created'=>time()
    			];

    			$this->Member_model->storeToken($user_token);

    			$this->_sendEmail($token);

    			$this->session->set_flashdata('success', 'Silahkan Cek Email untuk Reset Password Anda!');

				redirect(base_url('auth/forgotPassword'));	

    		} else {

				$this->Member_model->deleteToken($email);

	    		$this->session->set_flashdata('error', 'Email tidak terdaftar / belum diaktivasi!');

				redirect(base_url('auth/forgotPassword'));	
    		}
    	}
    }

	private function _sendEmail($token)
	{
		$this->load->library('email', $this->emailConfig);

		$this->email->set_mailtype('html');

		$this->email->from('geraibabaolshop@gmail.com', 'Reset Password');
		$this->email->to($this->input->post('email'));


		$data['link'] =  base_url() . 'auth/forgotpassword/reset?email=' .$this->input->post('email'). '&token=' . urlencode($token);

		$template = $this->load->view('member/mail/reset', $data, true);

		$this->email->subject('Reset Password');
		$this->email->message($template);

		$this->email->send();
	} 

    public function reset()
    {
    	$email = $this->input->get('email');
    	$token = $this->input->get('token');

    	$user = $this->Member_model->first($email);

    	if($user){

    		$user_token = $this->Member_model->userToken($token);

    		if($user_token){

    			$this->session->set_userdata('reset_email', $email);

    			$this->changePassword();

    		}else{

                $this->Member_model->deleteToken($email);

    			$this->session->set_flashdata('error', 'Reset Password Gagal! Token Salah');

				redirect(base_url('auth/forgotpassword'));
    		}

    	}else{

			$this->Member_model->deleteToken($email);

    		$this->session->set_flashdata('error', 'Reset Password Gagal! Email Salah');

			redirect(base_url('auth/forgotpassword'));
    	}
    }

    public function changePassword()
    {
    	if(! $this->session->userdata('reset_email')){

    		redirect(base_url('auth/login'));
    	}

    	$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]', [
    		'matches'=>'Password tidak sama',
    		'min_length'=>'Password terlalu pendek',
    	]);

    	$this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[3]|matches[password1]');

    	if($this->form_validation->run() == false){

    		$this->load->view('change_password');

    	}else{

            $this->Member_model->deleteToken($this->session->userdata('reset_email'));

    		$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
    		$email = $this->session->userdata('reset_email');

            $this->Member_model->update($email, $password);

    		$this->session->unset_userdata('reset_email');

    		$this->session->set_flashdata('success', 'Ganti Password Berhasil! Silahkan Login');

			redirect(base_url('auth/login'));
    	}
    }
}