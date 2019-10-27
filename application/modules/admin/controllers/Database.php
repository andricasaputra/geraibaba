<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller
{
	/*
	| -------------------------------------------------------------------
	| CLASS INFO
	| -------------------------------------------------------------------
	| Hanya Digunakan untuk fetch api provinsi dan kabupaten dari rajaongkir
	| untuk disimpan didalam databse kita, (table province dan city)
	|
	| IGNORE SAJA
	|*/

	protected $provinceTable = 'province';

	protected $cityTable = 'city';

	protected $key = 'a44873cbd905f850d8f9365fcdbd3e0d';

	protected $provinceApi = 'https://api.rajaongkir.com/starter/province';

	protected $kabupatenApi= 'http://api.rajaongkir.com/starter/city';

	public function index()
	{
		$data['title'] = 'Database';

		$this->load->view('layouts/header', $data);
		$this->load->view('database/index');
		$this->load->view('layouts/footer');
	}

	public function fetchProvinsi()
	{ 
		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		//   CURLOPT_URL => "$this->provinceApi",
		//   CURLOPT_RETURNTRANSFER => true,
		//   CURLOPT_ENCODING => "",
		//   CURLOPT_MAXREDIRS => 10,
		//   CURLOPT_TIMEOUT => 30,
		//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		//   CURLOPT_CUSTOMREQUEST => "GET",
		//   CURLOPT_HTTPHEADER => array(
		//     //"key: fbd791dbdaa5ed2f93cd83f0f68887ef"
		//     "key: $this->key"
		//   ),
		// ));

		// $response = curl_exec($curl);

		// $err = curl_error($curl);

		// curl_close($curl);

		// if ($err) {

		//   echo "cURL Error #:" . $err;

		// } else {
	  
		//   $datas = json_decode($response, true);
		  
		//   for ($i=0; $i < count($datas['rajaongkir']['results']); $i++){
		  
		//   	$data['province_id'] = $datas['rajaongkir']['results'][$i]['province_id'];
		//   	$data['province'] = $datas['rajaongkir']['results'][$i]['province'];
		//   	$data['created_at'] = $this->timeStamp();

		// 	$this->db->insert($this->provinceTable, $data);
			  
		//   }

		// }

		// $this->session->set_flashdata('sussess', 'Fetch Data Province Success');

		// redirect('admin/database/index');
	}

	public function fetchCity()
	{ 
		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		//   CURLOPT_URL => "$this->kabupatenApi",
		//   CURLOPT_RETURNTRANSFER => true,
		//   CURLOPT_ENCODING => "",
		//   CURLOPT_MAXREDIRS => 10,
		//   CURLOPT_TIMEOUT => 30,
		//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		//   CURLOPT_CUSTOMREQUEST => "GET",
		//   CURLOPT_HTTPHEADER => array(
		//     //"key: fbd791dbdaa5ed2f93cd83f0f68887ef"
		//     "key: $this->key"
		//   ),
		// ));

		// $response = curl_exec($curl);

		// $err = curl_error($curl);

		// curl_close($curl);

		// if ($err) {

		//   echo "cURL Error #:" . $err;

		// } else {
	  
		//   $datas = json_decode($response, true);
		 
		//   for ($i=0; $i < count($datas['rajaongkir']['results']); $i++){
		  
		//   	$data['city_id'] = $datas['rajaongkir']['results'][$i]['city_id'];
		//   	$data['province_id'] = $datas['rajaongkir']['results'][$i]['province_id'];
		//   	$data['province'] = $datas['rajaongkir']['results'][$i]['province'];
		//   	$data['type'] = $datas['rajaongkir']['results'][$i]['type'];
		//   	$data['city_name'] = $datas['rajaongkir']['results'][$i]['city_name'];
		//   	$data['postal_code'] = $datas['rajaongkir']['results'][$i]['postal_code'];
		//   	$data['created_at'] = $this->timeStamp();

		// 	$this->db->insert($this->cityTable, $data);
			  
		//   }

		// }

		// $this->session->set_flashdata('sussess', 'Fetch Data Province Success');

		// redirect('admin/database/index');
	}

	protected function timeStamp($tz = 'Asia/Makassar', $format = "Y-m-d H:i:s")
    {
    	$date = new DateTime('now', new DateTimeZone($tz));
        return $date->format($format);
    }
}