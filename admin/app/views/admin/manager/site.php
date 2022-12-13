<div class="card mb-5 mb-xl-10">

  <div id="kt_account_settings_signin_method" class="collapse show">
    <div class="card-body border-top p-9">
      <div class="d-flex flex-wrap align-items-center mb-10">
        <?php $site = $this->model_home->data['site'];
        extract($site);
        ?>
        <div class="flex-row-fluid">
          <form id="kt_change_site" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
            <div class="row mb-1">



              <div class="col-lg-6">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                  <label for="site_title" class=" required form-label fs-6 fw-bold mb-3">Site title</label>
                  <textarea id="site_title" name="site_title" class="form-control form-control-solid mb-3 mb-lg-0"><?= $site_title ?></textarea>
                </div>
              </div>




              <div class="col-lg-6">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                  <label for="site_name" class=" required form-label fs-6 fw-bold mb-3">Site name</label>
                  <textarea id="site_name" name="site_name" class="form-control form-control-solid mb-3 mb-lg-0"><?= $site_name ?></textarea>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                  <label for="site_description" class=" required form-label fs-6 fw-bold mb-3">Site description</label>
                  <textarea id="site_description" name="site_description" class="form-control form-control-solid mb-3 mb-lg-0"><?= $site_description ?></textarea>
                </div>
              </div>


              <div class="col-lg-6">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                  <label for="site_keywords" class=" required form-label fs-6 fw-bold mb-3">Site keywords</label>
                  <textarea id="site_keywords" name="site_keywords" class="form-control form-control-solid mb-3 mb-lg-0"><?= $site_keywords ?></textarea>
                </div>
              </div>


              <div class="separator separator-dashed my-6"></div>

              <div class="col-lg-3 col-md-4">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                  <label for="smtp_user" class="required form-label fs-6 fw-bold mb-3">Smtp user</label>
                  <input type="smtp_user" value="<?= $smtp_user ?>" class="form-control form-control-lg form-control-solid" name="smtp_user" id="smtp_user">
                </div>
              </div>

              <div class="col-lg-3 col-md-4">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                  <label for="smtp_pass" class="required form-label fs-6 fw-bold mb-3">Smtp password</label>
                  <input type="smtp_pass" value="<?= $smtp_pass ?>" class="form-control form-control-lg form-control-solid" name="smtp_pass" id="smtp_pass">
                </div>
              </div>

              <div class="col-lg-3 col-md-4">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                  <label for="smtp_server" class="required form-label fs-6 fw-bold mb-3">Smtp server</label>
                  <input type="smtp_server" value="<?= $smtp_server ?>" class="form-control form-control-lg form-control-solid" name="smtp_server" id="smtp_server">
                </div>
              </div>

              <div class="col-lg-3 col-md-4">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                  <label for="smtp_port" class="required form-label fs-6 fw-bold mb-3">Smtp port</label>
                  <input type="smtp_port" value="<?= $smtp_port ?>" class="form-control form-control-lg form-control-solid" name="smtp_port" id="smtp_port">
                </div>
              </div>

              <div class="col-lg-3 col-md-4">
                <div class="fv-row mb-0 fv-plugins-icon-container">
                  <label for="smtp_protocol" class="required form-label fs-6 fw-bold mb-3">Smtp protocol</label>
                  <input type="smtp_protocol" value="<?= $smtp_protocol ?>" class="form-control form-control-lg form-control-solid" name="smtp_protocol" id="smtp_protocol">
                </div>
              </div>
            </div>
            <div class="d-flex flex-end">
              <button id="kt_submit" type="button" class="btn btn-primary me-2 px-6">Cập nhật</button>
            </div>
          </form>
        </div>

      </div>


    </div>
  </div>
</div>