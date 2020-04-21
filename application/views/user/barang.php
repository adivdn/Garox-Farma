<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url().'assets/css/barang.css'?>">
    <link rel="stylesheet" href="<?= base_url().'/assets/font/css/all.css'?>">
    <title>Garox Farma | <?= $title; ?></title>
</head>

<body>

    <div class="tombol">
        <a href="<?= site_url().'user/route'?>" class="btn btn-danger" id="tombol">Kembali</a>
    </div>
    <div class="judul">
        <p>MARI CARI OBATMU</p>
    </div>
    <div class="pojok">
        <form action="" method= "POST">
            <input type="text" placeholder="Search" id="input" name = "input" class="fas fa-search"><span class="fas fa-search"></span>
        </form>
    </div>

    <div class="row row-cols-1 row-cols-md-3" id="card-deck">
        <?php
                foreach($item as $row):
        ?>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="<?= base_url().'/assets/upload/'.$row['gambar']?>" class="card-img-top" alt="gambar" width = "50px" height = "100px">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['nama_barang'];?></h5>
                    <p class="card-text"><?= $row['spesifikasi']; ?></p>
                </div>
                <div class="card-footer">
                    <div class="harga">
                        <p>Rp. <?= number_format($row['harga']); ?></p>
                    </div>
                    <a href="#" class="btn btn-primary">beli</a>
                </div>
            </div>
            
        </div>
        <?php endforeach; ?>
    </div>

</body>

</html>