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
            <a href="<?= base_url("Pesanan") ?>">Pesanan</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a>Detail Pesanan</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Pesanan</div>
            <a href="<?= base_url("Pesanan") ?>"><i class="icon-close" style="font-size: 2rem; color: red; padding-top: 2px;"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-row-bordered table-rounded table-striped table-hover border gy-5 gs-7">
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Nama Pelanggan :</td>
                    <td ><?php echo $nama_pelanggan; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Produk :</td>
                    <td><?php echo $produk; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Jumlah Pesanan :</td>
                    <td><?php echo $quantity; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Harga :</td>
                    <td><?php echo rupiah($sell_price); ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Total Harga :</td>
                    <td><?php echo rupiah($sell_price_total); ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Sudah Dibayar :</td>
                    <td><?php echo rupiah($paid); ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Belum Dibayar :</td>
                    <td><?php echo rupiah($unpaid); ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Status :</td>
                    <td><?php echo $status; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Catatan :</td>
                    <td><?php echo $note; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>