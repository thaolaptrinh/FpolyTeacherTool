<?php require_once 'app/views/include/head.php';
?>


<div class="d-flex  flex-column flex-root app-root" id="kt_app_root">
  <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
    <?php require_once 'app/views/include/teacher/header.php'; ?>
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
      <div class="app-container container-xxl d-flex flex-row flex-column-fluid" id="app-container">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
              <div class="d-flex flex-grow-1 flex-stack flex-wrap gap-2 mb-n10" id="kt_toolbar">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                  <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $this->data['page_title'] ?></h1>
                </div>
              </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
              <?php
              $this->render($content) ?>
              <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-900px">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2>Bảng điểm</h2>
                      <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                          </svg>
                        </span>
                      </div>
                    </div>
                    <div class="modal-body py-lg-10 px-lg-10">
                      <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper" data-kt-stepper="true">
                        <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                          <div class="stepper-nav ps-lg-10">
                            <div class="stepper-item current" data-kt-stepper-element="nav">
                              <div class="stepper-wrapper">
                                <div class="stepper-icon w-40px h-40px">
                                  <i class="stepper-check fas fa-check"></i>
                                  <span class="stepper-number">1</span>
                                </div>
                                <div class="stepper-label">
                                  <h3 class="stepper-title">Học kỳ</h3>
                                  <div class="stepper-desc">Học kỳ </div>
                                </div>
                              </div>
                              <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item" data-kt-stepper-element="nav">
                              <div class="stepper-wrapper">
                                <div class="stepper-icon w-40px h-40px">
                                  <i class="stepper-check fas fa-check"></i>
                                  <span class="stepper-number">2</span>
                                </div>
                                <div class="stepper-label">
                                  <h3 class="stepper-title">Lớp học</h3>
                                  <div class="stepper-desc">Loại lớp</div>
                                </div>
                              </div>
                              <div class="stepper-line h-40px"></div>
                            </div>
                            <div class="stepper-item" data-kt-stepper-element="nav">
                              <div class="stepper-wrapper">
                                <div class="stepper-icon w-40px h-40px">
                                  <i class="stepper-check fas fa-check"></i>
                                  <span class="stepper-number">3</span>
                                </div>

                                <div class="stepper-label">
                                  <h3 class="stepper-title">Môn học</h3>
                                  <div class="stepper-desc">Môn học</div>
                                </div>
                              </div>
                              <div class="stepper-line h-40px"></div>
                            </div>
                            <div class="stepper-item" data-kt-stepper-element="nav">
                              <div class="stepper-wrapper">
                                <div class="stepper-icon w-40px h-40px">
                                  <i class="stepper-check fas fa-check"></i>
                                  <span class="stepper-number">4</span>
                                </div>

                                <div class="stepper-label">
                                  <h3 class="stepper-title">Import sinh viên</h3>
                                  <div class="stepper-desc">Danh sách sinh viên</div>
                                </div>
                              </div>
                              <div class="stepper-line h-40px"></div>
                            </div>
                            <div class="stepper-item mark-completed" data-kt-stepper-element="nav">
                              <div class="stepper-wrapper">
                                <div class="stepper-icon w-40px h-40px">
                                  <i class="stepper-check fas fa-check"></i>
                                  <span class="stepper-number">5</span>
                                </div>
                                <div class="stepper-label">
                                  <h3 class="stepper-title">Hoàn tất</h3>
                                  <div class="stepper-desc">Tạo dữ liệu thành công</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="flex-row-fluid py-lg-5 px-lg-15">

                          <form class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data" novalidate="novalidate" id="kt_modal_create_app_form">
                            <div class="current" data-kt-stepper-element="content">
                              <div class="w-100">
                                <div class="fv-row">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                      <span class="required">Danh sách</span>
                                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Lựa chọn học kỳ"></i>
                                    </label>
                                    <a class="btn btn-primary" href="<?= BASE_URL('danh-muc/hoc-ky') ?>" target="_blank">Thêm mới</a>
                                  </div>



                                  <div class="fv-row fv-plugins-icon-container scroll-y  max-h-300px">
                                    <?php
                                    if (!empty($this->data['hoc_ky']) && isset($this->data['hoc_ky'])) {
                                      $hoc_ky = $this->data['hoc_ky'];
                                      foreach ($hoc_ky as $value) {
                                        extract($value); ?>
                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                          <span class="d-flex align-items-center me-2">
                                            <span class="symbol symbol-50px me-6">
                                              <span class="symbol-label bg-light-primary">
                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor"></path>
                                                    <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor"></path>
                                                  </svg>
                                                </span>
                                              </span>
                                            </span>
                                            <span class="d-flex flex-column">
                                              <span class="fw-bold fs-6"><?= $ten_hocky ?></span>
                                            </span>
                                          </span>
                                          <span class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" name="hoc-ky" checked="checked" value="<?= $id_hocky ?>">
                                          </span>
                                        </label>
                                    <?php }
                                    } ?>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div data-kt-stepper-element="content">
                              <div class="w-100">
                                <div class="fv-row fv-plugins-icon-container scroll-y  max-h-300px">


                                  <div class="d-flex justify-content-between align-items-center">
                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                      <span class="required">Danh sách</span>
                                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Chọn lớp học"></i>
                                    </label>
                                    <a class="btn btn-primary" href="<?= BASE_URL('danh-muc/loai-lop') ?>" target="_blank">Thêm mới</a>
                                  </div>

                                  <?php
                                  if (!empty($this->data['loai_lop']) && isset($this->data['loai_lop'])) {
                                    $loai_lop = $this->data['loai_lop'];
                                    foreach ($loai_lop as $value) {
                                      extract($value); ?>
                                      <label class="d-flex flex-stack cursor-pointer mb-5">
                                        <span class="d-flex align-items-center me-2">
                                          <span class="symbol symbol-50px me-6">
                                            <span class="symbol-label bg-light-success">
                                              <i class="fas fa-database text-success fs-2x"></i>
                                            </span>
                                          </span>
                                          <span class="d-flex flex-column">
                                            <span class="fw-bold fs-6"><?= $ten_lop ?></span>
                                          </span>
                                        </span>
                                        <span class="form-check form-check-custom form-check-solid">
                                          <input class="form-check-input" type="radio" name="loai-lop" checked="checked" value="<?= $id_loai ?>">
                                        </span>
                                      </label>
                                  <?php }
                                  } ?>


                                </div>
                              </div>
                            </div>
                            <div data-kt-stepper-element="content">
                              <div class="w-100">
                                <div class="fv-row">


                                  <div class="d-flex justify-content-between align-items-center">
                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                      <span class="required">Danh sách</span>
                                      <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Lựa chọn môn học"></i>
                                    </label>
                                    <a class="btn btn-primary" href="<?= BASE_URL('danh-muc/mon-hoc') ?>" target="_blank">Thêm mới</a>
                                  </div>


                                  <div class="fv-row fv-plugins-icon-container scroll-y  max-h-300px">
                                    <?php
                                    if (!empty($this->data['mon_hoc']) && isset($this->data['mon_hoc'])) {
                                      $mon_hoc = $this->data['mon_hoc'];
                                      foreach ($mon_hoc as $value) {
                                        extract($value); ?>
                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                          <span class="d-flex align-items-center me-2">
                                            <span class="symbol symbol-50px me-6">
                                              <span class="symbol-label bg-light-primary">
                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor"></path>
                                                    <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor"></path>
                                                  </svg>
                                                </span>
                                              </span>
                                            </span>
                                            <span class="d-flex flex-column">
                                              <span class="fw-bold fs-6"><?= $ma_mon ?></span>
                                              <span class="fs-7 text-muted">
                                                <?= $ten_mon ?>
                                              </span>
                                            </span>
                                          </span>
                                          <span class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" name="mon-hoc" checked="checked" value="<?= $id_mon ?>">
                                          </span>
                                        </label>
                                    <?php }
                                    } ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div data-kt-stepper-element="content">
                              <div class="w-100">
                                <div class="fv-row">

                                  <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                    <span class="required">Import </span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Import danh sách sinh viên"></i>
                                  </label>
                                  <div class="fv-row fv-plugins-icon-container scroll-y  max-h-300px">
                                    <label for="file-sv" class="btn btn-primary"><span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor"></path>
                                          <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="currentColor"></path>
                                          <path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="currentColor"></path>
                                        </svg>
                                      </span>Upload File</label>
                                    <input type="file" id="file-sv" name="file-sv">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div data-kt-stepper-element="content">
                              <div class="w-100 text-center">
                                <h1 class="fw-bold text-dark mb-3">Hoàn tất!</h1>
                                <div class="text-muted fw-semibold fs-3">Tạo bảng điểm thành công.</div>
                                <div class="text-center px-4 py-15">
                                  <img src="" alt="" class="mw-100 mh-300px" />
                                  <div>
                                    <a href="#" id="view-bang-diem" class="btn btn-lg btn-light-primary me-3">
                                      Xem bảng điểm
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- <div data-kt-stepper-element="content">
                              <div class="w-100 text-center">
                                <h1 class="fw-bold text-dark mb-3">Hoàn tất!</h1>
                                <div class="text-center px-4 py-15">
                                  <img src="" alt="" class="mw-100 mh-300px">
                                </div>
                              </div>
                            </div> -->
                            <div class="d-flex flex-stack pt-10">
                              <div class="me-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                  <span class="svg-icon svg-icon-3 me-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor"></rect>
                                      <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor"></path>
                                    </svg>
                                  </span>
                                  Quay lại
                                </button>
                              </div>
                              <div>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                  <span class="indicator-label">Submit
                                    <span class="svg-icon svg-icon-3 ms-2 me-0">
                                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
                                      </svg>
                                    </span>
                                  </span>
                                  <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Tiếp tục
                                  <span class="svg-icon svg-icon-3 ms-1 me-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                      <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
                                    </svg>
                                  </span>
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



<?php require_once 'app/views/include/teacher/widget.php'; ?>
<?php require_once 'app/views/include/end.php'; ?>