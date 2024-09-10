<?php

$curl = curl_init();

// Mengambil beberapa hasil channel dengan maxResults lebih dari 1
curl_setopt($curl, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/search?part=snippet&type=channel&q=sandhikagalih&key=AIzaSyAK3-u4O2SEU89HCs8Rk7bklcSYxd__NkI&maxResults=20");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);

curl_close($curl);

$result = json_decode($result, true);


// Periksa apakah ada kesalahan dalam respons API
if (isset($result['items'])) {
    $items = $result['items'];
} else {
    $items = [];
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../wpu-hut/css/bootstrap.css">
</head>

<body>

    <div class="container">
        <div class="row mt-5 justify-content-center">

            <!-- Looping hasil pencarian dari API YouTube -->
            <?php foreach ($items as $item) :
                $youtubeProfilePic = $item['snippet']['thumbnails']['medium']['url'];
                $channelName = $item['snippet']['title'];
                $description = $item['snippet']['description'];
            ?>
                <div class="col-md-4 text-center mb-4">
                    <img src="<?= $youtubeProfilePic ?>" class="img-fluid" alt="Channel Thumbnail">
                    <h1><?= $channelName ?></h1>
                    <p class="lead"><?= $description ?></p>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <script src="../wpu-hut/js/bootstrap.js"></script>
</body>

</html>