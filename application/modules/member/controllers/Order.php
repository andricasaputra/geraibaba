<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller
{
	protected $member;

	protected $serverKey = 'SB-Mid-server-JjWxuiSm6ZcOusuIiGQXY69i';

	protected $production = false;

	protected $provinsiAsal = 22;

	protected $kabupatenAsal = 69;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Member_model');
		$this->load->model('Order_model');
		$this->load->model('Product_model');
		$this->load->model('Address_model');

        //midtrans config
        $params = [
        	'server_key' => "$this->serverKey", 
        	'production' => $this->production
        ];

        $this->load->helper('url');	
		$this->load->library('midtrans');
		$this->load->library('veritrans');

		$this->midtrans->config($params);
		$this->veritrans->config($params);

		$this->member = $this->Member_model->getMember();
	}

	public function add()
	{
		$data = [
			'id' => rand(),
			'product_id' => $this->input->post('product_id'),
			'name' => $this->input->post('nama_product'),
			'stock' => $this->input->post('stock'),
			'kategori' => $this->input->post('kategori'),
			'gambar_product' => $this->input->post('gambar_product'),
			'qty' => $this->input->post('qty'),
			'price' => $this->input->post('harga'),
			'berat' => $this->input->post('berat')
		];

		$this->cart->insert($data);

		redirect('member/order/checkout');
	}

	public function delete($rowid)
	{
		$data = [
			'rowid' => $rowid,
			'qty' => 0
		];

		$this->cart->update($data);

		redirect('member/order/checkout');
	}

	public function checkout()
	{
		$data['title'] = 'Keranjang Belanja';
		$data['cart'] = $this->cart->contents();
		$data['member'] = $this->memberShippingAddress();
		$data['asal'] = [
			'provinsi' => $this->provinsiAsal, 
			'kabupaten' => $this->kabupatenAsal
		];

		$this->load->view('layouts/header', $data);
		$this->load->view('checkout', $data);
		$this->load->view('layouts/footer');
	}

	public function cancel($order_id)
	{
		$this->veritrans->cancel($order_id);

		$this->Order_model->cancel($order_id);

		$this->session->set_flashdata('message', 'Transaksi berhasil dibatalkan.');

		redirect('member/order/transaksi');
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

        return array_merge($this->member ?? [], $adress[0]);
	}

	public function token()
    {
		$item_details = [];

		$kurir = $this->input->get('kurir');

		$total = intval($this->input->get('total'));

		$totalOngkir = intval($this->input->get('ongkir'));

    	foreach($this->cart->contents() as $key => $item){

    		$transaction_details = [
			  'order_id' => $item['id'],
			  'gross_amount' => $total,
			];
    			
			$item_details[] = [
	    		
			  'id' => $item['product_id'],
			  'price' => (intval($item['subtotal']) / $item['qty']),
			  'quantity' => $item['qty'],
			  'name' => ucwords($item['kategori']) . ' ' . $item['name'],
			  'category' => ucwords($item['kategori'])

	    	];
    	}

    	// Add Ongkir
    	$item_details[] = [
	    		
		  'id' => 'ongkir',
		  'price' => $totalOngkir,
		  'quantity' => 1,
		  'name' => 'Jasa Pengiriman (' . strtoupper($kurir) .')'

    	];

		$billing_address = [
		  'first_name'    => $this->member['nama_depan'],
		  'last_name'     => $this->member['nama_belakang'],
		  'address'       => $this->member['alamat'],
		  'phone'         => $this->member['telp']
		];

		// Optional
		$shipping_address = [
		  'first_name'    => $this->member['nama_depan'],
		  'last_name'     => $this->member['nama_belakang'],
		  'address'       => $this->member['alamat'],
		  'phone'         => $this->member['telp'],
		];

		// Optional
		$customer_details = [
		  'first_name'    => $this->member['nama_depan'],
		  'last_name'     => $this->member['nama_belakang'],
		  'email'         => $this->member['email'],
		  'phone'         => $this->member['telp'],
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		];

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;

        $custom_expiry = [
            'start_time' => date("Y-m-d H:i:s O", time()),
            'unit' => 'minute', 
            'duration'  => 1440
        ];
        
        $transaction_data = [
            'transaction_details' => $transaction_details,
            'item_details'        => $item_details,
            'customer_details'    => $customer_details,
            'credit_card'         => $credit_card,
            'expiry'              => $custom_expiry,
        ];

		$snapToken = $this->midtrans->getSnapToken($transaction_data);

		echo $snapToken;
    }

    public function finish()
    {
    	$data['title'] = 'Status Transaksi';
    	$data['member'] = $this->member;
    	$result = json_decode($this->input->post('result_data'));
    	$data['res'] = (array) $result;
    	$stock = $this->input->post('stock');

		$order_id = $data['res']['order_id'];
		$email 	  = $this->session->userdata('email');
		$total = $data['res']['gross_amount'];
		$time = $data['res']['transaction_time'];
		$transaction_status = $data['res']['transaction_status'];
		$instruction_url = $data['res']['pdf_url'];

		$data_order = [
			'order_id' => $order_id,
			'email' => $email,
			'price' => $this->cart->total(),
			'ongkir' => $this->input->post('ongkir'),
			'total' => $total,
			'alamat_pengiriman' => htmlspecialchars(trim($this->input->post('alamat_pengiriman'))),
			'catatan' => htmlspecialchars($this->input->post('catatan')),
			'time' => $time,
			'transaction_status' => $transaction_status,
			'resi' => '-',
			'kurir' => $this->input->post('kurir'),
			'snap_token' => $this->input->post('snap_token'),
			'instruction_url' => $instruction_url
		];

		$product_id = $this->input->post('product_id');
		$qty = $this->input->post('qty');

		$product_order = [];

		//merge array product id dengan qty nya
		foreach ($product_id as $key => $value) {
			$product_order[] += $value;
			$product_order[] += $qty[$key];
		}

		// Gabungkan setiap 2 value menjadi 1 array
		$product_order = array_chunk($product_order, 2);

		$q = $this->Order_model->exist($order_id);

		if ( $q->num_rows() == 0 ) {

		   $this->Order_model->create($data_order, $product_order, $stock);
		}
		
		$this->cart->destroy();

    	redirect('member/order/transaksi');
    }

    public function notification()
    {
    	try {
    	    
    		$json_result = file_get_contents('php://input');
      		$result = json_decode($json_result, true);

    		$datas = $this->veritrans->status($result['order_id']);

    		$this->Order_model->createDetails($result['order_id'], json_encode($datas));
    	
    	} catch (\Exception $e) {
    	    
    	    echo json_encode(["message" => "data tidak ditemukan"]);
    		
    	}
    }

    public function transaksi($order_id = null)
    {
    	if (is_null($order_id) || $order_id == '') {

    		$data['title'] = 'Order Status';
	    	$data['member'] = $this->member;
	    	$data['order'] = $this->Order_model->hasOrder()->all();

	    	$this->load->view('layouts/header', $data);
	    	$this->load->view('transaksi', $data);
	    	$this->load->view('layouts/footer');

    	} else {
    		
    		$this->transaksiDetails($order_id);

    	}
    }

    public function transaksiDetails($order_id)
    {
    	$data['stt'] = $this->veritrans->status($order_id);
	    $data['title'] = 'Transaksi Detail';
	    $data['member'] = $this->member;
	    $data['orders']= $this->Order_model->status($data['stt']);
		$data['kurir'] = $this->Order_model->withKurir();

		$this->Order_model->update($data['stt'], $order_id);

	    $this->load->view('layouts/header', $data);
	    $this->load->view('transaksi_details', $data);	
	    $this->load->view('layouts/footer');
    }

    public function getEkspedisiCost()
	{
		$origin = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = $this->input->get('courier');

		$data = array('origin' => $origin,
				'destination' => $destination, 
				'berat' => $berat, 
				'courier' => $courier  
		);
		
		$this->load->view('ongkir/getCost', $data);
	}

	public function getResi()
	{
		$waybill = $this->input->get('waybill');

		$data = array('waybill' => $waybill);
		
		$this->load->view('ongkir/getResi', $data);
	}

	public function instruction()
	{
    	$data['member'] = $this->member;
		$data['title'] = "Syar'i Is Beauty | Gerai Baba - Member";

		$this->load->view('layouts/header', $data);
		$this->load->view('petunjuk');
		$this->load->view('layouts/footer');
	}
}