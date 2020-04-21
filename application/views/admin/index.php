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
        <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
          <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Barang <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="row mt-5">
          <div class="col">
            <h3 class="text-center">Daftar Barang</h3>
            <?php if (empty($item)) : ?>
            <div class="alert alert-danger" role="alert">
              Data tidak ditemukan
            </div>
            <?php endif; ?>

        <div class="row mt-3">
          <div class="col md-6">
            <form action="" method="post">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari data barang ... " name="keyword">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit">Cari</button>
                </div>
              </div>
            </form>
          </div>
        </div>

            <table class="table mt-5" id ="table">
              <thead>
                <tr>
                  <th class="text-center" scope="col">Nama Barang</th>
                  <th class="text-center" scope="col">Harga</th>
                  <th class="text-center" scope="col">Stock</th>
                  <th class="text-center" scope="col">Spesifikasi</th>
                  <th class="text-center" scope="col">Gambar</th>
                  <th class="text-center" scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    foreach($item as $row):
                ?>
                <tr>
                      <td><?= $row['nama_barang']; ?></td>
                      <td><?= $row['harga']; ?></td>
                      <td><?= $row['stock']; ?></td>
                      <td><?= $row['spesifikasi']; ?></td>
                      <td><img src="<?= base_url().'assets/upload/'.$row['gambar']?>" alt="gambar"></td>
                      <td>
                          <a href="<?= site_url().'admin/editItem/'.$row['item_id'] ?>" class = "btn btn-success">Edit</a>
                          <a href="<?= site_url().'admin/deleteItem/'.$row['item_id'] ?>" class = "btn btn-danger" onClick="return confirm('Apakah Anda Yakin?')">Delete</a>
                      </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            <div class="row mt-3">
              <div class="col md-6 text-center mt-5">
                <a href="<?= site_url().'admin/addItem' ?>" class="btn btn-primary">Tambah Data Barang</a>
              </div>
            </div>

          </div>
        </div>
      </section>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table').DataTable();
    } );
  </script>