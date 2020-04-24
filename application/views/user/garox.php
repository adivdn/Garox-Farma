<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url().'assets/gambar/telkom.png'?>">
    <meta http-equiv="refresh" content="3;url=<?= site_url().'user/index'?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url().'assets/css/garox.css'?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Garox Farma</title>
</head>

<body>
    <div class="judul">
        <u>Terima kasih telah mengakses website ini</u>
    </div>
    <div class="kecil">
        <p id="garox">dalam beberapa detik akan automatis kembali ke halaman awal website</p>
    </div>
    <div id="demo" class="carousel slide" data-ride="carousel" data-interval = "10000">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>

        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner"  data-interval = "10000">
            <div class="carousel-item active">
                <img src="<?= base_url().'/assets/gambar/lordgarox.jpg'?>" alt="Lord Garox">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url().'/assets/gambar/manggarox.jpg'?>" alt="Mang Garox">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
</body>

</html>