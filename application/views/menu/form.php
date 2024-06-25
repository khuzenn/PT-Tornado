<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Menu</h3>
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
                    <a href="<?= base_url("Menu") ?>">Menu</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Tambah Menu</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Menu</div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label" for="nama_menu">Nama Menu</label>
							<div class="col-sm-10">
							<input 
							type="text" 
							class="form-control" 
							name="nama_menu" 
							placeholder="Masukkan Nama Menu . . ." 
							autocomplete="off" 
							value="<?php if (isset($nama_menu)) {
								echo $nama_menu;
									} ?>">
							</div>
							</div>
							<div class="row mb-3">
							<label class="col-sm-2 col-form-label" for="icon">Icon</label>
							<div class="col-sm-10">
							<input 
							type="text" 
							class="form-control" 
							name="icon" 
							placeholder="Masukkan Icon . . ." 
							autocomplete="off" 
							value="<?php if (isset($icon)) {
								echo $icon;
									} ?>">
							</div>
							</div>
							<div class="row mb-3">
							<label class="col-sm-2 col-form-label" for="basic-default-email">Parent Menu</label>
							<div class="col-sm-10">
							<select class="form-select" data-control="select2" data-placeholder="Pilih Parent Menu..." name="id_menu_parent">
								<option value="">Pilih Parent Menu</option>
								<?php
								foreach ($listMenu->result() as $menu) {
									if ($menu->id_menu == $id_menu_parent) {
										echo '<option value="' . $menu->id_menu . '" selected >' . $menu->nama_menu . '</option>';
									} else {
										echo '<option value="' . $menu->id_menu . '">' . $menu->nama_menu . '</option>';
									}
								}
								?>
								</select>
							</div>
							</div>
							<div class="row mb-3">
							<label class="col-sm-2 col-form-label" for="basic-default-phone">Kategori</label>
							<div class="col-sm-10">
							<?php
								if (isset($kategori) && $kategori == "Link") {
								?>
									<label class="radio-inline radio-primary">
										<input type="radio" name="kategori" value="Controller" class="form-check-input">
										Controllers
									</label>
									&nbsp
									<label class="radio-inline radio-primary">
										<input type="radio" name="kategori" value="Link" class="form-check-input" checked="checked">
										Link
									</label>
								<?php
								} else {
								?>
									<label class="radio-inline radio-primary">
										<input type="radio" name="kategori" value="Controller" class="form-check-input" checked="checked">
										Controllers
									</label>
									&nbsp
									<label class="radio-inline radio-primary">
										<input type="radio" name="kategori" value="Link" class="form-check-input">
										Link
									</label>
								<?php
								}
								?>
							</div>
							</div>
							<div class="row mb-3">
							<label class="col-sm-2 col-form-label" for="basic-default-message">Link</label>
							<div class="col-sm-10">
							<input 
							type="text" 
							class="form-control" 
							name="href" 
							placeholder="Masukkan Link . . ." 
							autocomplete="off" 
							value="<?php if (isset($href)) {
								echo $href;
									} ?>">
							</div>
							</div>
							<div class="row mb-3">
							<label class="col-sm-2 col-form-label" for="basic-default-message">Urutan Menu</label>
							<div class="col-sm-10">
							<input 
							type="text" 
							class="form-control" 
							name="sort" 
							placeholder="Masukkan Urutan Menu . . ." 
							autocomplete="off" 
							value="<?php if (isset($sort)) {
								echo $sort;
									} ?>">
							</div>
							</div>
							<div class="row mb-3">
							<label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
							<div class="col-sm-10">
							<?php
								if (isset($status) && $status == "N") {
								?>
									<label class="radio-inline radio-success">
										<input type="radio" name="status" value="Y" class="form-check-input">
										Aktif
									</label>
									<label class="radio-inline radio-danger">
										<input type="radio" name="status" value="N" class="form-check-input" checked="checked">
										Non Aktif
									</label>
								<?php
								} else {
								?>
									<label class="radio-inline radio-success">
										<input type="radio" name="status" value="Y" class="form-check-input" checked="checked">
										Aktif
									</label>
									&nbsp
									<label class="radio-inline radio-danger">
										<input type="radio" name="status" value="N" class="form-check-input">
										Non Aktif
									</label>
								<?php
								}
								?>
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