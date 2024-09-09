<?php

$data = file_get_contents("data/pizza.json");
$menu = json_decode($data, true);

$menu = $menu["menu"];
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan JSON pake PHP</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="" width="200">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="#">All Menu</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>All Menu</h1>
            </div>
        </div>

        <div class="row mt-2">

            <?php foreach ($menu as $mn): ?>
                <div class="col-md-4">

                    <div class="card mb-4">
                        <img src="img/menu/<?= $mn["gambar"] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $mn["nama"] ?></h5>
                            <p class="card-text"><?= $mn["deskripsi"] ?></p>
                            <h5>Rp. <?= $mn["harga"] ?></h5>
                            <a href="#" class="btn btn-primary">Pesan sekarang</a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>

    </div>


    <script src="js/bootstrap.js"></script>
</body>

</html>