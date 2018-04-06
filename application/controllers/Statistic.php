<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statistic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_statistic');
        $this->load->library('dateformat');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function get_stats_app($id)
    {
        $sql = $this->model_statistic->activities($id);
        foreach ($sql->result() as $data) {
            $hasil[] = $data;
        }
        echo json_encode($hasil);
    }

    public function data_stats_task($id)
    {
        $hasil = array();
        
        $sql = $this->model_statistic->tasks($id);
        foreach ($sql->result() as $data) {
            $hasil[] = $data;
        }
        echo json_encode($hasil);
    }
}