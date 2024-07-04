<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Riwayat Produk</h3>
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
            <a href="#">Riwayat Produk</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Riwayat Produk</div>
            <div class="d-flex flex-column flex-sm-row align-items-center gap-2">
              <div class="col-12 col-sm-auto">
                <input type="date" id="min" class="form-control">
              </div>
              <div class="col-12 col-sm-auto">
                <p class="text-center mb-0">To :</p>
              </div>
              <div class="col-12 col-sm-auto">
                <input type="date" id="max" class="form-control">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="produk-history" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Stok Sebelum</th>
                    <th class="text-center">Stok Saat Ini</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($historyProduk->result() as $history) {
                  ?>
                  <tr>
                    <td class="text-center"><?= date('Y-m-d', strtotime($history->change_timestamp)) ?></td>
                      <td class="text-center"><?= $history->nama_produk ?></td>
                      <td class="text-center"><?= $history->change_type ?></td>
                      <td class="text-center"><?= $history->previous_stock ?></td>
                      <td class="text-center"><?= $history->new_stock ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<!-- Download Table -->
<script src="<?= base_url("assets") ?>/custom/js/pelanggan/export.js"></script>
<!-- <script>
    $(document).ready(function() {
        $('#produk-history').DataTable();
    });
</script> -->

<script>
  $(document).ready(function () {
      let table = $('#produk-history').DataTable();

      let minDate = null;
      let maxDate = null;

      $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
          let min = minDate ? new Date(minDate).getTime() : null;
          let max = maxDate ? new Date(maxDate).getTime() : null;
          let date = new Date(data[0]).getTime();

          if (
              (min === null && max === null) ||
              (min === null && date <= max) ||
              (min <= date && max === null) ||
              (min <= date && date <= max)
          ) {
              return true;
          }
          return false;
      });

      $('#min, #max').on('change', function () {
          minDate = $('#min').val();
          maxDate = $('#max').val();
          table.draw();
      });
  });
</script>