<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activities extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_activities');
        $this->load->library('dateformat');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function activities_today($id)
    {
        $data = array();
        
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $list = $this->model_activities->get_acivities_today($id, $length, $start);

        foreach ($list as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'app' => $value->app,
                'title' => $value->title,
                'date' => $this->dateformat->tgl($value->date, false),
                'time' => $value->time.' WIB'
            );
        }

        $output = array(
			"draw" => intval($this->input->post('draw')),
			"recordsTotal" => $this->model_activities->count_all_today($id),
			"recordsFiltered" => $this->model_activities->count_filtered_today($id),
			"data" => $data,
		);

        echo json_encode($output);
    }

    public function activities_yesterday($id)
    {
        $data = array();

        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));

        $list = $this->model_activities->get_activities_yesterday($id, $length, $start);
        foreach ($list as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'app' => $value->app,
                'title' => $value->title,
                'date' => $this->dateformat->tgl($value->date, false),
                'time' => $value->time.' WIB'
            );
        }

        $output = array(
			"draw" => intval($this->input->post('draw')),
			"recordsTotal" => $this->model_activities->count_all_yesterday($id),
			"recordsFiltered" => $this->model_activities->count_filtered_yesterday($id),
			"data" => $data,
		);

        echo json_encode($output);
    }

    public function activities_everytime($id)
    {
        $data = array();

        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));

        $list = $this->model_activities->get_activities_everytime($id, $length, $start);
        
        foreach ($list as $key => $value) {
            $data[] = array(
                'id' => $value->id,
                'app' => $value->app,
                'title' => $value->title,
                'date' => $this->dateformat->tgl($value->date, false),
                'time' => $value->time.' WIB'
            );
        }

        $output = array(
			"draw" => intval($this->input->post('draw')),
			"recordsTotal" => $this->model_activities->count_all_everytime($id),
			"recordsFiltered" => $this->model_activities->count_filtered_everytime($id),
			"data" => $data,
		);

        echo json_encode($output);
    }
}