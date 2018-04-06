<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');
        $this->load->library('dateformat');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['count_client'] = $this->db->count_all_results('client');;
        $this->load->view('user', $data);
    }

    public function activities($id)
    {
        $this->load->view('activities');
    }

    public function get_client($id)
    {
        $sql = $this->model_user->get_client($id);
        foreach ($sql->result() as $key => $value) {
            $client[] = array(
                'id' => $value->id,
                'username' => $value->username,
                'pc' => $value->pc,
                'email' => $value->email,
                'name' => $value->name,
                'photo_profile' => $value->photo_profile,
                'status' => $value->status,
            );
        }
        echo json_encode($client);
    }

    public function get_user()
    {
        $client = array();
        $sql = $this->model_user->get_user();
        foreach ($sql->result() as $key => $value) {
            $client[] = array(
                'id' => $value->id,
                'pc' => $value->pc,
                'email' => $value->email,
                'name' => $value->name,
            );
        }
        $result = array(
            "data" => $client,
        );
        echo json_encode($result);
    }

    public function change_photo_profile($id)
    {
        $file = array();
        // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
        $config['encrypt_name'] = true; //enkripsi file name upload
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2097152';
        $config['remove_space'] = true;
        $config['max_width'] = '1200';
        $config['max_height'] = '1200';

        $this->load->library('upload', $config); //call library upload
        if ($this->upload->do_upload("photo_profile")) { //upload file
            $file = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
            $data = array(
                'photo_profile' => $file['upload_data']['file_name'],
            );
        }

        $this->db->where('id', $id);
        $update = $this->db->update('client', $data);
        if ($update) {
            $response = array(
                'data' => $data,
                'status' => 200,
                'message' => 'Photo profil berhasil diperbarui'
            );
        } else {
            $response = array(
                'status' => 405,
                'message' => 'Photo profil gagal diperbarui'
            );
        }
        echo json_encode($response);
    }

}
