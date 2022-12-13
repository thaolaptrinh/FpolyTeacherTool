"use strict";
const element = document.getElementById("kt_modal_update_lich");
const form = element.querySelector("#kt_modal_update_lich_form");
const modal = new bootstrap.Modal(element);
var formData_update = new FormData();
var formData_check = new FormData();

formData_update.append(
  "status_update",
  form.querySelector(`[name="status_update"]`).value
);

var initUpdateDetail = (id) => {
  formData_check.append("id", id);
  formData_update.append("id", id);
  formData_check.append("is_detail", true);
  axios
    .post(window.location.href, formData_check)
    .then((response) => {
      let data = response.data.data;

      form
        .querySelectorAll('[name="hoc_ky_update"] > option')
        .forEach(function (e) {
          if (data.id_hocky == e.value) {
            e.setAttribute("selected", "selected");
          } else {
            e.removeAttribute("selected");
          }
        });

      form
        .querySelectorAll('[name="mon_hoc_update"] > option')
        .forEach(function (e) {
          if (data.id_mon == e.value) {
            e.setAttribute("selected", "selected");
          } else {
            e.removeAttribute("selected");
          }
        });

      form
        .querySelectorAll('[name="loai_lop_update"] > option')
        .forEach(function (e) {
          if (data.id_lop == e.value) {
            e.setAttribute("selected", "selected");
          } else {
            e.removeAttribute("selected");
          }
        });

      form.querySelector('[name="hoc_ky_update"]').value = data.id_hocky;
      form.querySelector('[name="loai_lop_update"]').value = data.id_lop;
      form.querySelector('[name="mon_hoc_update"]').value = data.id_mon;
      form.querySelector('[name="phong_hoc_update"]').value = data.phong_hoc;
      form.querySelector('[name="ngay_hoc_update"]').value = data.ngay_hoc;
      form.querySelector('[name="ca_hoc_update"]').value = data.ca_hoc;
      form.querySelector('[name="so_sv_update"]').value = data.so_sv;
      form.querySelector('[name="ngay_bat_dau_update"]').value =
        data.ngay_bat_dau;
      form.querySelector('[name="ngay_ket_thuc_update"]').value =
        data.ngay_ket_thuc;
      form.querySelector('[name="ghi_chu_update"]').value = data.ghi_chu;
      form.querySelector('[name="status_update"]').value = data.status;
    })
    .catch((error) => {
      console.log(error);
    });
};

var initForm_update = function () {
  var ngayBatDau_update = $(form.querySelector('[name="ngay_bat_dau_update"]'));
  ngayBatDau_update.flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d",
  });

  var ngayKetThuc_update = $(
    form.querySelector('[name="ngay_ket_thuc_update"]')
  );
  ngayKetThuc_update.flatpickr({
    enableTime: true,
    minDate: ngayBatDau_update,
    dateFormat: "Y-m-d",
  });
};

// Class definition
var KTUpdateLich = (function () {
  // Shared variables

  // Init Update schedule modal

  var initUpdateLich = () => {
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    var validator = FormValidation.formValidation(form, {
      fields: {
        ca_hoc_update: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống.",
            },
          },
        },
        ngay_hoc_update: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống.",
            },
          },
        },

        hoc_ky_update: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống.",
            },
          },
        },
        loai_lop_update: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống.",
            },
          },
        },
        mon_hoc_update: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống.",
            },
          },
        },
      },
      plugins: {
        // startEndDate: new FormValidation.plugins.StartEndDate({
        //   format: "DD-MM-YYYY",
        //   startDate: {
        //     field: "ngay_bat_dau",
        //     message: "Ngày bắt đầu phải sớm hơn ngày kết thúc",
        //   },
        //   endDate: {
        //     field: "ngay_ket_thuc",
        //     message: "Ngày kết thúc phải lớn hơn ngày bắt đầu",
        //   },
        // }),
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: ".fv-row",
          eleInvalidClass: "",
          eleValidClass: "",
        }),
      },
    });

    form
      .querySelector(`[name="status_update"]`)
      .addEventListener("change", function () {
        if (this.checked) {
          formData_update.set("status_update", 2);
        } else {
          formData_update.set("status_update", 1);
        }
      });

    // Submit button handler
    const submitButton = element.querySelector(
      '[data-kt-modal-action="submit"]'
    );

    submitButton.addEventListener("click", (e) => {
      e.preventDefault();

      var formData_text = [
        "hoc_ky_update",
        "mon_hoc_update",
        "loai_lop_update",
        "ngay_hoc_update",
        "phong_hoc_update",
        "ca_hoc_update",
        "so_sv_update",
        "ngay_bat_dau_update",
        "ngay_ket_thuc_update",
        "ghi_chu_update",
      ];

      formData_text.forEach((element) => {
        formData_update.append(
          element,
          form.querySelector(`[name="${element}"]`).value
        );
      });

      formData_update.append("is_update", true);

      // Validate form before submit
      if (validator) {
        validator.validate().then(function (status) {
          if (status == "Valid") {
            // Show loading indication
            submitButton.setAttribute("data-kt-indicator", "on");

            // Disable button to avoid multiple click
            submitButton.disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            setTimeout(function () {
              // Remove loading indication
              submitButton.removeAttribute("data-kt-indicator");

              // Enable button
              submitButton.disabled = false;

              axios
                .post(window.location.href, formData_update)
                .then((response) => {
                  console.log(response);
                  Swal.fire({
                    text: response.data.message,
                    icon: response.data.status ? "success" : "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                      confirmButton: "btn btn-primary",
                    },
                  }).then(function (result) {
                    if (result.isConfirmed && response.data.status) {
                      modal.hide();
                      window.location.reload();
                    }
                  });
                })
                .catch((error) => {
                  console.log(error);
                });
            }, 2000);
          } else {
            Swal.fire({
              text: "Xin lỗi, vui lòng thử lại.",
              icon: "error",
              buttonsStyling: false,
              confirmButtonText: "OK",
              customClass: {
                confirmButton: "btn btn-primary",
              },
            });
          }
        });
      }
    });

    // Cancel button handler
    const cancelButton = element.querySelector(
      '[data-kt-modal-action="cancel"]'
    );
    cancelButton.addEventListener("click", (e) => {
      e.preventDefault();
      modal.hide();
    });

    // Close button handler
    const closeButton = element.querySelector('[data-kt-modal-action="close"]');

    closeButton.addEventListener("click", (e) => {
      e.preventDefault();
      modal.hide();
    });
  };

  return {
    // Public functions
    init: function () {
      initForm_update();
      initUpdateLich();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTUpdateLich.init();
});
