<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_dashboard');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $this->load->view('dashboard');
    }

    public function dashboard()
    {
        $data = $this->model_dashboard->client_get('client');
        $result = array(
            "data" => $data,
        );
        echo json_encode($result);
    }
}
