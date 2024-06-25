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
            <a href="#">Model</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Model</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="model" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th>Modul</th>
                    <th>Controller</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $x = 1;
                  foreach ($listPermission->result() as $permission) {
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $x; ?></td>
                      <td><?php echo $permission->description; ?></td>
                      <td><?php echo $permission->permission; ?></td>
                      <td class="text-center">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('Permission/update/' . $permission->permission_id); ?>">
                              <i class="bx bx-edit-alt me-1"></i> Edit
                            </a>
                            <a class="dropdown-item" href="<?php echo site_url('Permission/delete/' . $permission->permission_id); ?>" onclick="return confirm('Are You Sure Want to Delete This Data?')">
                              <i class="bx bx-trash me-1"></i> Delete
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php
                    $x++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <center class="py-4">
              <a href="<?= site_url('Permission/add'); ?>">
                  <button class="btn btn-outline-primary btn-round" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                      <i class="fas fa-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Model</span>
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
        $('#model').DataTable();
    });
</script>