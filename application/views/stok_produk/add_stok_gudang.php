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
                    <a href="<?= base_url("Stok_Gudang") ?>">Stok Gudang</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Tambah Stok Gudang</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Stok Gudang</div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="produk">Produk</label>
                            <div class="col-sm-10">
                                <select name="produk" class="form-select" data-control="select2" data-placeholder="Pilih Produk . . .">
                                    <option value="">Pilih Produk</option>
                                    <?php foreach ($listProduk as $produk): ?>
                                        <option value="<?= encrypt_url($produk->id_produk); ?>" <?= ($produk->id_produk == $selected_produk) ? 'selected' : ''; ?>>
                                            <?= $produk->produk; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <span style="color: red;"><?= form_error('produk'); ?></span>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="stok">Stok</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="stok" placeholder="Masukkan Stok . . ." autocomplete="off" value="<?= set_value('stok'); ?>">
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