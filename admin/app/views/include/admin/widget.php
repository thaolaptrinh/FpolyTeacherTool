<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
  <span class="svg-icon">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
      <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
    </svg>
  </span>
</div>


<button id="kt_app_layout_builder_toggle" class="btn btn-dark app-layout-builder-toggle lh-1 py-4" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-dismiss="click" data-bs-trigger="hover" data-bs-original-title="Keen Builder" data-kt-initialized="1">
  <i class="fonticon-equalizer fs-4 me-1">
  </i>Tùy chỉnh
</button>

<div id="kt_app_layout_builder" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="app-settings" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '380px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_layout_builder_toggle" data-kt-drawer-close="#kt_app_layout_builder_close">
  <div class="card border-0 shadow-none rounded-0 w-100">
    <div class="card-header bgi-position-y-bottom bgi-position-x-end bgi-size-cover bgi-no-repeat rounded-0 border-0 py-4" id="kt_app_layout_builder_header" style="
        background-image: url('<?= BASE_URL('assets/media/misc/layout/header-bg.jp') ?>g');
      ">
      <h3 class="card-title fs-3 fw-bold text-white flex-column m-0">
        Website Builder
        <small class="text-white opacity-50 fs-7 fw-semibold pt-1">
          Tùy chỉnh các thành phần trong website
        </small>
      </h3>
      <div class="card-toolbar">
        <button type="button" class="btn btn-sm btn-icon bg-white bg-opacity-25 btn-color-white p-0 w-20px h-20px rounded-1" id="kt_app_layout_builder_close">
          <span class="svg-icon svg-icon-3">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
              <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
            </svg>
          </span>
        </button>
      </div>
    </div>
    <div class="card-body position-relative" id="kt_app_layout_builder_body">
      <div id="kt_app_settings_content" class="position-relative scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_app_layout_builder_body" data-kt-scroll-dependencies="#kt_app_layout_builder_header, #kt_app_layout_builder_footer" data-kt-scroll-offset="5px">
        <form class="form" method="POST" id="kt_app_layout_builder_form" action="/keen/demo9/index.php">
          <input type="hidden" id="kt_app_layout_builder_action" name="layout-builder[action]" />
          <div class="card-body p-0">
            <div class="form-group">
              <div class="mb-6">
                <h4 class="fw-bold text-dark">Theme Mode</h4>
                <div class="fw-semibold text-muted fs-7 d-block lh-1">
                  Enjoy Dark & Light modes.
                </div>
              </div>
              <div class="row" data-kt-buttons="true" data-kt-buttons-target=".form-check-image,.form-check-input">
                <div class="col-6">
                  <label class="form-check-image form-check-success">
                    <div class="form-check-wrapper">
                      <img src="<?= BASE_URL('assets/media/misc/layout/light.png') ?>" class="mw-100" alt="" />
                    </div>
                    <div class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                      <input class="form-check-input" type="radio" value="light" name="theme_mode" id="kt_layout_builder_theme_mode_light" />
                      <div class="form-check-label text-gray-700">Light</div>
                    </div>
                  </label>
                </div>
                <div class="col-6">
                  <label class="form-check-image form-check-success">
                    <div class="form-check-wrapper">
                      <img src="<?= BASE_URL('assets/media/misc/layout/dark.png') ?>" class="mw-100" alt="" />
                    </div>
                    <div class="form-check form-check-custom form-check-solid form-check-sm form-check-success">
                      <input class="form-check-input" type="radio" value="dark" name="theme_mode" id="kt_layout_builder_theme_mode_dark" />
                      <div class="form-check-label text-gray-700">Dark</div>
                    </div>
                  </label>
                </div>
              </div>
            </div>

            <div class="separator separator-dashed my-5"></div>

            <div class="form-group d-flex flex-stack">
              <!--begin::Heading-->
              <div class="d-flex flex-column">
                <h4 class="fw-bold text-dark">RTL Mode</h4>
                <div class="fs-7 fw-semibold text-muted">
                  Change Language Direction.
                  <a class="" href="https://preview.keenthemes.com/html/keen/docs/getting-started/rtl" target="_blank">See docs</a>
                </div>
              </div>
              <!--end::Heading-->
              <!--begin::Option-->
              <div class="d-flex justify-content-end">
                <!--begin::Check-->
                <div class="form-check form-check-solid form-check-custom form-check-success form-switch">
                  <input type="hidden" value="false" name="layout-builder[layout][app][general][rtl]" />
                  <input class="form-check-input w-45px h-30px" type="checkbox" value="true" name="layout-builder[layout][app][general][rtl]" id="kt_builder_rtl" />
                  <!--begin::Label-->
                  <label class="form-check-label" for="kt_builder_rtl"></label>
                  <!--end::Label-->
                </div>
                <!--end::Check-->
              </div>
              <!--end::Option-->
            </div>

            <div class="separator separator-dashed my-5"></div>

            <div class="form-group">
              <!--begin::Heading-->
              <div class="d-flex flex-column mb-4">
                <h4 class="fw-bold text-dark">Width Mode</h4>
                <div class="fs-7 fw-semibold text-muted">
                  Page width options
                </div>
              </div>
              <!--end::Heading-->
              <!--begin::Options-->
              <div class="d-flex">
                <!--begin::Check-->
                <div class="form-check form-check-custom form-check-success form-check-solid form-check-sm me-5">
                  <input class="form-check-input" type="radio" checked="checked" value="default" id="kt_builder_page_width_default" name="layout-builder[layout][app][general][page-width]" />
                  <!--begin::Label-->
                  <label class="form-check-label text-gray-700 fw-bold text-nowrap" for="kt_builder_page_width_default">Default</label>
                  <!--end::Label-->
                </div>
                <!--end::Check-->
                <!--begin::Check-->
                <div class="form-check form-check-custom form-check-success form-check-solid form-check-sm me-5">
                  <input class="form-check-input" type="radio" value="fluid" id="kt_builder_page_width_fluid" name="layout-builder[layout][app][general][page-width]" />
                  <!--begin::Label-->
                  <label class="form-check-label text-gray-700 fw-bold text-nowrap" for="kt_builder_page_width_fluid">Fluid</label>
                  <!--end::Label-->
                </div>
                <!--end::Check-->
                <!--begin::Check-->
                <div class="form-check form-check-custom form-check-success form-check-solid form-check-sm me-5">
                  <input class="form-check-input" type="radio" value="fixed" id="kt_builder_page_width_fixed" name="layout-builder[layout][app][general][page-width]" />
                  <!--begin::Label-->
                  <label class="form-check-label text-gray-700 fw-bold text-nowrap" for="kt_builder_page_width_fixed">Fixed</label>
                  <!--end::Label-->
                </div>
                <!--end::Check-->
              </div>
              <!--end::Options-->
            </div>

            <div class="separator separator-dashed my-5"></div>

            <div class="form-group">
              <!--begin::Heading-->
              <div class="d-flex flex-column mb-4">
                <h4 class="fw-bold text-dark">Menu Icon</h4>
                <div class="fs-7 fw-semibold text-muted">
                  Sidebar menu icon options
                </div>
              </div>
              <!--end::Heading-->
              <!--begin::Options-->
              <div class="d-flex">
                <!--begin::Check-->
                <div class="form-check form-check-custom form-check-success form-check-solid form-check-sm me-5">
                  <input class="form-check-input" type="radio" checked="checked" value="svg" id="kt_builder_icon_svg" name="layout-builder[layout][app][menu][icon]" />
                  <!--begin::Label-->
                  <label class="form-check-label text-gray-700 fw-bold text-nowrap" for="kt_builder_icon_svg">SVG Duotone</label>
                  <!--end::Label-->
                </div>
                <!--end::Check-->
                <!--begin::Check-->
                <div class="form-check form-check-custom form-check-success form-check-solid form-check-sm me-5">
                  <input class="form-check-input" type="radio" value="font" id="kt_builder_icon_font" name="layout-builder[layout][app][menu][icon]" />
                  <!--begin::Label-->
                  <label class="form-check-label text-gray-700 fw-bold text-nowrap" for="kt_builder_icon_font">Font Icons</label>
                  <!--end::Label-->
                </div>
                <!--end::Check-->
              </div>
              <!--end::Options-->
            </div>

            <div class="separator separator-dashed my-5"></div>

            <div class="form-group d-flex flex-stack my-5">

              <div class="d-flex flex-column">
                <h4 class="fw-bold text-dark">Sidebar</h4>
                <div class="fs-7 fw-semibold text-muted">Display sidebar</div>
              </div>

              <div class="d-flex justify-content-end">

                <div class="form-check form-check-solid form-check-custom form-check-success form-switch">
                  <input type="hidden" value="false" name="layout-builder[layout][app][sidebar][display]" />
                  <input class="form-check-input w-45px h-30px" type="checkbox" value="true" name="layout-builder[layout][app][sidebar][display]" id="kt_builder_sidebar" />
                  <!--begin::Label-->
                  <label class="form-check-label" for="kt_builder_sidebar"></label>
                  <!--end::Label-->
                </div>
                <!--end::Check-->
              </div>
              <!--end::Option-->
            </div>

            <div class="separator separator-dashed my-5"></div>

            <div class="form-group d-flex flex-stack">
              <!--begin::Heading-->
              <div class="d-flex flex-column">
                <h4 class="fw-bold text-dark">Sticky Header</h4>
                <div class="fs-7 fw-semibold text-muted">
                  Enable sticky header
                  <a href="/keen/demo9/../demo9/layout-builder.html" class="fw-semibold text-primary">More layout options</a>
                </div>
              </div>
              <!--end::Heading-->
              <!--begin::Option-->
              <div class="d-flex justify-content-end">
                <!--begin::Check-->
                <div class="form-check form-check-solid form-check-custom form-check-success form-switch">
                  <input type="hidden" value="false" name="layout-builder[layout][app][header][primary][sticky][enabled]" />
                  <input class="form-check-input w-45px h-30px" type="checkbox" checked="checked" value="true" name="layout-builder[layout][app][header][primary][sticky][enabled]" id="kt_builder_header_primary_sticky" />
                  <!--begin::Label-->
                  <label class="form-check-label" for="kt_builder_header_primary_sticky"></label>
                  <!--end::Label-->
                </div>
                <!--end::Check-->
              </div>
              <!--end::Option-->
            </div>
            <!--end::Form group-->
          </div>
          <!--end::Card body-->
        </form>
        <!--end::Form-->
      </div>
      <!--end::Content-->
    </div>

    <!-- <div class="card-footer border-0 d-flex gap-3 pb-9 pt-0" id="kt_app_layout_builder_footer">
      <button type="button" id="kt_app_layout_builder_preview" class="btn btn-primary flex-grow-1 fw-semibold">
      
        <span class="indicator-label">Preview</span>
     
        <span class="indicator-progress">Please wait...
          <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>

      </button>
      <button type="button" id="kt_app_layout_builder_reset" class="btn btn-light flex-grow-1 fw-semibold">
      
        <span class="indicator-label">Reset</span>
       
        <span class="indicator-progress">Please wait...
          <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
      </button>
    </div> -->
  </div>

</div>