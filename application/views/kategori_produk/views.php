<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Kategori Produk</h3>
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
            <a href="#">Kategori Produk</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Kategori Produk</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="kategori_produk" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kategori Produk</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($listKategori->result() as $kategori) {
                      ?>
                  <tr>
                      <td class="text-center"><?= $no; ?></td>
                      <td class="text-center"><?= $kategori->kategori_produk; ?></td>
                      <td class="text-center">
                      <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="<?= site_url('Kategori_Produk/update/' . $kategori->id_kategori_produk); ?>"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="<?= site_url('Kategori_Produk/delete/' . $kategori->id_kategori_produk); ?>" onclick="return confirm('Are You Sure Want to Delete This Data?')"
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
              <a href="<?= site_url('Kategori_Produk/add'); ?>">
                  <button class="btn btn-outline-primary btn-round" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                      <i class="fas fa-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Kategori Produk</span>
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
<script>
    $(document).ready(function() {
        $('#kategori_produk').DataTable();
    });
</script>