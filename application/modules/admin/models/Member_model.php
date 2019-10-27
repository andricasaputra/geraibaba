<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model 
{
    protected $table = 'member';

    public function all()
    {
        $this->db->select('member.*, role.name');
        $this->db->from($this->table);
        $this->db->join('role', 'role.id = member.role_id', 'left');

    	$this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function delete($id)
    {
    	$this->db->where('id', $id);
		$this->db->delete($this->table);
    }

    public function updateRoleMember($id)
    {
        $role = $this->input->post('role');

        $this->db->set('role_id', $role);
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }

    public function count()
    {
        return $this->db->from($this->table)->count_all_results();
    }

    public function getCountMemberChartColumn()
    {
        $this->db->select('count(email) as email, date_created as date');
        $this->db->from($this->table);
        $this->db->group_by('date_created');

        return $this->db->get()->result_array();
    }

    public function getPercentage_member()
    {
        $this->db->select('date_created as year, count(id) as id');
        $this->db->from($this->table);
        $this->db->group_by('date_created');

        return $this->db->get()->result_array();
    }

    public function getActiveMember()
    {
        return $this->db->get_where($this->table, [
            'email'=>$this->session->userdata('email')
        ])->row_array();
    }
}