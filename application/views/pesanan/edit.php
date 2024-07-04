<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Pesanan</h3>
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
                    <a href="<?= base_url("Pesanan") ?>">Pesanan</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a>Edit Pesanan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Pesanan</div>
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
                                <label class="col-sm-2 col-form-label" for="name">Nama Pelanggan</label>
                                <div class="col-sm-10">
                                    <select name="name" class="form-select form-control" data-placeholder="Pilih Pelanggan . . .">
                                        <option value="">Pilih Pelanggan</option>
                                        <?php foreach ($list_pelanggan as $pelanggan): ?>
                                            <option value="<?= encrypt_url($pelanggan->id_pelanggan); ?>" <?= ($pelanggan->id_pelanggan == $selected_pelanggan) ? 'selected' : ''; ?>>
                                                <?= $pelanggan->name; ?>
                                            </option>
                                        <?php endforeach; ?> 
                                    </select>
                                    <span style="color: red;"><?= form_error('name'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="produk">Produk</label>
                                <div class="col-sm-10">
                                    <select name="produk" class="form-select form-control" data-placeholder="Pilih Produk . . .">
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
                                <label class="col-sm-2 col-form-label" for="quantity">Jumlah</label>
                                <div class="col-sm-10">
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    id="quantity" 
                                    name="quantity"  
                                    autocomplete="off"
                                    value="<?php if (isset($quantity)) {
                                    echo $quantity;
                                        } ?>">
                                    <span style="color: red;"><?= form_error('quantity'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="sell_price">Harga</label>
                                <div class="col-sm-10">
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    id="sell_price" 
                                    name="sell_price" 
                                    autocomplete="off"
                                    value="<?php if (isset($sell_price)) {
                                    echo $sell_price;
                                        } ?>">
                                    <span style="color: red;"><?= form_error('sell_price'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="paid">Sudah Dibayar</label>
                                <div class="col-sm-10">
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    id="paid" 
                                    name="paid" 
                                    autocomplete="off"
                                    value="<?php if (isset($paid)) {
                                    echo $paid;
                                        } ?>">
                                    <span style="color: red;"><?= form_error('paid'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="sell_price_total">Total Harga</label>
                                <div class="col-sm-10">
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    id="sell_price_total" 
                                    name="sell_price_total" 
                                    autocomplete="off"
                                    value="<?php if (isset($sell_price_total)) {
                                    echo $sell_price_total;
                                        } ?>">
                                    <span style="color: red;"><?= form_error('sell_price_total'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="status">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-select form-control" data-placeholder="Pilih Status . . .">
                                        <option value="">Pilih Status</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Unpaid">Unpaid</option>
                                        <option value="Term">Term</option>
                                    </select>
                                    <span style="color: red;"><?= form_error('status'); ?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="note">Catatan</label>
                                <div class="col-sm-10">
                                    <textarea 
                                    type="text" 
                                    class="form-control" 
                                    name="note" 
                                    autocomplete="off"
                                    value=""><?php if (isset($note)) {
                                        echo $note;
                                    } ?></textarea>
                                    <span style="color: red;"><?= form_error('note'); ?></span>
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

<!-- Total Harga -->
<script>
    function calculateTotalPrice() {
        var quantity = parseFloat(document.getElementById('quantity').value);
        var sellPrice = parseFloat(document.getElementById('sell_price').value.replace(",", ""));

        if (!isNaN(quantity) && !isNaN(sellPrice)) {
            var totalPrice = quantity * sellPrice;
            document.getElementById('sell_price_total').value = totalPrice.toLocaleString('id');
        } else {
            document.getElementById('sell_price_total').value = '';
        }
    }

    document.getElementById('sell_price').addEventListener('input', calculateTotalPrice);
    document.getElementById('quantity').addEventListener('input', calculateTotalPrice);

    function activateTotalPriceInput() {
        document.getElementById('sell_price_total').disabled = false;
        return true; // Pastikan formulir dapat diserahkan
    }
</script>

<!-- Get Harga By Produk -->
<script src="<?= base_url("assets/kaiadmin") ?>/assets/js/core/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#produk').change(function() {
            var id_produk = $(this).val();
            if (id_produk) {
                $.ajax({
                    url: "<?= site_url('Pesanan/get_harga'); ?>",
                    type: "POST",
                    data: {id_produk: id_produk},
                    dataType: "json",
                    success: function(data) {
                        $('#sell_price').val(data.harga);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            } else {
                $('#sell_price').val('');
            }
        });
    });
</script>