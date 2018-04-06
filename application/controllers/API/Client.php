<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '../vendor/autoload.php';
require APPPATH . '/libraries/REST_Controller.php';
use \Firebase\JWT\JWT;

class Client extends REST_Controller
{
    private $secretkey = 'ZrmjJpOLm9';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
    }

    public function login_post()
    {
        header('Content-Type: application/json');

        $response[] = array();

        $this->load->model('model_login');
        $username = $this->post('username', true);
        $pass = $this->post('password', true);
        $data = $this->model_login->is_valid('client', $username);

        if ($data) {
            if (password_verify($pass, $data->password)) {
                $payload['id'] = $data->id;
                $payload['username'] = $data->username;
                $payload['email'] = $data->email;
                $payload['date'] = date('d-m-Y H:i:s');
                $output['token'] = JWT::encode($payload, $this->secretkey);

                $response = array('status' => 200, 'data' => $payload, 'auth' => $output);

                $data = array(
                    'token' => $output['token'],
                    'status' => 'Online',
                );

                $this->db->where('id',$payload['id']);
                $this->db->update('client', $data);
            } else {
                $response = array('status' => 500, 'message' => 'Internal Server Error');
            }
        } else {
            $response = array('status' => 404, 'message' => 'User not found.');
        }
        echo json_encode($response);
    }

    public function logout_post()
    {
        header('Content-Type: application/json');

        $response[] = array();

        $header = $this->input->get_request_header('Authorization', true);
        if ($decode = JWT::decode($header, $this->secretkey, array('HS256'))) {
            $set = array(
                'token' => null,
                'status' => 'Offline'
            );
            $this->db->where('id', $decode->id);
            $query = $this->db->update('client', $set);
            if ($query) {
                $response = array(
                    'success' => true,
                    'message' => 'User Logout',
                );
            } else {
                $response = array(
                    'error' => true,
                    'message' => 'Logout failed',
                );
            }
            echo json_encode(array('response' => $response));
        }
    }

    public function register_post()
    {
        $username = $this->post('username', true);
        $password = $this->post('password', true);
        $email = $this->post('email', true);
        $name = $this->post('name', true);
        $pc = $this->post('pc', true);

        $data = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email,
            'name' => $name,
            'pc' => $pc,
        );

        $this->db->insert('client', $data);
        echo json_encode($data);
    }

    public function check_post()
    {
        header('Content-Type: application/json');

        $header = $this->input->get_request_header('Authorization', true);
        $client = array();

        if ($header === null) {
            return show_error('Forbidden',403);
        } else {
            if ($decode = JWT::decode($header, $this->secretkey, array('HS256'))) {
                $data = $this->db->query('SELECT * FROM client WHERE id = "' . $decode->id . '" LIMIT 1');
                if ($data) {
                    foreach ($data->result() as $row) {
                        $client[] = array(
                            'id' => $row->id,
                            'username' => $row->username,
                            'email' => $row->email,
                            'pc' => $row->pc
                        );
                    }
                    return $client;
                }
                return false;
            }
            return false;
        }
    }
}