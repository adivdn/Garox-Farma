<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url().'assets/gambar/telkom.png'?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url().'/assets/css/registrasi.css'?>">
    <title>Registrasi</title>
</head>

<body>
    <div class="atas">
        <a href="<?= site_url().'user/index'?>"><button class="btn btn-danger">Kembali</button></a>
    </div>
    <div class="judul">
        <p>Hidupkan</p>
        <p id="info">Keceriaan</p>

    </div>
    <hr>
    <div class="bawah">
        <p>Bergabunglah sekarang! Dapatkan kenyamanan dalam
            membeli obat menuju kesehatan anda!</p>
    </div>
    <div class="gambar">
        <img src="<?= base_url().'/assets/gambar/registrasi.png'?>" alt="foto" height="300px" width="289px">
    </div>
    <div class="container-fluid">
        <form action="<?= site_url().'user/prosesRegister'?>" class="form-horizontal" method = "POST">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nama" id="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
                <small class="form-text text-danger"><?= form_error('nama') ?>.</small>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Pass</label>
                <input type="password" name="password" id="password" required>
                <small class="form-text text-danger"><?= form_error('password') ?>.</small>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email</label>
                <input type="email" name="email" id="email" required>
                <small class="form-text text-danger"><?= form_error('email') ?>.</small>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="alamat">Alamat</label>
                <textarea name="alamat" required></textarea>
                <small class="form-text text-danger"><?= form_error('alamat') ?>.</small>
            </div>
            <div class="form-group">
                <button class="btn btn-success" id="proses" name = "proses">Proses!</button>
            </div>
        </form>
    </div>
</body>

</html>