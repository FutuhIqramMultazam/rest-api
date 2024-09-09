<?php
$data = file_get_contents("coba.json"); // mengambil file json
$mahasiswa = json_decode($data, true); // merubah data json menjadi array assosiatif

var_dump($mahasiswa);
echo $mahasiswa[0]["namaOrtu"]["papah"];
