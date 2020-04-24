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
        <?php endif;?>
        <div class="row mt-3">
            <div class="col md-6 text-center mt-5">
                <a href="<?= site_url().'admin/addItem' ?>" class="btn btn-primary">Tambah Data Barang</a>
            </div>
        </div>

            <table class="table table-bordered table-hover table-danger" id ="table">
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
              </tbody>
            </table>
            

          </div>
        </div>
      </section>
    </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {
      let table = $('#table').DataTable({

          'ajax': {
              'url' : '<?= base_url().'admin/data'?>',
              'type' : 'POST',
              'dataSrc' : 'item'
          },

          'columns': [
            {'data':  'nama_barang'},
            {'data':  'harga'},
            {'data':  'stock'},
            {'data':  'spesifikasi'},
            {'data':  'gambar'}
           
          ],
          'columnDefs': [
            {
              'data': 'img',
              'targets': 4,
              'render': function(item,type,row){
                let gambar = '<img src = "<?= base_url().'assets/upload/'?>'+row.gambar+'" alt = "gambar" width ="100px">';
                return gambar;
              }
            },
            {
              'targets': 5,
              'render': function (item,type,row){
                let btn = '<a class = "btn btn-success" href = "<?= site_url().'admin/editItem/'?>'+row.item_id+'" style = "margin-left:50px">Edit</a>'+'<a class = "btn btn-danger" href = "<?= site_url().'admin/deleteItem/'?>'+row.item_id+'" onClick="return confirm("AndaYakin?")" style = "margin-left: 10px">Delete</a>';
                return btn;
              
              }
            },
            { 
              'className': 'dt-center',
              'targets'  : '_all' 
            }
            
          ]
      });
   });
  </script>

