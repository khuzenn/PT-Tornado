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
            <a href="#">Pengguna</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Pengguna</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="pengguna" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Banned</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($listuser->result() as $user) {
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $no; ?></td>
                      <td class="text-center"><?php echo $user->username; ?></td>
                      <td class="text-center"><?php echo $user->name; ?></td>
                      <td class="text-center"><?php echo ($user->activated == '1') ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>'; ?></td>
                      <td class="text-center"><?php echo ($user->banned == '1') ? '<span class="badge badge-danger">Banned</span>' : '<span class="badge badge-success">Unbanned</span>'; ?></td>
                      <td class="text-center">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <?php if ($user->activated != 0) { ?>
                              <a class="dropdown-item" href="<?php echo site_url('Usersmanagement/update/' . $user->id_user); ?>">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                              </a>
                            <?php } ?>
                            <?php
                            if ($user->banned == '1') {
                            ?>
                              <a class="dropdown-item" href="<?php echo site_url('Usersmanagement/unbanned/' . $user->id_user); ?>">
                                <i class="bx bx-recycle me-1"></i> Unbanned
                              </a>
                            <?php
                            } else {
                              if ($user->activated != 0) {
                            ?>
                                <a class="dropdown-item" href="<?php echo site_url('Usersmanagement/banned/' . $user->id_user); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin akan membanned ?')">
                                  <i class="bx bx-trash me-1"></i> Banned
                                </a>
                            <?php
                              }
                            }
                            if ($user->activated == '0') {
                            ?>
                              <a class="dropdown-item" href="<?php echo site_url('Usersmanagement/activate/' . $user->id_user); ?>">
                                <i class="bx bx-check-square me-1"></i> Aktifasi
                              </a>
                            <?php
                            }
                            ?>
                            <?php if ($user->activated != 0) { ?>
                              <a class="dropdown-item" href="<?php echo site_url('Usersmanagement/change_role/' . $user->id_user); ?>">
                                <i class="bx bx-universal-access me-1"></i> Hak Akses
                              </a>
                            <?php } ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <center class="py-4">
              <a href="<?= site_url('Usersmanagement/add'); ?>">
                  <button class="btn btn-outline-primary btn-round" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                      <i class="fas fa-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Pengguna</span>
                  </button>
              </a>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $(document).ready(function() {
        $('#pengguna').DataTable();
    });
</script>