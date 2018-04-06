<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    private $table = 'client';

    public function count_client()
    {
        return $this->db->count_all_results();
    }

    public function get_client($id)
    {
       return $this->db->get_where($this->table, array('id' => $id));
    }

    public function get_user()
    {
        return $this->db->select('id, name, pc, email')
                        ->from('client')
                        ->get();
    }
}