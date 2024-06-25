<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PT - Tornado (Manajemen Sistem)</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="<?= base_url("assets/kaiadmin") ?>/assets/img/kaiadmin/tornado.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="<?= base_url("assets/kaiadmin") ?>/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["<?= base_url("assets/kaiadmin") ?>/assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url("assets/kaiadmin") ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url("assets/kaiadmin") ?>/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?= base_url("assets/kaiadmin") ?>/assets/css/kaiadmin.min.css" />

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= base_url("assets/kaiadmin") ?>/assets/css/demo.css" />

    <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  </head>
  <body>