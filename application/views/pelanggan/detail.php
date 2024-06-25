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
            <a href="<?= base_url("Pelanggan") ?>">Pelanggan</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a>Detail Pelanggan</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Pelanggan</div>
            <a href="<?= base_url("Pelanggan") ?>"><i class="icon-close" style="font-size: 2rem; color: red; padding-top: 2px;"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-row-bordered table-rounded table-striped table-hover border gy-5 gs-7">
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Nama Pelanggan :</td>
                    <td ><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Alamat :</td>
                    <td><?php echo $address; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">No HP :</td>
                    <td><?php echo $phone; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Tanggal Terakhir Pemesanan :</td>
                    <td><?php echo $order_date; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Status :</td>
                    <td><?php echo $status; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Total Pesanan :</td>
                    <td><?php echo $quantity; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>