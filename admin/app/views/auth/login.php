<div class="d-flex flex-center flex-column flex-lg-row-fluid">
  <div class="w-lg-500px p-10">
    <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" id="kt_sign_in_form" action="#">
      <div class="text-center mb-11">
        <h1 class="text-dark fw-bolder mb-3">Đăng nhập</h1>
      </div>
      <div class="row g-3 mb-9">
        <div class="col-md-12">
          <a href="<?= isset($this->model_home->data['authUrl']) ? $this->model_home->data['authUrl'] : false ?>"" class=" btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
            <img alt="Logo" src="<?= BASE('assets/media/svg/google-icon.svg') ?>" class=" h-15px me-3">Sign in with Google</a>
        </div>

      </div>
    </form>

  </div>

</div>