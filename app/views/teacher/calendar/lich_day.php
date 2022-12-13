<div class="card">
  <div class="card-body py-4">
    <form method="get" action="">
      <div class="row mb-10">
        <div class="col-lg-6">
          <label class="required fs-6 fw-semibold form-label mb-2 badge badge-light-success">
            Lựa chọn trạng thái để hiện thị chi tiết lịch học
          </label>
          <div class="row fv-row">
            <select name="status" onchange="this.form.submit();" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Trạng thái">
              <option></option>
              <option value="1" <?= (isset($_GET['status'])  && $_GET['status'] == 1) || !isset($_GET['status']) ? 'selected="selected"' : false  ?>>Lịch đang dạy</option>
              <option value="0" <?= isset($_GET['status']) && $_GET['status'] == 0 ? 'selected="selected"' : false  ?>>Lịch đã dạy</option>
            </select>
          </div>
        </div>
        <div class="col-lg-6">
          <label class="required fs-6 fw-semibold form-label mb-2 badge badge-light-success">Lựa chọn môn học để hiện thị chi tiết lịch học</label>
          <div class="row fv-row">
            <select name="day" onchange="this.form.submit();" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Thời gian">
              <option></option>
              <option value="0" <?= (isset($_GET['day'])  && $_GET['day'] == 0) || !isset($_GET['day']) ? 'selected="selected"' : false  ?>>Thời gian không xác định</option>

              <option value="7" <?= (isset($_GET['day'])  && $_GET['day'] == 7) || !isset($_GET['day']) ? 'selected="selected"' : false  ?>>7 ngày tới</option>
              <option value="14" <?= isset($_GET['day']) && $_GET['day'] == 14 ? 'selected="selected"' : false  ?>>14 ngày tới</option>

              <option value="30" <?= isset($_GET['day']) && $_GET['day'] == 30 ? 'selected="selected"' : false  ?>>30 ngày tới</option>
              <option value="60" <?= isset($_GET['day']) && $_GET['day'] == 60 ? 'selected="selected"' : false  ?>>60 ngày tới</option>
              <option value="90" <?= isset($_GET['day']) && $_GET['day'] == 90 ? 'selected="selected"' : false  ?>>90 ngày tới</option>
              <option value="-7" <?= isset($_GET['day']) && $_GET['day'] == -7 ? 'selected="selected"' : false  ?>>7 ngày trước</option>
              <option value="-14" <?= isset($_GET['day']) && $_GET['day'] == -14 ? 'selected="selected"' : false  ?>>14 ngày trước</option>
              <option value="-30" <?= isset($_GET['day']) && $_GET['day'] == -30 ? 'selected="selected"' : false  ?>>30 ngày trước</option>
              <option value="-60" <?= isset($_GET['day']) && $_GET['day'] == -60 ? 'selected="selected"' : false  ?>>60 ngày trước</option>
              <option value="-90" <?= isset($_GET['day']) && $_GET['day'] == -90 ? 'selected="selected"' : false  ?>>90 ngày trước</option>


            </select>
          </div>
        </div>
      </div>

    </form>

  </div>


</div>

<br>


