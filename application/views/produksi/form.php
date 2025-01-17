<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Produksi</h3>
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
                    <a href="<?= base_url("Produksi") ?>">Produksi</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Tambah Produksi</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Produksi</div>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('message')): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <?= $this->session->flashdata('message'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <form class="form-horizontal" role="form" action="<?= $action; ?>" method="POST">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="produk">Produk</label>
                                <div class="col-sm-10">
                                    <select name="produk" id="produk" class="form-select form-control" data-placeholder="Pilih Produk . . .">
                                        <option value="">Pilih Produk</option>
                                        <?php foreach ($list_produk as $produk): ?>
                                            <option value="<?= encrypt_url($produk->id_produk); ?>" <?= ($produk->id_produk == $selected_produk) ? 'selected' : ''; ?>>
                                                <?= $produk->produk; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span style="color: red;"><?= form_error('produk'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Pegawai</label>
                                <div class="col-sm-10">
                                    <select name="name" id="name" class="form-select form-control" data-placeholder="Pilih Pegawai . . .">
                                        <option value="">Pilih Pegawai</option>
                                        <?php foreach ($list_pegawai as $pegawai): ?>
                                            <option value="<?= encrypt_url($pegawai->id); ?>" <?= ($pegawai->id == $selected_pegawai) ? 'selected' : ''; ?>>
                                                <?= $pegawai->name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span style="color: red;"><?= form_error('pegawai'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Pelanggan</label>
                                <div class="col-sm-10">
                                    <select name="name" id="name" class="form-select form-control" data-placeholder="Pilih Pelanggan . . .">
                                        <option value="">Pilih Pelanggan</option>
                                        <?php foreach ($list_pelanggan as $pelanggan): ?>
                                            <option value="<?= encrypt_url($pelanggan->id_pelanggan); ?>" <?= ($pelanggan->id_pelanggan == $selected_pelanggan) ? 'selected' : ''; ?>>
                                                <?= $pelanggan->name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span style="color: red;"><?= form_error('pegawai'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="status_pengiriman">Status Pengiriman</label>
                                <div class="col-sm-10">
                                    <select name="status_pengiriman" id="status_pengiriman" class="form-select form-control" data-placeholder="Pilih Status . . .">
                                        <option value="">Pilih Status</option>
                                        <option value="Sudah Dikirim">Sudah Dikirim</option>
                                        <option value="Belum Dikirim">Belum Dikirim</option>
                                    </select>
                                    <span style="color: red;"><?= form_error('status_pengiriman'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="target_produksi">Target Produksi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="target_produksi" id="target_produksi" placeholder="Masukkan Target Produksi . . ." autocomplete="off">
                                    <span style="color: red;"><?= form_error('target_produksi'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="barang_ditaro">Barang Ditaro</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="barang_ditaro" id="barang_ditaro" placeholder="Masukkan Barang Ditaro . . ." autocomplete="off">
                                    <span style="color: red;"><?= form_error('barang_ditaro'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="penyok">Gelas Penyok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="penyok" id="penyok" placeholder="Jumlah Gelas Penyok . . ." value="" autocomplete="off">
                                    <span style="color: red;"><?= form_error('penyok'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="packing">Barang Dipacking</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="packing" id="packing" placeholder="Jumlah Barang Dipacking . . ." value="" autocomplete="off">
                                    <span style="color: red;"><?= form_error('packing'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="reject">Reject</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="reject" id="reject" placeholder="Jumlah Reject . . ." value="" autocomplete="off">
                                    <span style="color: red;"><?= form_error('reject'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="status">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-select form-control" data-placeholder="Pilih Status . . .">
                                        <option value="">Pilih Status</option>
                                        <option value="Stok">Stok</option>
                                        <option value="Kirim">Kirim</option>
                                    </select>
                                    <span style="color: red;"><?= form_error('status'); ?></span>
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

<script src="<?= base_url("assets") ?>/custom/js/produksi/formProduksi.js"></script>