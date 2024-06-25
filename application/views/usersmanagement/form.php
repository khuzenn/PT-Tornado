<?php
$nama_lengkap = array(
    'name' => 'nama_lengkap',
    'id' => 'nama_lengkap',
    'class' => 'form-control',
    'value' => $data_name,
    'autocomplete' => 'off'
);

$username = array(
    'name' => 'username',
    'id' => 'username',
    'class' => 'form-control',
    'value' => $data_username,
    'maxlength' => $this->config->item('username_max_length', 'tank_auth'),
    'autocomplete' => 'off'
);

$email = array(
    'name' => 'email',
    'id' => 'email',
    'class' => 'form-control',
    'value' => $data_email,
    'autocomplete' => 'off'
);

$foto = array(
    'class' => 'form-control',
    'name' => 'foto',
    'id' => 'foto',
    'type' => 'file',
    'value' => set_value('foto'),
    'autocomplete' => 'off'
);
?>

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
                    <a>Edit Pengguna</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img class="img-fluid rounded w-75" src="<?php echo ($profile_foto != 'no_image.jpg') ? base_url('/assets/media/profiles/') . $profile_foto : base_url('/assets/media/avatars/blank.png'); ?>">
                        </div>
                        <h3 class="profile-username text-center"><?php if (isset($data_name)) { echo $data_name; } ?></h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-row-bordered table-rounded table-striped table-hover border gy-5 gs-7">
                                <tr>
                                    <td class="fw-bold text-end" style="width: 220px; height: 35px; !important;">Username :</td>
                                    <td ><?php echo $data_username; ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" style="width: 220px; height: 35px; !important;">Email :</td>
                                    <td ><?php echo $data_email; ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" style="width: 220px; height: 35px; !important;">Jenis Kelamin :</td>
                                    <td ><?php echo ($data_jenis_kelamin == 'P') ? 'Pria' : 'Wanita'; ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" style="width: 220px; height: 35px; !important;">Tanggal Lahir :</td>
                                    <td ><?php echo $data_tangal_lahir; ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-end" style="width: 220px; height: 35px; !important;">Alamat :</td>
                                    <td ><?php echo $data_alamat; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Pengguna</div>
                    </div>
                    <?php echo form_open($action, 'class="form-horizontal" enctype="multipart/form-data"'); ?>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label class="col-12 col-sm-3 col-form-label text-start text-sm-end" for="nama_lengkap">Nama Lengkap :</label>
                            <div class="col-12 col-sm-9">
                                <?php echo form_input($nama_lengkap); ?>
                            </div>
                            <div class="col-12">
                                <span style="color: red;"><?php echo form_error($nama_lengkap['name']); ?><?php echo isset($errors[$nama_lengkap['name']]) ? $errors[$nama_lengkap['name']] : ''; ?></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-12 col-sm-3 col-form-label text-start text-sm-end" for="username">Username :</label>
                            <div class="col-12 col-sm-9">
                                <?php echo form_input($username); ?>
                            </div>
                            <div class="col-12">
                                <span style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']]) ? $errors[$username['name']] : ''; ?></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-12 col-sm-3 col-form-label text-start text-sm-end" for="email">Email :</label>
                            <div class="col-12 col-sm-9">
                                <?php echo form_input($email); ?>
                            </div>
                            <div class="col-12">
                                <span style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']]) ? $errors[$email['name']] : ''; ?></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-12 col-sm-3 col-form-label text-start text-sm-end">Jenis Kelamin :</label>
                            <div class="col-sm-9 pt-2">
                                <input type="radio" name="gender" class="form-check-input" value="P" <?php echo ($data_jenis_kelamin == 'P') ? 'checked' : ''; ?>>&nbsp Pria &nbsp
                                <input type="radio" name="gender" class="form-check-input" value="W" <?php echo ($data_jenis_kelamin == 'W') ? 'checked' : ''; ?>>&nbsp Wanita
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-12 col-sm-3 col-form-label text-start text-sm-end">Tanggal Lahir:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="html5-date-input" name="tanggal_lahir" value="<?php echo $data_tangal_lahir; ?>" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-12 col-sm-3 col-form-label text-start text-sm-end">Alamat:</label>
                            <div class="col-sm-9">
                                <textarea name="alamat" class="form-control" rows="5"><?php echo $data_alamat; ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-12 col-sm-3 col-form-label text-start text-sm-end" for="foto">Foto:</label>
                            <div class="col-sm-9">
                                <?php echo form_input($foto); ?>
                            </div>
                            <span style="color: red;"><?php echo form_error($foto['name']); ?><?php echo isset($errors[$foto['name']]) ? $errors[$foto['name']] : ''; ?></span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <center>
                            <button type="submit" class="btn btn-primary btn-round">
                                <i class='far fa-save'></i>&nbsp Simpan
                            </button>
                        </center>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>