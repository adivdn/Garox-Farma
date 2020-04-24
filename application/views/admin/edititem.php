<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="<?= site_url().'admin'?>" class="logo">
        <span class="logo-lg"><b>Garox </b>FARMA</span>
      </a>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu">
          <li class="active">
            <a href="<?= site_url().'admin'?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url().'user/logout'?>">
              <i class="fa fa-power-off"></i> <span>Logout</span>
            </a>
          </li>
      </section>
    </aside>

    <div class="content-wrapper">
      <section class="content-header">
        <h1 class = "text-center">Form Edit Barang</h1>
        <div class = "container">
            <form action="<?= site_url().'admin/processEdit'?>" method="post" enctype="multipart/form-data">
              <?php
                foreach($item as $row):
              ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="item_id" name="item_id" value = "<?= $row['item_id']; ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value = "<?= $row['nama_barang']; ?>">
                    <small class="form-text text-danger"><?= form_error('nama_barang') ?></small>
                </div>
                <div class="form-group">
                    <label for="nim">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value = "<?= $row['harga']; ?>">
                    <small class="form-text text-danger"><?= form_error('harga') ?></small>
                </div>
                <div class="form-group">
                    <label for="text">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value = "<?= $row['stock']; ?>">
                    <small class="form-text text-danger"><?= form_error('stock') ?></small>
                </div>
                <div class="form-group">
                    <label for="text">Spesifkasi</label>
                    <textarea name= "spesifikasi" cols="60" rows="3"><?= $row['spesifikasi']; ?></textarea>
                    <small class="form-text text-danger"><?= form_error('spesifikasi') ?></small>
                </div>
                <div class="form-group">
                    <label for="text">Gambar</label>
                    <input type="file" id="gambar" name="gambar" value = "<?= base_url().'assets/upload/'.$row['gambar']; ?>">
                    <?php if (isset($error)) :?>
                    <small class="form-text text-danger"><?= $error; ?></small>
                    <?php endif;?>
                </div>
                <div class="form-group">
                    <button class = "btn btn-success" name = "edit">Edit</button>
                </div>
                <?php endforeach; ?>
            </form>
        </div>   
      </section>
    </div>
</div>