<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Produk</h3>
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
                    <a href="<?= base_url("Produk") ?>">Produk</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Edit Produk</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Produk</div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="kategori_produk">Kategori Produk</label>
                              <div class="col-sm-10">
                                <select name="kategori_produk" class="form-select" data-control="select2" data-placeholder="Pilih Kategori Produk . . .">
                                  <option value="">Pilih Kategori Produk</option>
                                  <?php foreach ($list_kategori_produk as $kategori_produk) : ?>
                                    <option value="<?= encrypt_url($kategori_produk->id_kategori_produk); ?>" <?= ($kategori_produk->id_kategori_produk == $selected_kategori_produk) ? 'selected' : ''; ?>>
                                      <?= $kategori_produk->kategori_produk; ?>
                                    </option>
                                  <?php endforeach; ?>
                                </select>
                                <span style="color: red;"><?= form_error('kategori_produk'); ?></span>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="produk">Produk</label>
                              <div class="col-sm-10">
                                <input 
                                  type="text" 
                                  class="form-control" 
                                  name="produk" 
                                  placeholder="Produk . . ." 
                                  autocomplete="off" 
                                  value="<?php if (isset($produk)) echo $produk; ?>"
                                >
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="harga">Harga</label>
                              <div class="col-sm-10">
                                <input 
                                  type="text" 
                                  class="form-control" 
                                  name="harga" 
                                  placeholder="Masukkan Harga . . ." 
                                  autocomplete="off" 
                                  value="<?php if (isset($harga)) echo $harga; ?>"
                                >
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