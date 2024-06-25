<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Kategori Produk</h3>
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
                    <a href="<?= base_url("Kategori_Produk") ?>">Kategori Produk</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Tambah Kategori Produk</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Kategori Produk</div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="kategori_produk">Kategori Produk</label>
                            <div class="col-sm-10">
                              <input 
                              type="text" 
                              class="form-control" 
                              name="kategori_produk" 
                              placeholder="Masukkan Kategori Produk . . ." 
                              autocomplete="off" 
                              value="">
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