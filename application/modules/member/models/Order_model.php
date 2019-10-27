<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model 
{
	protected $table = 'tbl_order';
	protected $pivot = 'order_product';

	public function all()
	{
		return $this->db->get($this->table)->result_array();
	}

	public function hasOrder()
	{
		$this->db->order_by('id', 'desc');
    	$this->db->where('email', $this->session->userdata('email'));

    	return $this;
	}

	public function status($midtrans_status)
	{
		return $this->db->get_where($this->table, [
			'order_id' => $midtrans_status->order_id
		])->row_array();
	}

	public function cancel($order_id)
	{
		//Mulai DB Transaction
		$this->db->trans_start();

		$this->db->set('transaction_status', 'cancel');
		$this->db->where('order_id', $order_id);
		$this->db->update($this->table);

		$this->db->select('product_id, qty');
		$this->db->from($this->pivot);
		$this->db->where_in('order_id', $order_id);

		$order_product = $this->db->get()->result_array();

		// Jika cancel, kembalikan stock product seperti stock awal
		foreach ($order_product as $key => $value) {

			$getStockProduct = $this->getStockProduct($value['product_id']);
			$newStock = intval($getStockProduct->stock) + intval($value['qty']);

			$this->updateStockProduct($value['product_id'], $newStock);
		}

		$this->db->trans_complete();
	}

	public function withKurir()
	{
		$this->db->select('kurir')->from($this->table);

		return $this->db->get()->row_array();
	}

	public function update($data, $order_id)
	{
		$this->db->set('transaction_status', $data->transaction_status);
		$this->db->where('order_id', $order_id);
		$this->db->update('tbl_order');
	}

	public function withCount()
	{
		return $this->db->count_all_results();
	}

	public function exist($order_id)
	{
		$this->db->where('order_id', $order_id);

		return $this->db->get($this->table);
	}

	public function create($data, $product, $stock)
	{
		//Mulai DB Transaction
		$this->db->trans_start();

		$products = [];
		$insert = [];

		// Jadikan array produk ke assocative
		foreach ($product as $key => $value) {

			$products['product_id'] = $value[0];
			$products['qty'] = $value[1];
			$products['order_id'] = $data['order_id'];
			$products['created_at'] = $this->timeStamp();

			// simpan data ke array untuk bulk insert
			$insert[] = $products;

			$getStockProduct = $this->getStockProduct($value[0]);
			$newStock = intval($getStockProduct->stock) - intval($value[1]);

			// Kurangi stock product jika user telah checkout
			$this->updateStockProduct($value[0], $newStock);
		}

		$this->db->insert($this->table, $data);
		$this->db->insert_batch($this->pivot, $insert);
		
		$this->db->trans_complete();
	}

	public function createDetails($order_id, $datas)
	{
		$cek = $this->db->get_where('order_details', [
			'order_id' => $order_id
		])->row_array();

		if (is_null($cek)) {

			$data = [
				'order_id' => $order_id,
				'message' => $datas,
				'created_at' => $this->timeStamp()

			];

			$this->db->insert('order_details', $data);

		} else {

			$this->db->set('message', $datas);
			$this->db->set('updated_at', $this->timeStamp());
			$this->db->where('order_id', $order_id);
			$this->db->update('order_details');

		}
	}

	protected function getStockProduct($id)
	{
		$this->db->select('stock');
		$this->db->from('product');
		$this->db->where('id', $id);

		return $this->db->get()->row();
	}

	protected function updateStockProduct($id, $stock)
	{
		$this->db->set('stock', $stock);
		$this->db->where('id', $id);
		$this->db->update('product');
	}

	protected function timeStamp($tz = 'Asia/Makassar', $format = "Y-m-d H:i:s")
    {
    	$date = new DateTime('now', new DateTimeZone($tz));
        return $date->format($format);
    }
}