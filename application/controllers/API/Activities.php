<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'Client.php';

class Activities extends Client
{
    private $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = $this->check_post();
    }

    public function index_post()
    {
        $data = array(
            'userid' => $this->client['id'],
            'date' => date("Y-m-d", strtotime($this->input->post('date'))),
            'time' => date('H:i:s', strtotime($this->input->post('time'))),
            'app' => $this->input->post('app'),
            'title' => $this->input->post('title'),
        );
        
        $insert = $this->db->insert('activities', $data);
        if ($insert) {
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

    public function index_get()
    {
        $this->output->set_content_type('application/json');
        $activities = array();
        $this->db->where('userid', $this->client['id']);
        $this->db->select('userid, date, time, app, title');
        $this->db->order_by('id', 'desc');
        $data = $this->db->get('activities')->result();

        if ($data) {
            foreach ($data as $key => $value) {
                $activities[] = array(
                    'userid' => $value->userid,
                    'date' => $value->date,
                    'time' => $value->time,
                    'app' => $value->app,
                    'title' => $value->title,
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
