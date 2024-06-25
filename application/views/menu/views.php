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
            <a href="#">Menu</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="card-title">Daftar Menu</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="menu" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th>Nama Menu</th>
                    <th>Parent Menu</th>
                    <th>icon</th>
                    <th>kategori</th>
                    <th>Link</th>
                    <th class="text-center">Urutan Menu</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $x = 1;
                  foreach ($listMenu->result() as $menu) {
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $x; ?></td>
                      <td><?php echo $menu->nama_menu; ?></td>
                      <td><?php echo $menu->nama_menu_parent; ?></td>
                      <td>
                        <i class="<?php echo $menu->icon; ?>"></i> &nbsp - &nbsp <?php echo $menu->icon; ?>
                      </td>
                      <td><?php echo $menu->kategori; ?></td>
                      <td><?php echo $menu->href; ?></td>
                      <td class="text-center"><?php echo $menu->sort; ?></td>
                      <td class="text-center"><?php echo ($menu->status == 'Y') ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>'; ?></td>
                      <td class="text-center">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('Menu/update/' . $menu->id_menu); ?>">
                              <i class="bx bx-edit-alt me-1"></i> Edit
                            </a>
                            <a class="dropdown-item" href="<?php echo site_url('Menu/delete/' . $menu->id_menu); ?>" onclick="return confirm('Are You Sure Want to Delete This Data?')">
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
              <a href="<?= site_url('Menu/add'); ?>">
                  <button class="btn btn-outline-primary btn-round" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                      <i class="fas fa-plus me-sm-1"></i>
                      <span class="d-none d-sm-inline-block">Tambah Menu</span>
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
        $('#menu').DataTable();
    });
</script>