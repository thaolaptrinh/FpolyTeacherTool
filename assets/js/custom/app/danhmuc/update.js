"use strict";
const element = document.getElementById("kt_modal_update");
const form = element.querySelector("#kt_modal_update_form");
const modal = new bootstrap.Modal(element);
var formData_update = new FormData();
var formData_check = new FormData();

var initUpdateDetail = (id) => {
  formData_check.append("id", id);
  formData_update.append("id", id);
  formData_check.append("is_detail", true);
  axios
    .post(window.location.href, formData_check)
    .then((response) => {
      const data = [];
      var opts = [];
      for (let key in response.data.data) {
        // khoa select
        // if (form.querySelector(`select[name="${key}_update"]`)) {
        //   opts = form.querySelectorAll(`select[name="${key}_update"]>option`);
        //   form
        //     .querySelector(`select[name="${key}_update"]`)
        //     .setAttribute("data-placeholder", "22");
        //   opts.forEach((element) => {
        //     if (element.value == response.data.data[key]) {
        //       console.log(element);
        //     }
        //   });
        // }

        if (form.querySelector(`[name="${key}_update"]`)) {
          form.querySelector(`[name="${key}_update"]`).value =
            response.data.data[key];
        }
      }
    })
    .catch((error) => {
      console.log(error);
    });
};

// Class definition
var KTUpdate = (function () {
  // Shared variables

  // Init Update schedule modal

  var initUpdate = (fields, formData_text) => {
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    var validator = FormValidation.formValidation(form, {
      fields: fields,

      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: ".fv-row",
          eleInvalidClass: "",
          eleValidClass: "",
        }),
      },
    });

    // Submit button handler
    const submitButton = element.querySelector(
      '[data-kt-modal-action="submit"]'
    );
    submitButton.addEventListener("click", (e) => {
      e.preventDefault();

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
                  Swal.fire({
                    text: response.data.message,
                    icon: response.data.status ? "success" : "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                      confirmButton: "btn btn-primary",
                    },
                    allowOutsideClick: !response.data.status,
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
      var fields = [],
        formData = [];

      switch (page_target) {
        case "loai-diem": {
          fields = {
            ten_diem_update: {
              validators: {
                notEmpty: {
                  message: "Tên điểm không được để trống",
                },
              },
            },
          };
          formData = ["ten_diem_update"];
          break;
        }
        case "loai-lop": {
          fields = {
            khoa: {
              validators: {
                notEmpty: {
                  message: "Khóa học không được để trống",
                },
              },
            },
            ten_lop: {
              validators: {
                notEmpty: {
                  message: "Tên lớp không được để trống",
                },
              },
            },
          };

          formData = ["ten_lop_update", "id_khoa_update", "mo_ta_update"];

          break;
        }

        case "khoa-hoc": {
          fields = {
            ten_khoa_update: {
              validators: {
                notEmpty: {
                  message: "Tên khóa không được để trống",
                },
              },
            },
          };

          formData = ["ten_khoa_update"];
          break;
        }
        case "hoc-ky": {
          fields = {
            ten_hocky_update: {
              validators: {
                notEmpty: {
                  message: "Tên học kỳ không được để trống",
                },
              },
            },
          };

          formData = ["ten_hocky_update"];
          break;
        }

        case "mon-hoc": {
          fields = {
            ma_mon_update: {
              validators: {
                notEmpty: {
                  message: "Mã môn không được để trống",
                },
              },
            },
            ten_mon_update: {
              validators: {
                notEmpty: {
                  message: "Tên môn không được để trống",
                },
              },
            },
          };

          formData = ["ma_mon_update", "ten_mon_update", "ghi_chu_update"];
          break;
        }

        default: {
          return;
        }
      }

      initUpdate(fields, formData);
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTUpdate.init();
});
