<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class Mahasiswa_model extends CI_Model
{

    private $_client, $table = "mahasiswa", $key = "icam-key-API", $keyUser = "rahasia";

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest-api/app-rest-server/api/',
            'auth' => ["icam", "123"],
        ]);
    }

    public function getAllMhs()
    {
        // return $this->db->get($this->table)->result_array(); // ini di baca nya, dapatkan database dan sertakan juga
        // return $query->result_array(); in yang asli nya

        $response = $this->_client->request('GET', $this->table, [
            'query' => [$this->key => $this->keyUser]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['message'];
    }


    public function getMhsById($id)
    {

        $response = $this->_client->request('GET', $this->table, [
            'query' => [$this->key => $this->keyUser, 'id' => $id]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['message'][0];
    }


    public function tambahDataMahasiswa()
    {

        $data = [
            "nama" => $this->input->post("nama", true),
            "nim" => $this->input->post("nim", true),
            "email" => $this->input->post("email", true),
            "jurusan" => $this->input->post("jurusan", true),
            $this->key => $this->keyUser,
        ];

        $response = $this->_client->request("POST", $this->table, ["form_params" => $data]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function hapusDataMahasiswa($id)
    {
        $response = $this->_client->request("DELETE", $this->table, ["form_params" => ["id" => $id, $this->key => $this->keyUser]]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }


    public function ubahDataMahasiswa()
    {

        $data = [
            "nama" => $this->input->post("nama", true),
            "nim" => $this->input->post("nim", true),
            "email" => $this->input->post("email", true),
            "jurusan" => $this->input->post("jurusan", true),
            "id" => $this->input->post("id", true),
            $this->key => $this->keyUser,

        ];

        $response = $this->_client->request("PUT", $this->table, ["form_params" => $data]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post("keyword", true);
        $this->db->like("nama", $keyword);
        $this->db->or_like("jurusan", $keyword);
        $this->db->or_like("nim", $keyword);
        $this->db->or_like("email", $keyword);
        return $this->db->get($this->table)->result_array();
    }
}
