<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'Client.php';

class Tasks extends Client
{
    private $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = $this->check_post();
        $this->load->model('api/m_api');
    }

    public function index_post()
    {
        $task = $this->input->post('name');
        $status = $this->input->post('status');
        $date = date("Y-m-d", strtotime($this->input->post('date')));
        $project = $this->input->post('project');
        $check = $this->m_api->check_task($task);

        if ($status === 'Waiting') {
            $data = array(
                'waiting' => date("Y-m-d", strtotime($this->input->post('date'))),
                'userid' => $this->client['id'],
                'id_project' => $project,
                'name' => $task
            );
        } elseif ($status === 'Progress') {
            $data = array(
                'progress' => date("Y-m-d", strtotime($this->input->post('date'))),
                'userid' => $this->client['id'],
                'id_project' => $project,
                'name' => $task
            );
        } elseif ($status === 'Done') {
            $data = array(
                'done' => date("Y-m-d", strtotime($this->input->post('date'))),
                'userid' => $this->client['id'],
                'id_project' => $project,
                'name' => $task
            );
        } else {
          $data = array(
            'userid' => $this->client['id'],
            'id_project' => $project,
            'name' => $task
          );
        }

        if($check) {
          $this->db->where('id', $check->id);
          $this->db->update('tasks', $data);

          $response = array(
            'data' => $data,
            'status' => $status,
            'message' => 'Status tugas diperbarui'
          );
        } else {
          $this->db->insert('tasks', $data);
          $response = array(
            'data' => $data,
            'status' => $status,
            'message' => 'Tugas baru'
          );
        }

        

        echo json_encode($response);
    }

    public function index_get()
    {
        $this->output->set_content_type('application/json');
        $task = array();
        $this->db->where('userid', $this->client['id']);
        $this->db->select('userid, task, date, status');
        $data = $this->db->get('task')->result();
        if ($data) {
            foreach ($data as $key => $value) {
                $task[] = array(
                    'userid' => $value->userid,
                    'task' => $value->task,
                    'date' => $value->date,
                    'status' => $value->status,
                );
            }

            $response = array(
                'data' => $data,
                'success' => true,
            );
        } else {
            $response = array(
                'error' => true,
            );
        }
        echo json_encode($response);
    }
}
