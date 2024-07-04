<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Stok Gudang</h3>
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
            <a href="#">Stok Gudang</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Stok Gudang</div>
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
              <table id="stok-gudang" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Stok</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($list_produk->result() as $produk) {
                    ?>
                        <tr>
                        <td class="text-center"><?= $no; ?></td>
                        <td class="text-center"><?= $produk->produk; ?></td>
                        <td class="text-center"><?= $produk->stok; ?></td>
                        </tr>
                    <?php
                    $no++;
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
      let table = $('#stok-gudang').DataTable();

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