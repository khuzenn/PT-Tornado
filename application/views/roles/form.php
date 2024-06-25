<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Hak Akses</h3>
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
                    <a href="<?= base_url("Roles") ?>">Hak Akses</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Tambah Hak Akses</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Hak Akses</div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
						  <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="role">Nama Hak Akses</label>
							<div class="col-sm-10">
							<input 
							type="text" 
							class="form-control" 
							name="role" 
							placeholder="Masukkan Nama Model . . ." 
							autocomplete="off" 
							value="<?php if (isset($role)) {
							echo $role;
								} ?>">
							</div>
                          </div>
						  <div class="row mb-3">
							<label class="col-sm-2 col-form-label" for="full">Nama Lengkap Hak Akses</label>
							<div class="col-sm-10">
							<input 
							type="text" 
							class="form-control" 
							name="full" 
							placeholder="Masukkan Controller . . ." 
							autocomplete="off" 
							value="<?php if (isset($full)) {
								echo $full;
									} ?>">
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