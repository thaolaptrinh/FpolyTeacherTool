<?php require_once 'app/views/include/head.php'; ?>
<div class="d-fle  flex-column flex-root app-root" id="kt_app_root">
  <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
    <?php require_once 'app/views/include/admin/header.php'; ?>
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
      <div class="app-container container-xxl d-flex flex-row flex-column-fluid" id="app-container">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
              <div class="d-flex  flex-grow-1 flex-stack flex-wrap gap-2 mb-n10" id="kt_toolbar">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                  <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    <?= $this->data['page_title'] ?>

                  </h1>
                  <?php if ($page_target == 'site') { ?>
                    <?php if ($page_target == 'site') { ?>
                      <div class="p-3">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                          <input class="form-check-input" type="checkbox" value="2" <?= isset($this->data['site_status']) && $this->data['site_status'] == 2 ? 'checked' : '' ?> name="site_status">
                        </label>
                      </div>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
              <?php
              $this->render($content) ?>

            </div>
          </div>
          <div id="kt_app_footer" class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3 py-lg-6">
            <div class="text-dark order-2 order-md-1">
              <span class="text-muted fw-semibold me-1">2022©</span>
              <a href="javascript:void(0)" target="_blank" class="text-gray-800 text-hover-primary">Sinh Viên FPT Polytechnic</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>

<?php require_once 'app/views/include/admin/widget.php'; ?>
<?php require_once 'app/views/include/end.php'; ?>