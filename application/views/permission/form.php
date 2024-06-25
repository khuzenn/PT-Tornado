<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Model</h3>
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
                    <a href="<?= base_url("Permission") ?>">Model</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Tambah Model</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Model</div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
						  <div class="row mb-3">
							<label class="col-sm-2 col-form-label" for="description">Permission</label>
							<div class="col-sm-10">
							<input 
							type="text" 
							class="form-control" 
							name="description" 
							placeholder="Masukkan Nama Model . . ." 
							autocomplete="off" 
							value="<?php if (isset($description)) {
								echo $description;
									} ?>">
							</div>
						  </div>
						  <div class="row mb-3">
							<label class="col-sm-2 col-form-label" for="permission">Controller</label>
							<div class="col-sm-10">
							<input 
							type="text" 
							class="form-control" 
							name="permission" 
							placeholder="Masukkan Controller . . ." 
							autocomplete="off" 
							value="<?php if (isset($permission)) {
								echo $permission;
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