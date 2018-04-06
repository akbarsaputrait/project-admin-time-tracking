<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_login');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function dashboard()
    {
        $this->load->view('dashboard');
    }

    public function login()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run()) {
            $check = $this->model_login->is_valid('admin', $user);
            if ($check) {
                if (password_verify($pass, $check->password)) {
                    $data_session = array(
                        'id' => $check->id,
                        'status' => "login"                    
                    );
                    $this->session->set_userdata($data_session);
                    redirect(base_url('dashboard'));
                }
            } else {
                redirect(base_url());
            }
        } else {
            $this->load->view('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function get_admin($id)
    {
        $query = $this->db->get_where('admin', array('id' => $id))->result();
        foreach ($query as $key => $value) {
            $data[] = array(
                'username' => $value->username,
                'email' => $value->email,
                'photo_profile' => $value->photo_profile
            );
        }
        echo json_encode($data);
    }
}
