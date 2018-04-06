<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'Client.php';

class Task extends Client
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

        var_dump($status);exit;

        $response = array();
        
        /* 
        CHECK JIKA ADA TASK YANG SAMA DENGAN POST, 
        MAKA INSERT STATUS UNTUK TASK TERSEBUT
        */
        $check = $this->m_api->check_task($task);
        if ($check) {
            
            // INSERT STATUS UNTUK TASK TERSEBUT
            $data_status = array(
                'status' => $status,
                'date' => $date,
                'id_task' => $check->id_task,
            );

            $this->db->insert('status_task', $data_status);
            $response = array(
                'status' => $data_status
            );
        } else {
            $this->db->trans_start();
            
            // INSERT TASK TERBARU DAN BELUM MEMILIKI STATUS
            $data_task = array(
                'userid' => $this->client['id'],
                'id_project' => $project,
                'name' => $task
            );
            $this->db->insert('task', $data_task);

            // INSERT STATUS TASK TERBARU
            $data_status = array(
                'status' => $status,
                'date' => $date,
                'id_task' => $this->db->insert_id()
            );

            $this->db->insert('status_task', $data_status);
            $this->db->trans_complete();

            $response = array(
                'task' => $data_task,
                'status' => $data_status,
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
