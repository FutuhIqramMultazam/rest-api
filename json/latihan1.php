<?php

// $mahasiswa = [
//     [
//         "nama" => "Futuh Iqram Multazam",
//         "nim" => 2307014,
//         "email" => "futuhiqram@gmail.com"
//     ],
//     [
//         "nama" => "Fadilah Fatwa",
//         "nim" => 230702131,
//         "email" => "fadilahcantik@gmail.com"
//     ]
// ];

$dbh = new PDO("mysql:host=localhost;dbname=phpdasar", "root", "");
$stmt = $dbh->prepare("SELECT * FROM mahasiswa");
$stmt->execute();
$mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);



$data = json_encode($mahasiswa); // merubah array assosiatif menjadi file JSON

echo $data;
