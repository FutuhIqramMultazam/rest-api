<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Mahasiswa extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'mhs_model'); // kita dapat ilmu baru di sini, param kedua itu berfungsi untuk alias, tapi peringatan di sini ketika kita sudah membuat alias tidak bisa lagi menggunakan nama asli nya, nama asli nya itu yang mana?, yang ini 'Mahasiswa_model'
        $this->methods['index_get']['limit'] = 1000;
    }


    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $mahasiswa = $this->mhs_model->getMahasiswa();
        } else {
            $mahasiswa = $this->mhs_model->getMahasiswa($id);
        }

        if ($mahasiswa) {
            $this->response([
                'status' => true,
                'message' => $mahasiswa
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => "Kamu mau menampilkan data sesuai ID ya?, id dengan nomor $id ga ada"
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {

            $this->response([
                'status' => false,
                'message' => "Harus pake ID kalo mau hapus data"
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {

            if ($this->mhs_model->deleteMahasiswa($id) > 0) {

                // ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => "Id yang bernomor $id berhasil di hapus"
                ], REST_Controller::HTTP_OK);
            } else {

                // id not found
                $this->response([
                    'status' => false,
                    'message' => "Kamu mau menghapus data sesuai ID ya?, id dengan nomor $id ga ada"
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }


    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'nim' => $this->post('nim'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if ($this->mhs_model->createMahasiswa($data) > 0) {
            $this->response([
                'status' => true,
                'message' => "New mahasiswa has been created"
            ], REST_Controller::HTTP_CREATED);
        } else {

            $this->response([
                'status' => false,
                'message' => "Failed to create new data!"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nama' => $this->put('nama'),
            'nim' => $this->put('nim'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->mhs_model->updateMahasiswa($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => "Data mahasiswa has been updated"
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'status' => false,
                'message' => "Failed to update data!"
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
