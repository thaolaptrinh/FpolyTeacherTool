<?php require_once 'app/views/include/head.php'; ?>
<div class="d-flex flex-column flex-root" id="kt_app_root">
  <div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <div class="bg-auth d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center" style="background-image: url(<?= BASE('assets/media/misc/auth-bg.png') ?>);">
      <div class="d-flex flex-column flex-center p-6 p-lg-10 w-100">
        <a href="" class="mb-0 mb-lg-20">
          <img alt="Logo" src="<?= BASE('assets/media/logos/logo.png') ?>" class="h-40px h-lg-50px" />
        </a>
        <img class="d-none d-lg-block mx-auto w-300px w-lg-75 w-xl-500px mb-10 mb-lg-20" src="<?= BASE('') ?> " alt="" />
        <h1 class=" d-none d-lg-block text-white fs-2qx fw-bold text-center mb-7">Fpoly Teacher Tool</h1>
        <div class="d-none d-lg-block text-white fs-base text-center">
          Website quản lý điểm sinh viên,
          <a href="javascript:void(0)" class="opacity-75-hover text-warning fw-semibold me-1">
            Fpoly Teacher Tool
          </a>
          <br />với đội ngũ sinh viên trường
          <a href="javascript:void(0)" class="opacity-75-hover text-warning fw-semibold me-1">FPT Polytechnic</a>
          xây dựng và phát triển.
        </div>
      </div>
    </div>
    <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
      <?php $this->render($content) ?>
    </div>
  </div>
</div>
<div id="toast-auth"></div>
<?php require_once 'app/views/include/end.php' ?>