<div class="card card-flush">
  <div class="card-header align-items-center py-5 gap-2 gap-md-5">
    <div class="card-title">
      <div class="d-flex align-items-center position-relative my-1">
        <span class="svg-icon svg-icon-1 position-absolute ms-4">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
          </svg>
        </span>
        <input type="text" data-kt-list-lich-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Tìm kiếm nhanh" />
      </div>
    </div>
    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

      <a href="" data-bs-toggle="modal" data-bs-target="#kt_modal_new_lich" class="btn btn-primary">Thêm mới</a>
    </div>
  </div>
  <div class="card-body pt-0">
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_list_lich_table">
      <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
          <th class="w-10px pe-2">
            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
              <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_list_lich_table .form-check-input" value="1" />
            </div>
          </th>
          <th class="min-w-10px">STT</th>
          <th class="text-end min-w-50px">Học kỳ</th>
          <th class="text-end min-w-100px">Tên lớp</th>
          <th class="text-end min-w-70px">Mã môn</th>
          <th class="text-end min-w-70px">Xem</th>
          <th class="text-end min-w-70px">Ngày học</th>
          <th class="text-end min-w-70px">Ca học</th>
          <th class="text-end min-w-70px">Phòng</th>
          <th class="text-end min-w-70px">Sinh viên</th>
          <th class="text-end min-w-70px">Bắt đầu</th>
          <th class="text-end min-w-70px">Kết thúc</th>
          <th class="text-end min-w-70px">Ghi chú</th>
          <th class="text-end min-w-70px">Actions</th>
        </tr>
      </thead>


      <style>
        [contenteditable]:focus {
          border: none;
          outline: none;
          background: var(--kt-primary-light);
          caret-color: var(--kt-primary);
        }
      </style>
      <tbody class="fw-semibold text-gray-600">

        <?php

        if (!empty($this->model_home->data['lich_day'])) {
          $lich_day = $this->model_home->data['lich_day'];
          $i = 0;
          foreach ($lich_day as $row) {
            extract($row); ?>
            <tr>
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="<?= $id ?>" />
                </div>
              </td>
              <td><?= ++$i ?></td>
              <td class="text-end pe-0"><?= $ten_hocky ?></td>
              <td class="text-end pe-0"><?= $ten_lop ?></td>
              <td class="text-end pe-0"><?= $ma_mon ?></td>
              <td class="text-end pe-0">
                <a href="<?= BASE_URL('bang-diem?lop=' . $ten_lop . '&mon=' . $ma_mon) ?>" target="_blank">Bảng điểm</a>
              </td>
              <td class="text-end pe-0"><?= $ngay_hoc ?></td>
              <td class="text-end pe-0"><?= $ca_hoc ?></td>
              <td class="text-end pe-0"><?= $phong_hoc ?></td>
              <td class="text-end pe-0"><?= $so_sv ?></td>
              <td class="text-end pe-0"><?= $ngay_bat_dau ?></td>
              <td class="text-end pe-0"><?= $ngay_ket_thuc ?></td>
              <td class="text-end pe-0"><?= $ghi_chu ?></td>

              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                  <span class="svg-icon svg-icon-5 m-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                    </svg>
                  </span>
                </a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_lich" onclick="initUpdateDetail('<?= $id ?>')">Edit</a>
                  </div>
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-list-lich-filter="delete_row">Delete</a>
                  </div>
                </div>
              </td>
            </tr>
        <?php }
        } ?>
      </tbody>
    </table>
  </div>
</div>


