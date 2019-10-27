<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    protected $member;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Profile_model');
        $this->load->model('Address_model');
        $this->load->model('Member_model');

        $this->member = $this->Member_model->getMember();
	}

	public function index()
	{
		//
	}	

	public function edit($id = '')
    {
    	$data['title'] = 'Edit Profil';
    	$data['member'] = $this->Profile_model->memberProfile($id);
        $data['province'] = $this->Address_model->getAllProvince();   
        
        if (! is_null($this->member['provinsi'])) {

            $data['user_province'] = $this->Address_model->getProvince($this->member['provinsi']);
            $data['user_kabupaten'] = $this->Address_model->getKabupaten(
                $data['user_province'][0]['province_id'], $this->member['kabupaten']
            );

        } else {

            $data['user_province'] = [];
            $data['user_kabupaten'] = null;
        }
        
    	$this->load->view('edit_profil', $data);
    }

    public function update($id ='' )
    {
    	$data['title'] = 'Edit Profil';

    	$data['member'] = $this->Profile_model->memberProfile($id);

    	$this->rule();

    	if($this->form_validation->run() == false){

        	$this->load->view('edit_profil', $data);

    	}else{

    	    $this->Profile_model->update($id);
    		
	    	$this->session->set_flashdata('message', ' Ubah Profil Berhasil.');

			redirect(base_url('member'));
    	}
    }

    public function getKabupaten($provinsi_id)
    {
        $data['kabupaten'] = $this->Address_model->getKabupaten($provinsi_id);
    }

    protected function rule()
    {
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required', [
            'required'=>'Nama Depan tidak boleh kosong'    
        ]);

        $this->form_validation->set_rules('telp', 'Telephone', 'trim|required', [
            'required'=>'Telephone tidak boleh kosong'    
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat Pengiriman', 'trim|required', [
            'required'=>'Alamat tidak boleh kosong'    
        ]);

        $this->form_validation->set_rules('provinsi', 'Provinsi Asal', 'required', [
            'required'=>'Provinsi Asal tidak boleh kosong'    
        ]);

        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required', [
            'required'=>'Kabupaten tidak boleh kosong'    
        ]);

        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
            'required'=>'Kecamatan tidak boleh kosong'    
        ]);
    }
}