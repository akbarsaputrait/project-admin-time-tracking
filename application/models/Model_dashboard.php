<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{
    public function client_get($table)
    {
        $data = array();
        $sql = $this->db->get($table)->result();
        foreach ($sql as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'username' => $value->username,
                'email' => $value->email,
                'name' => $value->name,
                'status' => $value->status,
            );
        }
        return $data;
    }
}