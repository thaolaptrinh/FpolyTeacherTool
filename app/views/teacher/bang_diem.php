<div class="card">
  <div class="card-body py-4">
    <form method="get" action="">
      <div class="row mb-10">
        <div class="col-lg-6">
          <label class="required fs-6 fw-semibold form-label mb-2 badge badge-light-success">Lựa chọn lớp học để hiện thị chi tiết lịch học</label>
          <div class="row fv-row">
            <select name="lop" id="lop" onchange="this.form.submit();" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Lớp học">
              <option></option>
              <?php
              if (isset($this->model_home->data['lop_hoc']) && !empty($this->model_home->data['lop_hoc'])) {
                $lop_hoc = $this->model_home->data['lop_hoc'];
                foreach ($lop_hoc as $row) { ?>
                  <option value="<?= $row['ten_lop'] ?>" <?= (isset($_GET['lop'])  && $_GET['lop'] == $row['ten_lop'])  ? 'selected="selected"' : false  ?>><?= $row['ten_lop'] ?></option>
                <?php }
              } else { ?>
                <option value="">Không có dữ liệu</option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-lg-6">
          <label class="required fs-6 fw-semibold form-label mb-2 badge badge-light-success">Lựa chọn môn học để hiện thị chi tiết lịch học</label>
          <div class="row fv-row">
            <select name="mon" id="mon" onchange="this.form.submit();" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Môn học">
              <option></option>
              <?php
              if (isset($this->model_home->data['mon_hoc']) && !empty($this->model_home->data['mon_hoc'])) {
                $mon_hoc = $this->model_home->data['mon_hoc'];
                foreach ($mon_hoc as $row) { ?>
                  <option value="<?= $row['ma_mon'] ?>" <?= (isset($_GET['mon'])  && $_GET['mon'] == $row['ma_mon'])  ? 'selected="selected"' : false  ?>><?= $row['ma_mon'] ?></option>
                <?php }
              } else { ?>
                <option value="">Không có dữ liệu</option>
              <?php } ?>
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
        <input type="text" data-kt-list-diem-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Tìm kiếm nhanh" />
      </div>
    </div>
    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
      <!-- <div class="w-100 mw-150px">
        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Loại sinh viên" data-kt-list-diem-filter="status">
          <option></option>
          <option value="all">All</option>
          <option value="gioi">Giỏi</option>
          <option value="yeu">Yếu</option>
        </select>
      </div> -->
      <a href="" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" class="btn btn-primary">Thêm mới</a>
    </div>
  </div>
  <div class="card-body pt-0">
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_list_diem_table">
      <thead>


        <?php if (!empty($this->model_home->data['diem_cua_mon'])) {
          $mon_hoc = $this->model_home->data['diem_cua_mon'];
        ?>
          <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
              <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_list_diem_table .form-check-input" value="1" />
              </div>
            </th>
            <th class="min-w-10px">STT</th>
            <th class="text-end min-w-50px">MSSV</th>
            <th class="text-end min-w-100px">Họ tên</th>
            <?php
            if (!empty($mon_hoc['diem'])) {
              $diem1 = $mon_hoc['diem'];
              $array_diem1 = explode(',', $diem1);
              foreach ($array_diem1 as $key) { ?>
                <th class="text-end min-w-20px">
                  <?= $key ?>
                  <!-- <i class="fas fa-question-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Click vào ô điểm bất kỳ để chỉnh sửa"></i> -->
                </th>
            <?php }
            } ?>

            <th class="text-end min-w-70px contenteditable">Nhận xét</th>
            <th class="text-end min-w-70px hide-export">Phân loại</th>
            <th class="text-end min-w-70px hide-export">Actions</th>
          </tr>
        <?php  } ?>
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

        if (!empty($this->model_home->data['bang_diem'])) {
          $bang_diem = $this->model_home->data['bang_diem'];
          $i = 0;
          foreach ($bang_diem as $row) {
            extract($row); ?>
            <tr>
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="<?= $id ?>" />
                </div>
              </td>
              <td><?= ++$i ?></td>
              <td class="text-end pe-0"><?= $mssv ?></td>
              <td class="text-end pe-0"><?= $ho_ten ?></td>
              <?php
              if (!empty($array_diem)) {
                $diem = json_decode($array_diem, true);
                foreach ($diem as $key => $value) { ?>
                  <td contenteditable class="text-end pe-0  diem fw-bold" data-target="<?= $key ?>" data-id="<?= $id ?>">
                    <?= $value ?>
                  </td>
              <?php }
              } ?>

              <td contenteditable class="nhan_xet text-end pe-0" data-id="<?= $id ?>"><?= $nhan_xet ?></td>
              <td class="text-end pe-0" data-order="<?= $phan_loai ?>">
                <select name="phan_loai" data-id="<?= $id ?>" class="form-select form-select-solid" data-control="select2" data-hide-search="true">
                  <option value="null" <?= $phan_loai  == null ? 'selected' : false ?>>Null</option>
                  <option value="gioi" <?= $phan_loai  == 'gioi' ? 'selected' : false ?>>Giỏi</option>
                  <option value="yeu" <?= $phan_loai  == 'yeu' ? 'selected' : false ?>>Yếu</option>
                </select>
              </td>
              <td class="text-end">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                  <span class="svg-icon svg-icon-5 m-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                    </svg>
                  </span>
                </a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <!-- <div class="menu-item px-3">
                    <a href="" class="menu-link px-3">Edit</a>
                  </div> -->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-list-diem-filter="delete_row">Delete</a>
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



<style>
  #kt_list_diem_table_filter {
    display: none;
  }
</style>