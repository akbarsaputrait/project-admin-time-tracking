<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_tasks');
        $this->load->library('dateformat');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function get_count_status($id)
    {
        $data = $this->model_tasks->get_count_status($id);
        echo json_encode($data);
    }

    public function get_tasks($id)
    {
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        
        $list = $this->model_tasks->get_datatables($id, $length, $start);
		$data = array();
        $no = intval($this->input->post('start'));
        $x = 0;
        
		foreach ($list as $key => $value) {
            if ($value->waiting === null) {
                $data[] = array(
                    'id' => $x++,
                    'task' => $value->name,
                    'waiting' => '-',
                    'progress' => $this->dateformat->tgl($value->progress, true),
                    'done' => '-',
                    'project' => $value->project,
                );
            } elseif ($value->progress === null) {
                $data[] = array(
                    'id' => $x++,
                    'task' => $value->name,
                    'waiting' => $this->dateformat->tgl($value->waiting, true),
                    'progress' => '-',
                    'done' => '-',
                    'project' => $value->project,
                );
            } elseif ($value->done === null) {
                $data[] = array(
                    'id' => $x++,
                    'task' => $value->name,
                    'waiting' => $this->dateformat->tgl($value->waiting, true),
                    'progress' => $this->dateformat->tgl($value->progress, true),
                    'done' => '-',
                    'project' => $value->project,
                );
            } else {
                $data[] = array(
                    'id' => $x++,
                    'task' => $value->name,
                    'waiting' => $this->dateformat->tgl($value->waiting, true),
                    'progress' => $this->dateformat->tgl($value->progress, true),
                    'done' => $this->dateformat->tgl($value->done, true),
                    'project' => $value->project,
                );
            }
        }

		$output = array(
			"draw" => intval($this->input->post('draw')),
			"recordsTotal" => $this->model_tasks->count_all($id),
			"recordsFiltered" => $this->model_tasks->count_filtered($id),
			"data" => $data,
		);
		echo json_encode($output);

    }

    public function get_project($id)
    {
        $data = array();

        $sql = $this->model_tasks->project($id);

        foreach ($sql->result() as $key => $value) {
            $data[] = array(
                'project' => $value->name,
            );
        }
        echo json_encode($data);
    }
}
