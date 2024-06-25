<style>
    .bootstrap-duallistbox-container select {
        height: 300px !important;
    }
</style>

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
                    <a href="<?= base_url("Hak Akses") ?>">Hak Akses</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Form Hak Akses</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Form Hak Akses</div>
                        <a href="<?= base_url("Roles") ?>"><i class="icon-close" style="font-size: 2rem; color: red; padding-top: 2px;"></i></a>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
                            <div class="row mb-3">
                                <input type="hidden" class="form-control" name="flag" placeholder="Permission" autocomplete="on" value="1">
                                <div class="row">
                                    <select class="duallistbox" multiple="multiple" name="permission_id[]">
                                        <?php foreach ($listPermission->result() as $permission) {
                                            (in_array($permission->permission_id, $listPermissionByRoles)) ? $pilih = 'selected' : $pilih = '';
                                        ?>
                                            <option value="<?php echo $permission->permission_id ?>" <?php echo $pilih; ?>><?php echo $permission->description; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- <div class="row justify-content-end pt-3"> -->
                                    <div class="col-sm-12 pt-3 text-center">
                                        <button type="submit" class="btn btn-outline-primary btn-round">
                                            <i class='far fa-save'></i>&nbsp Simpan
                                        </button>
                                    </div>
                                <!-- </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url("assets/kaiadmin") ?>/assets/js/core/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="<?= base_url("assets") ?>/custom/js/duallistbox/duallistbox.js"></script>