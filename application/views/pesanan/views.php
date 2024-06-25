<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Pesanan</h3>
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
            <a href="#">Pesanan</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Pesanan</div>
            <div class="d-flex flex-column flex-sm-row align-items-center gap-2">
              <div>
                <a href="#" onclick="exportToExcel('kt-tabel', 'Daftar Pesanan')">
                    <button class="btn btn-outline-primary btn-round justify-content-center" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                        <i class="fas fa-file-export me-sm-1 pb-1"></i>
                        <span class="d-none d-sm-inline-block">Export</span>
                    </button>
                </a>
              </div>
              <div>
                <input type="date" id="min" class="form-control">
              </div>
              <div>
                <p class="pt-2">To :</p>
              </div>
              <div>
                <input type="date" id="max" class="form-control">
              </div>

            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="kt-tabel" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">ID Pesanan</th>
                    <th class="text-center">Tanggal Pesanan</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Sudah Dibayar</th>
                    <th class="text-center">Belum Dibayar</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($listPesanan->result() as $pesanan) {
                  ?>
                  <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td class="text-center"><?= $pesanan->order_date; ?></td>
                    <td class="text-center"><?= $pesanan->nama_pelanggan; ?></td>
                    <td class="text-center"><?= $pesanan->produk; ?></td>
                    <td class="text-center"><?= $pesanan->quantity; ?></td>
                    <td class="text-center"><?= rupiah($pesanan->paid); ?></td>
                    <td class="text-center"><?= rupiah($pesanan->unpaid); ?></td>
                    <td class="text-center">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="<?= site_url('Pesanan/getDetailPesanan/' . $pesanan->pesanan_id); ?>"
                              ><i class="bx bxs-user-detail me-1"></i> Detail</a
                          >
                          <a class="dropdown-item" href="<?= site_url('Pesanan/update/' . $pesanan->pesanan_id); ?>"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                          >
                          <a class="dropdown-item" href="<?= site_url('Pesanan/delete/' . $pesanan->pesanan_id); ?>"
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
                <tfoot>
                    <tr>
                      <th class="text-center" colspan="1"><b>Total</b></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center" id="formattedColumn4"></th>
                      <th class="text-center" id="total_pesanan"></th>
                      <th class="text-center" id="formattedColumn6"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                    </tr>
                  </tfoot>
              </table>
            </div>
            <center class="py-4">
              <a href="<?= site_url('Pesanan/add'); ?>">
                  <button class="btn btn-outline-primary btn-round" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                      <i class="fas fa-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Pesanan</span>
                  </button>
              </a>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url("assets/kaiadmin") ?>/assets/js/core/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<!-- Download Table -->
<script src="<?= base_url("assets") ?>/custom/js/pesanan/export.js"></script>
<!-- Hitung total pesanan -->
<script src="<?= base_url("assets") ?>/custom/js/pesanan/tabelPesanan.js"></script>
