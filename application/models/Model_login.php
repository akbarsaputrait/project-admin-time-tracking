<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function is_valid($table ,$username)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->row();
    }

    public function is_valid_num($username)
    {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
