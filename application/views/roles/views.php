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
            <a href="#">Hak Akses</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Hak Akses</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="roles" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Hak Akses</th>
                    <th class="text-center">Nama Lengkap Hak Akses</th>
                    <th class="text-center">Default</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($listRoles->result() as $role) {
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td class="text-center"><?php echo $role->role; ?></td>
                    <td class="text-center"><?php echo $role->full; ?></td>
                    <td class="text-center"><?php if ($role->default == '1') {
                            echo '<span class="badge badge-success">Aktif</span>';
                        } else {
                            echo '<span class="badge badge-danger">Tidak Aktif</span>';
                        }; ?></td>
                    <td class="text-center">
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo site_url('Roles/change_default/' . $role->role_id); ?>"
                            ><i class="bx bx-check-square me-1"></i> Default</a
                        >
                        <a class="dropdown-item" href="<?php echo site_url('Roles/role_permission/' . $role->role_id); ?>"
                            ><i class="bx bx-cog me-1"></i> Modul</a
                        >
                        <a class="dropdown-item" href="<?php echo site_url('Roles/update/' . $role->role_id); ?>"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <a class="dropdown-item" href="<?php echo site_url('Roles/delete/' . $role->role_id); ?>" onclick="return confirm('Are You Sure Want to Delete This Data?')"
                            ><i class="bx bx-trash me-1"></i> Delete</a
                        >
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
              <a href="<?= site_url('Roles/add'); ?>">
                  <button class="btn btn-outline-primary btn-round" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                      <i class="fas fa-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Hak Akses</span>
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
        $('#roles').DataTable();
    });
</script>