<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url().'assets/gambar/telkom.png'?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url().'assets/css/checkout.css'?>">
    <link rel="stylesheet" href="<?= base_url().'assets/font/css/all.css'?>">
    <title>Garox Farma | <?= $title?> </title>
</head>

<body>
    <div class="tombol">
        <a href="<?= site_url().'user/route'?>" class="btn btn-danger" id="tombol">Kembali</a>
    </div>
    <div class="gambar">
        <img src="<?= base_url().'assets/gambar/cash.png'?>" alt="foto" width="250px" height="200px">
    </div>
    <div class="judul">
        <p>Checkout pesanan anda</p>
    </div>
    <div class="container-fluid">
        <div class="tulisan">
            <p>list pesanan</p>
        </div>

        <div class="kosong">
            <?php
                if(empty($item)){
            ?>
            <h2>Barang belian kosong silahkan berbelanja dahulu</h2>
            <?php }else { ?>
                <?php
                    echo form_open('user/updateCart');   
                ?>
                <table>
                    <thead>
                    <tr>
                        <th scope = "col"><h2>Nama Obat</h2></th>
                        <th scope = "col"><h2>Jumlah</h2></th>
                        <th scope = "col"><h2>Harga</h2></th>
                    </tr>
                    </thead>
                    <?php
                        foreach($item as $row):
                            echo form_hidden('cart[' . $row['id'] . '][id]', $row['id']);
                            echo form_hidden('cart[' . $row['id'] . '][rowid]', $row['rowid']);
                            echo form_hidden('cart[' . $row['id'] . '][name]', $row['name']);
                            echo form_hidden('cart[' . $row['id'] . '][price]', $row['price']);
                            echo form_hidden('cart[' . $row['id'] . '][qty]', $row['qty']);
                    ?>
                <tbody>
                <tr>
                   <td> 
                    <h2><?= $row['name'] ?> </h2>
                    <td><h2><?php echo form_input('cart[' . $row['id'] . '][qty]', $row['qty'], 'maxlength="3" size="1" style="text-align: right;"'); ?> </h2></td>
                    <td><h2><?= $row['subtotal'] ?></h2></td>
                    
                   <td><a href="<?= site_url().'user/deleteCart/'.$row['rowid']?>" class="btn btn-danger" style="margin-left: 40px;">Delete Item</a></td>
                </tr>
                </tbody>
                    <?php endforeach; ?>
                </table>
                <br>
                <br>
                    <button class = "btn btn-primary">Update Cart</button>
                    <a href="<?= site_url().'user/deleteCart/all'?>" class="btn btn-danger" name="hapus" style="margin-left: 40px;">Clear Cart</a>
                    
                <?php echo form_close(); ?>
                <br>
                <br>

            <h2><strong> Total Harga : <?= $this->cart->format_number($this->cart->total())  ?> </strong></h2>
            
        </div>
        <br>
        <a href="<?= site_url().'user/prosesPesanan'?>" class="btn btn-success" id="bayar">Pembayaran</a>
        <?php } ?>                  
    </div>

</body>

</html>