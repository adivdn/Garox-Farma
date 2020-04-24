<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url().'assets/gambar/telkom.png'?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url().'assets/css/proses.css'?>">
    <title>Garox FARMA | <?= $title; ?> </title>
</head>

<body>
    <div class="judul">
        <p>KODE PEMBAYARAN :</p>
    </div>
    <div class="kode">
        <p>UT3KE-<?= rand()?></p>
    </div>
    <div class="kalimat">
        <p>Mohon perhatikan langkah berikut</p>
        
    </div>
    <div class="container">
        <div class="isi">
            <ol>
                <li>Perhatikan total harga belanjaan anda. Diharapkan untuk tidak men-transfer uang pembayaran yang
                    lebih ataupun kurang. </li>
                <li>Pesanan anda akan terverifikasi secara automatis.</li>
                <li>Mohon menunggu kurir kami mengirimkan obat anda.</li>
            </ol>
        </div>
        <div class="tombol">
            <a href="<?= site_url().'user/notifikasi'?>" class="btn btn-primary">Ok!</a>
        </div>
    </div>
</body>

</html>