<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'autocomplete' => 'off'
);
?>
<!-- <?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('Email Address', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>
</table>
<p>You can always <a href="<?php echo $logout_link; ?>">logout and try later.</a></p>
<?php echo form_submit('send', 'Send'); ?>
<?php echo form_close(); ?> -->

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default" 
  data-assets-path="<?= base_url('assets/') ?>"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>PT - Tornado (Manajemen Sistem)</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>img/favicon/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="<?= base_url('assets/') ?>vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets/') ?>js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
	<?php
		if ($this->session->flashdata('message')) {
		?>
		<div class="col-xxl-12">
		<!--begin::Alert-->
		<div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row w-100 p-5">
			<!--begin::Icon-->
			<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
			<span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"/>
				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"/>
			</svg>
			</span>
			<!--end::Svg Icon-->
			<!--end::Icon-->
			<!--begin::Content-->
			<div class="d-flex flex-column pe-0 pe-sm-10">
			<h4 class="fw-bold">Berhasil!</h4>
			<span><?php echo $this->session->flashdata('message'); ?></span>
			</div>
			<!--end::Content-->
			<!--begin::Close-->
			<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
			<span class="svg-icon svg-icon-1 svg-icon-success">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"/>
				<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"/>
				</svg>
			</span>
			<!--end::Svg Icon-->
			</button>
			<!--end::Close-->
		</div>
		<!--end::Alert-->
		</div>
		<?php } ?>
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <span class="app-brand-logo demo">
                <img src="<?= base_url('assets/') ?>img/logo/tornado.png" alt="PT-Tornado">
                <!-- <span class="app-brand-text align-self-center demo fw-bold"></span> -->
			</div>
			<h5 class="pb-3 text-center">Aktifasi akun</h5>
              <!-- /Logo -->

              <?php echo form_open($this->uri->uri_string()); ?>
                <div class="mb-3">
                  <label for="email" class="form-label">Email : </label>
				  <?php echo form_input($email); ?>
                  <span style="color:red;">
				  <?php echo form_error($email['name']); ?>
				  <?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
                  </span>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" name="send" type="submit">Kirim</button>
                </div>
              <?php echo form_close(); ?>
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="<?= base_url('assets/') ?>vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?= base_url('assets/') ?>js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>