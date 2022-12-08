<div class="row g-5 g-xxl-10">


  <div class="col-xxl-6">
    <div class="card card-flush h-md-100">
      <div class="card-body py-9">
        <div class="row gx-9 h-100">
          <div class="col-sm-6 mb-10 mb-sm-0">
            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100" style="background-size: 100% 100%;background-image:url(<?= BASE('assets/media/img-33.jpg') ?>)"></div>
          </div>
          <div class="col-sm-6">
            <div class="d-flex flex-column h-100">
              <div class="mb-7">
                <div class="d-flex flex-stack mb-6">
                  <div class="flex-shrink-0 me-5">
                    <span class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1">Thống kê</span>
                  </div>
                  <span class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">Active</span>
                </div>

              </div>

              <div class="mb-6">

                <div class="d-flex flex-stack">
                  <div class="text-gray-700 fw-semibold fs-6 me-2">Người dùng mới</div>
                  <div class="d-flex align-items-senter">
                    <span class="svg-icon svg-icon-2 svg-icon-success me-2">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="16.9497" y="8.46448" width="13" height="2" rx="1" transform="rotate(135 16.9497 8.46448)" fill="currentColor"></rect>
                        <path d="M14.8284 9.97157L14.8284 15.8891C14.8284 16.4749 15.3033 16.9497 15.8891 16.9497C16.4749 16.9497 16.9497 16.4749 16.9497 15.8891L16.9497 8.05025C16.9497 7.49797 16.502 7.05025 15.9497 7.05025L8.11091 7.05025C7.52512 7.05025 7.05025 7.52513 7.05025 8.11091C7.05025 8.6967 7.52512 9.17157 8.11091 9.17157L14.0284 9.17157C14.4703 9.17157 14.8284 9.52975 14.8284 9.97157Z" fill="currentColor"></path>
                      </svg>
                    </span>

                    <span class="text-gray-900 fw-bolder fs-6">
                      <?= isset($this->data['teacher']['now']) ? $this->data['teacher']['now'] : 'loading' ?>

                    </span>

                  </div>

                </div>

                <div class="separator separator-dashed my-3"></div>

                <div class="d-flex flex-stack">

                  <div class="text-gray-700 fw-semibold fs-6 me-2">Người dùng hoạt động</div>

                  <div class="d-flex align-items-senter">


                    <span class="text-gray-900 fw-bolder fs-6">

                      <?= isset($this->data['teacher']['active']) ? $this->data['teacher']['active'] : 'loading' ?>

                    </span>

                  </div>

                </div>

                <div class="separator separator-dashed my-3"></div>

                <div class="d-flex flex-stack">

                  <div class="text-gray-700 fw-semibold fs-6 me-2">Tổng người dùng</div>

                  <div class="d-flex align-items-senter">

                    <span class="svg-icon svg-icon-2 svg-icon-success me-2">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="16.9497" y="8.46448" width="13" height="2" rx="1" transform="rotate(135 16.9497 8.46448)" fill="currentColor"></rect>
                        <path d="M14.8284 9.97157L14.8284 15.8891C14.8284 16.4749 15.3033 16.9497 15.8891 16.9497C16.4749 16.9497 16.9497 16.4749 16.9497 15.8891L16.9497 8.05025C16.9497 7.49797 16.502 7.05025 15.9497 7.05025L8.11091 7.05025C7.52512 7.05025 7.05025 7.52513 7.05025 8.11091C7.05025 8.6967 7.52512 9.17157 8.11091 9.17157L14.0284 9.17157C14.4703 9.17157 14.8284 9.52975 14.8284 9.97157Z" fill="currentColor"></path>
                      </svg>
                    </span>
                    <span class="text-gray-900 fw-bolder fs-6">
                      <?= isset($this->data['teacher']['total']) ? $this->data['teacher']['total'] : 'loading' ?>

                    </span>
                  </div>
                </div>

                <div class="separator separator-dashed my-3"></div>

                <div class="d-flex flex-stack">

                  <div class="text-gray-700 fw-semibold fs-6 me-2">Trạng thái website</div>

                  <div class="d-flex align-items-senter">



                    <span class="text-gray-900 fw-bolder fs-6 badge py-3 px-4 fs-7 badge-light-<?= isset($this->data['site_status']) && $this->data['site_status'] == 2 ? 'success' : 'warning' ?>">
                      <?= isset($this->data['site_status']) && $this->data['site_status'] == 2 ? 'Hoạt động' : 'Ngừng hoạt động' ?>
                    </span>
                  </div>
                </div>
              </div>



              <div class="d-flex flex-stack mt-auto bd-highlight">
                <div class="symbol-group symbol-hover flex-nowrap">

                </div>
                <a href="<?= BASE_URL('giao-vien') ?>" class="text-primary opacity-75-hover fs-6 fw-semibold">Quản lý giáo viên
                  <span class="svg-icon svg-icon-4 svg-icon-gray-800 ms-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path opacity="0.3" d="M4.7 17.3V7.7C4.7 6.59543 5.59543 5.7 6.7 5.7H9.8C10.2694 5.7 10.65 5.31944 10.65 4.85C10.65 4.38056 10.2694 4 9.8 4H5C3.89543 4 3 4.89543 3 6V19C3 20.1046 3.89543 21 5 21H18C19.1046 21 20 20.1046 20 19V14.2C20 13.7306 19.6194 13.35 19.15 13.35C18.6806 13.35 18.3 13.7306 18.3 14.2V17.3C18.3 18.4046 17.4046 19.3 16.3 19.3H6.7C5.59543 19.3 4.7 18.4046 4.7 17.3Z" fill="currentColor"></path>
                      <rect x="21.9497" y="3.46448" width="13" height="2" rx="1" transform="rotate(135 21.9497 3.46448)" fill="currentColor"></rect>
                      <path d="M19.8284 4.97161L19.8284 9.93937C19.8284 10.5252 20.3033 11 20.8891 11C21.4749 11 21.9497 10.5252 21.9497 9.93937L21.9497 3.05029C21.9497 2.498 21.502 2.05028 20.9497 2.05028L14.0607 2.05027C13.4749 2.05027 13 2.52514 13 3.11094C13 3.69673 13.4749 4.17161 14.0607 4.17161L19.0284 4.17161C19.4702 4.17161 19.8284 4.52978 19.8284 4.97161Z" fill="currentColor"></path>
                    </svg>
                  </span>
                </a>
              </div>


            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="col-xxl-6">
    <div class="card border-0 h-md-100" data-theme="light" style="background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%)">
      <div class="card-body">
        <div class="row align-items-center h-100">
          <div class="col-7 ps-xl-13">
            <div class="text-white mb-6 pt-6">
              <span class="fs-4 fw-semibold me-2 d-block lh-1 pb-2 opacity-75">GGOAT</span>
              <span class="fs-2qx fw-bold">Quản lý điểm sinh viên </span>
            </div>
            <span class="fw-semibold text-white fs-6 mb-8 d-block opacity-75">

              Website quản lý điểm sinh viên dành cho Giáo viên FPT Polytechnic do sinh viên trường phát triển.
            </span>

            <div class="d-flex flex-column flex-sm-row d-grid gap-2">
              <a href="<?= BASE('') ?>" class="btn btn-primary flex-shrink-0" style="background: rgba(255, 255, 255, 0.2)">My App</a>
            </div>
          </div>
          <div class="col-5 pt-10">
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-end h-225px" style="background-image:url('<?= BASE('assets/media/svg/5.svg') ?>')"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>