<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Screenshots extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_screenshots');
        $this->load->library('dateformat');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function get_screenshot_today($id)
    {
        header('Content-Type: application/json');
        $data = array();

        $sql = $this->model_screenshots->today($id);
        if (empty($sql->result())) {
            $data[] = array(
                'data' => 'null',
            );
        } else {
            foreach ($sql->result() as $key => $value) {
                $data[] = array(
                    'filename' => $value->filename,
                    'date' => $this->dateformat->tgl($value->date, true),
                    'time' => $value->time,
                    'app' => $value->app,
                    'title' => $value->title,
                );
            }
        }
        echo json_encode($data);
    }

    public function get_screenshot_yesterday($id)
    {
        header('Content-Type: application/json');
        $data = array();
        $sql = $this->model_screenshots->yesterday($id);
        if (empty($sql->result())) {
            $data[] = array(
                'data' => 'null',
            );
        } else {
            foreach ($sql->result() as $key => $value) {
                $data[] = array(
                    'filename' => $value->filename,
                    'date' => $this->dateformat->tgl($value->date, true),
                    'time' => $value->time,
                    'app' => $value->app,
                    'title' => $value->title,
                );
            }
        }
        echo json_encode($data);
    }

    public function get_screenshot_week($id)
    {
        header('Content-Type: application/json');
        $data = array();
        $sql = $this->model_screenshots->week($id);
        if (empty($sql->result())) {
            $data[] = array(
                'data' => 'null',
            );
        } else {
            foreach ($sql->result() as $key => $value) {
                $data[] = array(
                    'filename' => $value->filename,
                    'date' => $this->dateformat->tgl($value->date, true),
                    'time' => $value->time,
                    'app' => $value->app,
                    'title' => $value->title,
                );
            }
        }
        echo json_encode($data);
    }

    public function get_screenshot_everytime_by_date($id)
    {
        header('Content-Type: application/json');

        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');

        $data = array();
        $sql = $this->model_screenshots->by_date($id, $startdate, $enddate);
        if(empty($sql->result())) {
            $data[] = array(
                'status' => 404,
                'message' => 'Tangkapan layar tidak ditemukan'
            );
        } else {
            foreach ($sql->result() as $key => $value) {
                $data[] = array(
                    'filename' => $value->filename,
                    'date' => $this->dateformat->tgl($value->date, true),
                    'time' => $value->time,
                    'app' => $value->app,
                    'title' => $value->title,
                    'status' => 200
                );
            }
        }
        echo json_encode($data);
    }

    public function get_all_ss($id)
    {
        header('Content-Type: application/json');

        $data = array();
        $sql = $this->model_screenshots->all($id);

        foreach ($sql->result() as $key => $value) {
            $data[] = array(
                'filename' => $value->filename,
                'date' => $this->dateformat->tgl($value->date, true),
                'time' => $value->time,
                'app' => $value->app,
                'title' => $value->title,
            );
        }

        $output = array(
            'data' => $data,
        );

        echo json_encode($output);
    }
}