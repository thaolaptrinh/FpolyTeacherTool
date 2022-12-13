<div class="card">
  <div class="card-header border-0 pt-6">
    <div class="card-title">
      <!--begin::Search-->
      <div class="d-flex align-items-center position-relative my-1">
        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
        <span class="svg-icon svg-icon-1 position-absolute ms-6">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
          </svg>
        </span>
        <!--end::Svg Icon-->
        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
      </div>
      <!--end::Search-->
    </div>

    <div class="card-toolbar">
      <!--begin::Toolbar-->

      <div class="w-200px mw-200px me-3">
        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Chọn trạng thái" data-kt-list-diem-filter="status">
          <option value="">Chọn trạng thái</option>
          <option value="all">Tất cả</option>
          <option value="Kích hoạt">Kích hoạt</option>
          <option value="Vô hiệu hóa">Vô hiệu hóa</option>
        </select>
      </div>


      <div class="w-250px mw-400px me-3">
        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Chọn cơ sở" data-kt-list-diem-filter="co_so">
          <option value="">Chọn cơ sở</option>
          <option value="all">Tất cả</option>
          <?php
          if (isset($this->data['co_so']) && !empty($this->data['co_so'])) {
            $co_so = ($this->data['co_so']);
            foreach ($co_so as $item) {
              extract($item); ?>
              <option value="<?= $ten_coso ?>"><?= $ten_coso ?></option>

          <?php }
          } ?>
        </select>
      </div>

      <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
        <div class="fw-bold me-5">
          <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
        </div>
        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
      </div>


    </div>
  </div>
  <div class="card-body py-4">
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
      <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
          <th class="w-10px pe-2">
            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
              <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
            </div>
          </th>
          <th class="min-w-125px">Email</th>
          <th class="min-w-125px">Role</th>
          <th class="min-w-125px">Cơ sở</th>
          <th class="min-w-125px">Trạng thái</th>
          <th class="text-end min-w-100px">Actions</th>
        </tr>
      </thead>
      <tbody class="text-gray-600 fw-semibold">
        <?php if (isset($this->model_home->data['teachers']) && !empty($this->model_home->data['teachers'])) {

          $teachers = $this->model_home->data['teachers'];

          foreach ($teachers as $item) {
            extract($item); ?>

            <tr>
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="<?= $id_teacher ?>" />
                </div>
              </td>
              <td class="d-flex align-items-center">


                <div class="d-flex flex-column">
                  <span><?= $email ?></span>
                </div>
              </td>
              <td>Người dùng</td>
              <td>
                <?= $ten_coso ?>
              </td>


              <td>
                <div class="badge badge-light-<?= $status == 2 ? 'success' : 'warning' ?> fw-bold">
                  <?= $status == 2 ? 'Kích hoạt' : 'Vô hiệu hóa' ?>
                </div>
              </td>

              <td class="text-end">
                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                  <span class="svg-icon svg-icon-5 m-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                    </svg>
                  </span>
                </a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-users-table-filter="active">
                      <?= $status != 2 ? 'Kích hoạt' : 'Vô hiệu hóa' ?>
                    </a>
                  </div>
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                  </div>
                </div>
              </td>
            </tr>

        <?php  }
        } ?>


      </tbody>
    </table>
  </div>
</div>