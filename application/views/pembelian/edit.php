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
                    <a>Edit Pembelian</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Pembelian</div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Nama Barang</label>
                            <div class="col-sm-10">
                              <input type="text" 
                              class="form-control" 
                              name="nama_barang" 
                              placeholder="Masukkan Nama Barang . . ." 
                              autocomplete="off" 
                              value="<?php 
                                  if (isset($nama_barang)) {
                                  echo $nama_barang;
                              } ?>">
                              <?= form_error('nama_barang', '<small class="text-danger">', '</small>') ?>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="status">Tanggal Pembelian</label>
                            <div class="col-sm-10">
                            <input
                                type="date"
                                class="form-control"
                                id="tanggal_pembelian"
                                name="tanggal_pembelian"
                                value="
                                <?php 
                                    if (isset($tanggal_pembelian)) {
                                    echo $tanggal_pembelian;
                                } ?>"
                                autofocus />
                                <?= form_error('tanggal_pembelian', '<small class="text-danger">', '</small>') ?>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="status">Status</label>
                            <div class="col-sm-10">
                            <select name="status" id="status" class="form-select" data-placeholder="Pilih Status . . .">
                                <option value="<?php 
                                    if (isset($status)) {
                                    echo $status;
                                } ?>"><?php 
                                    if (isset($status)) {
                                    echo $status;
                                } ?></option>
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>
                                <option value="Term">Term</option>
                            </select>
                            <?= form_error('status', '<small class="text-danger">', '</small>') ?>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="harga_barang">Harga Barang</label>
                            <div class="col-sm-10">
                            <input 
                            type="text" 
                            class="form-control" 
                            id="rupiah" 
                            name="harga_barang" 
                            placeholder="Masukkan Harga . . ." 
                            autocomplete="off" 
                            value="<?php 
                                if (isset($harga_barang)) {
                                echo $harga_barang;
                            } ?>">
                              <?= form_error('harga_barang', '<small class="text-danger">', '</small>') ?>
                            </div>
                          </div>
                          <div class="row justify-content-end">
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary btn-round">
                                      <i class='far fa-save'></i>&nbsp Simpan
                                  </button>
                              </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function formatRupiah(angka) {
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah;
    }

    document.getElementById('rupiah').addEventListener('input', function (e) {
        var harga = e.target.value;
        e.target.value = formatRupiah(harga);
    });
</script>
