<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Produk</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home">
            <a href="<?= base_url("Dashboard") ?>">
              <i class="icon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a href="#">Produk</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Produk</div>
            <div class="d-flex flex-column flex-sm-row align-items-center gap-2">
              <div>
                <a href="#" onclick="exportToExcel('produk', 'Daftar Produk')">
                    <button class="btn btn-outline-primary btn-round justify-content-center" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                        <i class="fas fa-file-export me-sm-1 pb-1"></i>
                        <span class="d-none d-sm-inline-block">Export</span>
                    </button>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="produk" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($listProduk->result() as $produk) {
                      ?>
                  <tr>
                      <td class="text-center"><?= $no; ?></td>
                      <td class="text-center"><?= $produk->produk; ?></td>
                      <td class="text-center"><?= rupiah($produk->harga); ?></td>
                      <td class="text-center">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= site_url('Produk/update/' . $produk->id_produk); ?>"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="<?= site_url('Produk/delete/' . $produk->id_produk); ?>"
                                    ><i class="bx bx-trash-alt me-1"></i> Hapus</a
                                >
                            </div>
                        </div>
                      </td>
                  </tr>
                  <?php
                      $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <center class="py-4">
              <a href="<?= site_url('Produk/add'); ?>">
                  <button class="btn btn-outline-primary btn-round" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                      <i class="fas fa-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Produk</span>
                  </button>
              </a>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<!-- Download Table -->
<script src="<?= base_url("assets") ?>/custom/js/pelanggan/export.js"></script>
<script>
    $(document).ready(function() {
        $('#produk').DataTable();
    });
</script>