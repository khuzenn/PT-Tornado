<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Pegawai</h3>
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
            <a href="#">Pegawai</a>
          </li>
        </ul>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Daftar Pegawai</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="pegawai" class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Pegawai</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Hak Akses</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach ($listuser->result() as $user) {
                    $this->db->select('roles.role');
                    $this->db->from('users');
                    $this->db->join('user_roles', 'user_roles.user_id = users.id');
                    $this->db->join('roles', 'roles.role_id = user_roles.role_id');
                    $this->db->where('users.id', $user->id);
                    $role_query = $this->db->get();
  
                    $role_row = $role_query->row();
                    $role = ($role_query->num_rows() > 0) ? $role_row->role : 'Tidak Diketahui';
                  ?>
                  <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td class="text-center"><?= $user->name; ?></td>
                    <td class="text-center"><?php echo ($user->activated == '1') ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>'; ?></td>
                    <td class="text-center"><?php echo $role; ?></td>
                  </tr>
                  <?php 
                  $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $(document).ready(function() {
        $('#pegawai').DataTable();
    });
</script>