<div class="modal fade" id="kt_modal_update_lich" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content">
      <div class="modal-header" id="kt_modal_update_header">
        <h2 class="fw-bold">Cập nhật <?= strtolower($this->data['page_title']) ?></h2>
        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-modal-action="close">
          <span class="svg-icon svg-icon-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
              <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
            </svg>
          </span>
        </div>
      </div>
      <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
        <form id="kt_modal_update_lich_form" class="form" action="#">
          <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_header" data-kt-scroll-wrappers="#kt_modal_update_scroll" data-kt-scroll-offset="300px">

            <div class="row g-9 mb-8">
              <div class="col-md-6 fv-row">
                <label class="required fs-6 fw-semibold mb-2">Học kỳ</label>
                <select class="form-select form-select-solid" name="hoc_ky_update" data-control="select2" data-placeholder="Chọn học kỳ" name="hoc_ky">
                  <option value="">Chọn học kỳ</option>

                  <?php
                  if (isset($this->data['hoc_ky']) && !empty($this->data['hoc_ky'])) {
                    $hoc_ky = $this->data['hoc_ky'];

                    foreach ($hoc_ky as $row) {
                      extract($row); ?>
                      <option value="<?= $id_hocky ?>"><?= $ten_hocky ?></option>
                  <?php }
                  } ?>
                </select>
              </div>

              <div class="col-md-6 fv-row">
                <label class="required fs-6 fw-semibold mb-2">Lớp</label>
                <select class="form-select form-select-solid" name="loai_lop_update" data-control="select2" data-placeholder="Chọn lớp" name="hoc_ky">
                  <option value="">Chọn lớp</option>
                  <?php
                  if (isset($this->data['loai_lop']) && !empty($this->data['loai_lop'])) {
                    $loai_lop = $this->data['loai_lop'];
                    foreach ($loai_lop as $row) {
                      extract($row); ?>
                      <option value="<?= $id_loai ?>"><?= $ten_lop ?></option>
                  <?php }
                  } ?>
                </select>
              </div>



              <div class="col-md-6 fv-row">
                <label class="required fs-6 fw-semibold mb-2">Môn học</label>
                <select class="form-select form-select-solid" name="mon_hoc_update" data-control="select2" data-hide-search="true" data-placeholder="Chọn môn học" name="target_assign">
                  <option value="">Chọn môn học</option>

                  <?php
                  if (isset($this->data['mon_hoc']) && !empty($this->data['mon_hoc'])) {
                    $mon_hoc = $this->data['mon_hoc'];
                    foreach ($mon_hoc as $row) {
                      extract($row); ?>
                      <option value="<?= $id_mon ?>"><?= $ma_mon . ' - ' . $ten_mon ?></option>
                  <?php }
                  } ?>
                </select>
                </select>
              </div>
              <div class="col-md-6  col-6 fv-row">
                <label class="fw-semibold fs-6 mb-2">Phòng học</label>
                <input type="text" name="phong_hoc_update" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Phòng học">
              </div>

              <div class="col-md-4  col-6 fv-row">
                <label class="required fw-semibold fs-6 mb-2">Ngày học</label>
                <i class="fas fa-question-circle ms-2 fs-7" data-bs-toggle="tooltip" title="thứ 2,4,6 - 3,5,7"></i>
                <input type="text" name="ngay_hoc_update" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Ngày học">
              </div>

              <div class="col-md-4 col-6 fv-row">
                <label class="required fw-semibold fs-6 mb-2">Ca học</label>
                <input type="text" name="ca_hoc_update" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Ca học">
              </div>


              <div class="col-md-4 col-6 col-6 fv-row">
                <label class=" fw-semibold fs-6 mb-2">Số sinh viên</label>
                <input type="text" name="so_sv_update" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Số sinh viên">
              </div>


              <div class="col-md-6 fv-row">
                <label class=" fs-6 fw-semibold mb-2">Ngày bắt đầu</label>
                <div class="position-relative d-flex align-items-center">
                  <span class="svg-icon svg-icon-2 position-absolute mx-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                      <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                      <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                    </svg>
                  </span>
                  <input class="form-control form-control-solid ps-12" placeholder="Ngày bắt đầu" name="ngay_bat_dau_update" />
                </div>
              </div>

              <div class="col-md-6 fv-row">
                <label class=" fs-6 fw-semibold mb-2">Ngày kết thúc</label>
                <div class="position-relative d-flex align-items-center">
                  <span class="svg-icon svg-icon-2 position-absolute mx-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                      <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                      <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                    </svg>
                  </span>
                  <input class="form-control form-control-solid ps-12" placeholder="Ngày kết thúc" name="ngay_ket_thuc_update" />
                </div>
              </div>

            </div>

            <div class="d-flex flex-column mb-8">
              <label class="fs-6 fw-semibold mb-2">Ghi chú</label>
              <textarea class="form-control form-control-solid" rows="3" name="ghi_chu_update" placeholder="Ghi chú"></textarea>
            </div>

            <div class="d-flex flex-stack mb-8">

              <div class="me-5">
                <label class="fs-6 fw-semibold">Trạng thái giảng dạy</label>
                <div class="fs-7 fw-semibold text-muted">Lịch đang dạy và đã dạy</div>
              </div>

              <label class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="2" checked="checked" name="status_update" />
                <span class="form-check-label fw-semibold text-muted">Đang dạy</span>
              </label>

            </div>



          </div>

          <div class="text-center pt-15">
            <button type="reset" class="btn btn-light me-3" data-kt-modal-action="cancel">Hủy</button>
            <button type="submit" class="btn btn-primary" data-kt-modal-action="submit">
              <span class="indicator-label">Cập nhật</span>
              <span class="indicator-progress">Đang xử lý...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="kt_modal_new_lich" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content rounded">
      <div class="modal-header pb-0 border-0 justify-content-end">
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <span class="svg-icon svg-icon-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
              <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
            </svg>
          </span>
        </div>
      </div>

      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
        <form id="kt_modal_new_lich" class="form" action="#">
          <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_header" data-kt-scroll-wrappers="#kt_modal_update_scroll" data-kt-scroll-offset="300px">

            <div class="row g-9 mb-8">
              <div class="col-md-6 fv-row">
                <label class="required fs-6 fw-semibold mb-2">Học kỳ</label>
                <select class="form-select form-select-solid" name="hoc_ky" data-control="select2" data-hide-search="true" data-placeholder="Chọn học kỳ" name="hoc_ky">
                  <option value=""></option>
                  <?php
                  if (isset($this->data['hoc_ky']) && !empty($this->data['hoc_ky'])) {
                    $hoc_ky = $this->data['hoc_ky'];

                    foreach ($hoc_ky as $row) {
                      extract($row); ?>
                      <option value="<?= $id_hocky ?>"><?= $ten_hocky ?></option>
                  <?php }
                  } ?>
                </select>
              </div>

              <div class="col-md-6 fv-row">
                <label class="required fs-6 fw-semibold mb-2">Lớp</label>
                <select class="form-select form-select-solid" name="loai_lop" data-control="select2" data-hide-search="true" data-placeholder="Chọn lớp" name="hoc_ky">
                  <option value=""></option>
                  <?php
                  if (isset($this->data['loai_lop']) && !empty($this->data['loai_lop'])) {
                    $loai_lop = $this->data['loai_lop'];
                    foreach ($loai_lop as $row) {
                      extract($row); ?>
                      <option value="<?= $id_loai ?>"><?= $ten_lop ?></option>
                  <?php }
                  } ?>
                </select>
              </div>



              <div class="col-md-6 fv-row">
                <label class="required fs-6 fw-semibold mb-2">Môn học</label>
                <select class="form-select form-select-solid" name="mon_hoc" data-control="select2" data-hide-search="true" data-placeholder="Chọn môn học" name="target_assign">
                  <option value=""></option>
                  <?php
                  if (isset($this->data['mon_hoc']) && !empty($this->data['mon_hoc'])) {
                    $mon_hoc = $this->data['mon_hoc'];
                    foreach ($mon_hoc as $row) {
                      extract($row); ?>
                      <option value="<?= $id_mon ?>"><?= $ma_mon . ' - ' . $ten_mon ?></option>
                  <?php }
                  } ?>
                </select>
                </select>
              </div>
              <div class="col-md-6  col-6 fv-row">
                <label class=" fw-semibold fs-6 mb-2">Phòng học</label>
                <input type="text" name="phong_hoc" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Phòng học">
              </div>

              <div class="col-md-4  col-6 fv-row">
                <label class="required fw-semibold fs-6 mb-2">Ngày học</label>


                <i class="fas fa-question-circle ms-2 fs-7" data-bs-toggle="tooltip" title="thứ 2,4,6 - 3,5,7"></i>
                <input type="text" name="ngay_hoc" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Ngày học">
              </div>

              <div class="col-md-4 col-6 fv-row">
                <label class="required fw-semibold fs-6 mb-2">Ca học</label>
                <input type="text" name="ca_hoc" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Ca học">
              </div>


              <div class="col-md-4 col-6 col-6 fv-row">
                <label class=" fw-semibold fs-6 mb-2">Số sinh viên</label>
                <input type="text" name="so_sv" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Số sinh viên">
              </div>


              <div class="col-md-6 fv-row">
                <label class=" fs-6 fw-semibold mb-2">Ngày bắt đầu</label>
                <div class="position-relative d-flex align-items-center">
                  <span class="svg-icon svg-icon-2 position-absolute mx-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                      <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                      <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                    </svg>
                  </span>
                  <input class="form-control form-control-solid ps-12" placeholder="Ngày bắt đầu" name="ngay_bat_dau" />
                </div>
              </div>

              <div class="col-md-6 fv-row">
                <label class=" fs-6 fw-semibold mb-2">Ngày kết thúc</label>
                <div class="position-relative d-flex align-items-center">
                  <span class="svg-icon svg-icon-2 position-absolute mx-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
                      <path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
                      <path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
                    </svg>
                  </span>
                  <input class="form-control form-control-solid ps-12" placeholder="Ngày kết thúc" name="ngay_ket_thuc" />
                </div>
              </div>

            </div>

            <div class="d-flex flex-column mb-8">
              <label class="fs-6 fw-semibold mb-2">Ghi chú</label>
              <textarea class="form-control form-control-solid" rows="3" name="ghi_chu" placeholder="Ghi chú"></textarea>
            </div>

            <div class="d-flex flex-stack mb-8">

              <div class="me-5">
                <label class="fs-6 fw-semibold">Trạng thái giảng dạy</label>
                <div class="fs-7 fw-semibold text-muted">Lịch đang dạy và đã dạy</div>
              </div>

              <label class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="2" checked="checked" name="status" />
                <span class="form-check-label fw-semibold text-muted">Đang dạy</span>
              </label>

            </div>
          </div>
          <div class="text-center">
            <button type="reset" id="kt_modal_new_lich_cancle" class="btn btn-light me-3">Cancel</button>
            <button type="submit" id="kt_modal_new_lich_submit" class="btn btn-primary">
              <span class="indicator-label">Submit</span>
              <span class="indicator-progress">Đang xử lý...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>