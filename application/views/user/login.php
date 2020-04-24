<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url().'/assets/gambar/telkom.png'?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url().'/assets/css/login.css'?>">
    <title>Login</title>
</head>

<body>
    <div class="atas">
        <a href="<?= site_url().'user/index'?>"><button class="btn btn-danger">Kembali</button></a>
    </div>
    <div class="judul">
        <p>LOGIN</p>
    </div>
    <div class="gambar">
        <img src="<?= base_url().'/assets/gambar/login.png'?>" alt="foto" width="300px" height="300px">
    </div>
    <hr>
    <div class="teks">
        <p id="tengah">Selamat Datang!</p>
        <p>Silahkan masukkan Username dan Password anda.</p>
    </div>

    <div class="container-fluid">
        <form action="<?= base_url().'user/prosesLogin'?>" class="form-horizontal" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nama" id="email">Email</label>
                <input type="text" name="email" required>
                <small class="form-text text-danger"><?= form_error('email') ?>.</small>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password" id ="password">Password</label>
                <input type="password" name="password" required>
                <small class="form-text text-danger"><?= form_error('password') ?>.</small>
            </div>

            <div class="form-group">
                <button class="btn btn-success" id="login" name = "login">Login</button>
            </div>
        </form>
    </div>

</body>

</html>