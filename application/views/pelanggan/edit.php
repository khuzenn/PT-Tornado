<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Pelanggan</h3>
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
                    <a href="<?= base_url("Pelanggan") ?>">Pelanggan</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Edit Pelanggan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Pelanggan</div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
							<div class="row mb-3">
								<label class="col-sm-2 col-form-label" for="name">Nama Pelanggan</label>
								<div class="col-sm-10">
								<input 
								type="text" 
								class="form-control" 
								name="name" 
								placeholder="Masukkan Nama Pelanggan . . ." 
								autocomplete="off" 
								value="<?php if (isset($name)) {
									echo $name;
										} ?>">
								</div>
							</div>
							<div class="row mb-3">
								<label class="col-sm-2 col-form-label" for="address">Alamat</label>
								<div class="col-sm-10">
								<input 
								type="text" 
								class="form-control" 
								name="address" 
								placeholder="Masukkan Alamat . . ." 
								autocomplete="off" 
								value="<?php if (isset($address)) {
									echo $address;
										} ?>">
								</div>
							</div>
							<div class="row mb-3">
								<label class="col-sm-2 col-form-label" for="phone">No HP</label>
								<div class="col-sm-10">
								<input 
								type="text" 
								class="form-control" 
								name="phone" 
								placeholder="Masukkan No HP . . ." 
								autocomplete="off" 
								value="<?php if (isset($phone)) {
									echo $phone;
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