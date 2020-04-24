<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url().'assets/gambar/telkom.png'?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url().'/assets/css/route.css'?>">
    <title>Garox FARMA | Route</title>
</head>

<body>
    <div class="judul">
        <p>Ada yang bisa kami bantu?</p>
    </div>
    <div class="container-fluid">
        <div class="btn-group-vertical">
            <a href="<?= site_url().'user/menuBarang'?>" id="geser" class="btn btn-danger">Belanja</a>
            <a href="<?= site_url().'user/showCart'?>" id="geser" class="btn btn-danger">Checkout</a>
            <a href="#" id="geser" class="btn btn-danger">Pembayaran</a>
            <a href="#" id="geser" class="btn btn-danger">Notifikasi</a>
            <a href="<?= site_url().'user/logout'?>" id="geser" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <div class="gambar">
        <img src="<?= base_url().'/assets/gambar/nibba.png'?>" alt="Foto">
    </div>

</body>

</html>