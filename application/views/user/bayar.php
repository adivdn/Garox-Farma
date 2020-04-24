<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url().'assets/gambar/telkom.png'?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url().'assets/css/bayar.css'?>">
    <title>Garox FARMA | <?= $title ?></title>
</head>

<body>
    <div class="container">
        <form action="<?= site_url().'user/prosesBayar'?>" method="POST">
            <div class="jumlah">
                <p>Total yang harus dibayar: <b>Rp <?= $this->cart->format_number($this->cart->total())?></b></p>
                <input type="hidden" value = "<?= $item['id']?>" name = "pesanan_id">
            </div>
            <div class="bawah">
                <select class="custom-select" name="pilih" required>
                    <option selected>Pilih opsi Pembayaran</option>
                    <option value="bri">BRI</option>
                    <option value="mandiri">Mandiri</option>
                    <option value="indomaret">Indomaret</option>
                    <option value="alfamart">Alfamart</option>
                </select>
            </div>
            <div class="tombol">
                <button class="btn btn-primary" name="button">Proses</button>
            </div>
        </form>
    </div>
</body>

</html>