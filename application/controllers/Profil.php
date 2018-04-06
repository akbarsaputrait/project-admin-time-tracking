<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function index()
    {
        $this->load->view('profil');
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
                'photo_profile' => $file['upload_data']['file_name']
            );

        }

        $this->db->where('id', $id);
        $update = $this->db->update('admin', $data);
        if ($update) {
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
