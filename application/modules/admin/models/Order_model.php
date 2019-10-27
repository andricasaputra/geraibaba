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

    public function allObject()
    {
        $this->db->order_by('time', 'DESC');
        return $this->db->get($this->table)->result();
    }

    public function first($order_id)
    {
    	return $this->db->get_where($this->table, [
    		'order_id' => $order_id
    	])->row_array();
    }

    public function updateStatus($order_id, $data)
    {
    	$this->db->set('transaction_status', $data);
		$this->db->where('order_id', $order_id);
		$this->db->update($this->table);
    }

    public function expire($order_id)
    {
    	$this->db->set('transaction_status', 'expire');
		$this->db->where('order_id', $order_id);
		$this->db->update($this->table);
    }

    public function cancel($order_id)
    {
    	$this->db->set('transaction_status', 'cancel');
		$this->db->where('order_id', $order_id);
		$this->db->update($this->table);
    }

    public function updateResi($order_id)
    {
        $this->db->set('resi', $this->input->post('resi'));
        $this->db->set('kurir', strtolower($this->input->post('kurir')));
        $this->db->where('order_id', $order_id);
        $this->db->update($this->table);
    }

    public function count()
    {
        return $this->db->from($this->table)->count_all_results();
    }

    public function getRevenue()
    {
        $this->db->select('YEAR(time) as year, sum(total) as total');
        $this->db->from($this->table);
        $this->db->where('transaction_status', 'settlement');
        $this->db->group_by('year(time)');

        return $this->db->get()->result_array();
    }

    public function getPercentage()
    {
        //report qty svo diagram pie
        $this->db->select('year(time) as time, count(time) as id');
        $this->db->from($this->table);
        $this->db->where('transaction_status', 'settlement');
        $this->db->group_by('year(time)');

        return $this->db->get()->result_array();
    }

    public function getCountOrderChartColumn()
    {
        $this->db->select('count(transaction_status) as count, transaction_status as stt');
        $this->db->from($this->table);
        $this->db->group_by('transaction_status');

        return $this->db->get()->result_array();
    }

    public function getPercentage_qtyorder()
    {
        $this->db->select('transaction_status as status, count(order_id) as order_id');
        $this->db->from($this->table);
        $this->db->group_by('transaction_status');

        return $this->db->get()->result_array();
    }
}