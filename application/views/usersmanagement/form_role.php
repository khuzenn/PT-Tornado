<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Pengguna</h3>
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
                    <a href="<?= base_url("Usersmanagement") ?>">Pengguna</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Hak Akses Pengguna</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Hak Akses Pengguna</div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
                            <div class="mb-3 row">
                              <label for="inputPassword" class="col-sm-2 col-form-label text-end">Hak Akses<span style="color:red;">*</span></label>
                              <div class="col-sm-10">
                                <select class="form-control role" name="role_id" tabindex="2">
                                  <?php foreach ($listRoles->result() as $role) { ?>
                                    <option value="<?php echo $role->role_id ?>" <?php if ($role->role_id == $role_id_change) echo 'selected="selected"'; ?>>
                                      <?php echo $role->full; ?>
                                    </option>
                                  <?php } ?>
                                </select>
                                <span style="color: red;"><?php echo form_error('role_id'); ?></span>
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