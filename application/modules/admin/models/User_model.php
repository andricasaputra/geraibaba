<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
    protected $table = 'user';

    public function getActiveUser()
    {
        return $this->db->get_where($this->table, [
            'email' =>$this->session->userdata('email')
        ])->row_array();
    }
}