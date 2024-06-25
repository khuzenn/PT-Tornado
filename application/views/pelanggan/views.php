<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Pelanggan</h3>
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
            <a href="#">Pelanggan</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Pelanggan</div>
            <div class="d-flex flex-column flex-sm-row align-items-center gap-2">
              <div>
                <a href="#" onclick="exportToExcel('pelanggan', 'Daftar Pelanggan')">
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
              <table id="pelanggan" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($listPelanggan->result() as $pelanggan) {
                  ?>
                  <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td class="text-center"><?= $pelanggan->name; ?></td>
                    <td class="text-center"><?= $pelanggan->address; ?></td>
                    <td class="text-center"><?= $pelanggan->phone; ?></td>
                    <td class="text-center">
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= site_url('Pelanggan/getDetailPelanggan/' . $pelanggan->id_pelanggan); ?>"
                                ><i class="bx bxs-user-detail me-1"></i> Detail</a
                            >
                            <a class="dropdown-item" href="<?= site_url('Pelanggan/update/' . $pelanggan->id_pelanggan); ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <a class="dropdown-item" href="<?= site_url('Pelanggan/delete/' . $pelanggan->id_pelanggan); ?>"
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
              <a href="<?= site_url('Pelanggan/add'); ?>">
                  <button class="btn btn-outline-primary btn-round" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                      <i class="fas fa-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Pelanggan</span>
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
        $('#pelanggan').DataTable();
    });
</script>