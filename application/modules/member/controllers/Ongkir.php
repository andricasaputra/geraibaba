<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller 
{
	protected $member;

	protected $ownerAddress = [
    	'city_id' => '69', 
  		'province_id' => '22',
  		'province' => 'Nusa Tenggara Barat (NTB)',
  		'type' => 'Kota', 
  		'city_name' => 'Bima', 
  		'postal_code' => '84139', 
    ];

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Address_model');
		$this->load->model('Member_model');
		$this->load->model('Kurir_model');

		$this->member = $this->Member_model->getMember();
	}

	public function index()
	{
		$data['asal'] = $this->ownerAddress();
		$data['tujuan'] = $this->memberShippingAddress();
		$data['kurir'] = $this->Kurir_model->all();
		$data['province'] = $this->Address_model->getAllProvince();

		$this->load->view('ongkir', $data);
	}

	public function getCity($province)
	{		
		return $this->Address_model->getKabupaten($province);
	}

	public function getEkspedisiCost()
	{
		$origin = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = $this->input->get('courier');
		$beratBarang = $this->input->get('beratBarang');

		$data = [
			'origin' => $origin,
			'destination' => $destination, 
			'berat' => $berat, 
			'courier' => $courier,
			'beratBarang' => $beratBarang 
		];

		$ongkir['ongkir'] = $this->Address_model->getJasaOngkir($data);

		$this->load->view('ongkir/ekspedisiCost', $ongkir);
	}

	public function getResi()
	{
		$waybill = $this->input->get('waybill');

		$data = array('waybill' => $waybill);
		
		$this->load->view('ongkir/getResi', $data);
	}

	protected function ownerAddress()
	{
        return $this->ownerAddress;
	}

	protected function memberShippingAddress()
	{
		$adress = [];

        if (! is_null($this->member['provinsi'])) {
            $user_province = $this->Address_model->getProvince($this->member['provinsi']);

            $adress = $this->Address_model->getKabupaten(
            	$user_province[0]['province_id'], $this->member['kabupaten']
            );
        }

        return $adress[0];
	}
}