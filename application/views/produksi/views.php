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
            <a href="#">Produksi</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Produksi</div>
            <div class="d-flex flex-column flex-sm-row align-items-center gap-2">
              <div>
                <a href="#" onclick="exportToExcel('kt-tabel', 'Daftar Produksi')">
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
                    <th class="text-center">No</th>
                    <th class="text-center">TGL Produksi</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Pegawai</th>
                    <th class="text-center">Status Pengiriman</th>
                    <th class="text-center">Target Produksi</th>
                    <th class="text-center">Hasil Produksi</th>
                    <th class="text-center">Reject</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($listProduksi->result() as $produksi) {
                    ?>
                    <tr>
                        <td class="text-center"><?= $no; ?></td>
                        <td class="text-center"><?= $produksi->production_at; ?></td>
                        <td class="text-center"><?= $produksi->produk; ?></td>
                        <td class="text-center"><?= $produksi->nama_pegawai; ?></td>
                        <td class="text-center"><?= $produksi->status_pengiriman; ?></td>
                        <td class="text-center"><?= $produksi->target_produksi; ?></td>
                        <td class="text-center"><?= $produksi->barang_ditaro; ?></td>
                        <td class="text-center"><?= $produksi->reject; ?></td>
                        <td class="text-center">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= site_url('Produksi/update/' . $produksi->id_produksi); ?>"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="<?= site_url('Produksi/delete/' . $produksi->id_produksi); ?>"
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
                        <th class="text-center" colspan="2"><b>Total</b></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center" id="target_produksi"></th>
                        <th class="text-center" id="formattedColumn6"></th>
                        <th class="text-center" id="formattedColumn7"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                      </tr>
                  </tfoot>
              </table>
            </div>
            <center class="py-4">
              <a href="<?= site_url('Produksi/add'); ?>">
                  <button class="btn btn-outline-primary btn-round" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                      <i class="fas fa-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Produksi</span>
                  </button>
              </a>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Download Table -->
<script>
function exportToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    filename = filename?filename+'.xls':'excel_data.xls';
    downloadLink = document.createElement("a");
    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        downloadLink.download = filename;
        downloadLink.click();
    }
}
</script>

<!-- Hitung total pesanan -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
  $(document).ready(function () {
    let table = $('#kt-tabel').DataTable({
        drawCallback: function () {
            var api = this.api();
        
            var totalColumn5 = 0;
            var totalColumn6 = 0;
            var totalColumn7 = 0;
            
            api.column(5, { page: 'current' }).data().each(function (value) {
                var numericValue = removeRupiahFormat(value);
                totalColumn5 += numericValue;
            });
            api.column(6, { page: 'current' }).data().each(function (value) {
                var numericValue = removeRupiahFormat(value);
                totalColumn6 += numericValue;
            });

            api.column(7, { page: 'current' }).data().each(function (value) {
                var numericValue = removeRupiahFormat(value);
                totalColumn7 += numericValue;
            });
        
            var formattedColumn5 = totalColumn5.toLocaleString();
            var formattedColumn6 = totalColumn6.toLocaleString();
            var formattedColumn7 = totalColumn7.toLocaleString();
        
            $(api.column(5).footer()).html(formattedColumn5);
            $(api.column(6).footer()).html(formattedColumn6);
            $(api.column(7).footer()).html(formattedColumn7);
        }
    });

    let minDate = null;
    let maxDate = null;

    DataTable.ext.search.push(function (settings, data, dataIndex) {
        if (
            (minDate === null && maxDate === null) ||
            (minDate === null && Date.parse(data[1]) <= maxDate) ||
            (minDate <= Date.parse(data[1]) && maxDate === null) ||
            (minDate <= Date.parse(data[1]) && Date.parse(data[1]) <= maxDate)
        ) {
            return true;
        }
        return false;
    });

    let minDateInput = document.getElementById('min');
    let maxDateInput = document.getElementById('max');

    function filterTable() {
        minDate = minDateInput.value ? Date.parse(minDateInput.value) : null;
        maxDate = maxDateInput.value ? Date.parse(maxDateInput.value) : null;
        table.draw();
    }

    minDateInput.addEventListener('change', filterTable);
    maxDateInput.addEventListener('change', filterTable);

    minDateInput.addEventListener('input', function () {
        if (!this.value) {
            minDate = null;
            filterTable();
        }
    });

    maxDateInput.addEventListener('input', function () {
        if (!this.value) {
            maxDate = null;
            filterTable();
        }
    });

    function updateTotal() {
        let total = table.column(5).data().sum();
        $('#target_produksi').text(formatRupiah(total));
    }

    table.on('draw', function () {
        updateTotal();
    });

    function removeRupiahFormat(value) {
        if (value.startsWith("Rp")) {
            value = value.replace(/[^\d,-]/g, '');
        }
        return parseFloat(value);
    }
});
</script>