<?php

defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('max_execution_time', 600);

class Address_model extends CI_Model 
{
	protected $provinceTable = 'province';

	protected $cityTable = 'city';

	protected $province = [];

	protected $dummyProvince = [];

	protected $apiKey = 'a44873cbd905f850d8f9365fcdbd3e0d';

	public function getProvince($id = null)
	{
		return $this->reset()->initProvince($id)->province;
	}

	public function getAllProvince()
	{	
		return $this->reset()->initProvince()->province;
	}

	public function getDummyProvince()
	{
		return $this->initProvince()->dummyProvince;
	}

	private function initProvince($id = null)
	{ 
		$this->db->from($this->provinceTable);

		if (isset($id)) {

			$this->db->where('province_id', $id);

		  	$this->province[] = $this->db->get()->row_array();

		} else {

		  	$province = $this->db->get()->result_array();
		  		
			 for ($i=0; $i < count($province) ; $i++){
			  
			    $this->province[] = "<option value='".$province[$i]['province_id']."'>".$province[$i]['province']."</option>";

			    $this->dummyProvince[] = $province[$i]['province'];
			  
			}
		}

		unset($id);

		return $this;
	}

	public function getKabupaten($provinsi_id, $id = null)
	{
		$this->db->from($this->cityTable);
		$this->db->where('province_id', $provinsi_id);
		
		if (isset($id)) {

			$this->db->where('city_id', $id);

			$datas = $this->db->get();

			return $datas->result_array(); 

		} else {

			$datas = $this->db->get();

			$city =  $datas->result_array();

			for ($j=0; $j < count($city); $j++){
	  
		    	echo "<option value='".$city[$j]['city_id']."'>".$city[$j]['city_name']." (".$city[$j]['type'].")"."</option>";

		  	}
		}
		
	}

	public function getJasaOngkir(array $data)
	{
		$origin = $data['origin'];
		$destination = $data['destination'];
		$berat = $data['beratBarang'] == 0 ? 100 : $data['beratBarang'];
		$courier = $data['courier'];
	
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: $this->apiKey"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {

		  return "cURL Error #:" . $err;

		} else {

		  return json_decode($response, true);

		}
	}

	public function reset()
	{
		$this->province = [];

		return $this;
	}
}