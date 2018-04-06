<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'Client.php';

class Screenshot extends Client
{
    private $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = $this->check_post();
    }

    public function index_get()
    {
        $this->output->set_content_type('application/json');
        $screenshot = array();
        $this->db->where('userid', $this->client['id']);
        $this->db->order_by('id', 'desc');
        $this->db->select('userid, filename, date, time');
        $data = $this->db->get('screenshot')->result();

        if($data)
        {
            foreach ($data as $key => $value) {
                $screenshot[] = array(
                    'userid' => $value->userid,
                    'app' => $value->app,
                    'title' => $value->title,
                    'filename' => $value->app,
                    'date' => $value->date,
                    'time' => $value->time
                );
            }   

            $response = array(
                'data' => $data,
                'success' => true
            );
        } else {
            $response = array(
                'error' => true
            );
        }
        echo json_encode($response);
    }

    public function index_post()
    {
        $file = array();
        
        $config['encrypt_name'] = true; 
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2097152';
        $config['remove_space'] = true;

        $this->load->library('upload', $config); 
        if ($this->upload->do_upload("screenshot")) { 
            $file = array ('upload_data' => $this->upload->data());

            $data = array (
                'userid' => $this->client['id'],
                'date' => date("Y-m-d", strtotime($this->input->post('date'))),
                'time' => date('H:i:s'),
                'filename' => $file['upload_data']['file_name'],
                'app' => $this->input->post('app'),
                'title' => $this->input->post('title')
            );
        }   
        $insert = $this->db->insert('screenshot', $data);

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
}