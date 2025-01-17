<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Pembelian</h3>
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
            <a href="<?= base_url("Pembelian") ?>">Pembelian</a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            <a>Detail Pembelian</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Pembelian</div>
            <a href="<?= base_url("Pembelian") ?>"><i class="icon-close" style="font-size: 2rem; color: red; padding-top: 2px;"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-row-bordered table-rounded table-striped table-hover border gy-5 gs-7">
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Nama Barang :</td>
                    <td ><?php echo $nama_barang; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Tanggal Pembelian :</td>
                    <td><?php echo $tanggal_pembelian; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Status :</td>
                    <td><?php echo $status; ?></td>
                </tr>
                <tr>
                    <td class="fw-bold text-end" style="width: 600px; height: 55px !important;">Harga :</td>
                    <td><?php echo rupiah($harga_barang); ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>