<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url().'assets/gambar/telkom.png'?>">
    <title>Garox FARMA</title>
    <link rel="stylesheet" href="<?= base_url().'/assets/css/index.css'?>">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
</head>

<body>
    <div class="gambar">
        <img src="<?= base_url().'/assets/gambar/mantapjiwa.png'?>" alt="Foto" width="500px" height="500px">
    </div>
    <div class="judul">
        <h1>GAROX</h1>
        <h1 id="teks">FARMA</h1>
    </div>
    <div class="info">
        <p>Farmasi terbaik dengan pengiriman</p>
        <p id="tes">yang cepat dan tepat</p>
    </div>
    <div class="atas">
        <p>Cari Obatmu!</p>

    </div>
    <div class="kanan">
        <p>Belum punya Akun?</p>
    </div>
    <div class="kotak">
        <a href="<?= site_url().'user/login'?>"><button class="login">Login</button></a>
        <a href="<?= site_url().'user/register'?>"><button class="register">Register</button></a>
    </div>

    <footer>
        <p>GaroxFarma® adalah sebuah farmasi pertama yang didirikan oleh Mamang Garox bersama kedua sahabatnya Atma dan
            Riski.
            Dibangun atas dasar cinta terhadap kesehatan masyarakat, keinginan untuk sukses dan sebagai media
            untuk lebih zeeb dan dekat terhadap masyarakat Indonesia. GaroxFarma® siap melayani segala pemesanan obat
            selama 24 jam.
        </p>
    </footer>
</body>

</html>