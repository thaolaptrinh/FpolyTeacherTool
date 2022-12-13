"use strict";

// Class definition
var KTModalNewLich = (function () {
  var submitButton;
  var cancelButton;
  var validator;
  var form;
  var modal;
  var modalEl;
  var formData = new FormData();

  // Init form inputs
  var initForm = function () {
    var ngayBatDau = $(form.querySelector('[name="ngay_bat_dau"]'));
    ngayBatDau.flatpickr({
      enableTime: true,
      dateFormat: "d-m-Y",
    });

    var ngayKetThuc = $(form.querySelector('[name="ngay_ket_thuc"]'));
    ngayKetThuc.flatpickr({
      enableTime: true,
      minDate: ngayBatDau,
      dateFormat: "d-m-Y",
    });
  };

  // Handle form validation and submittion
  var handleForm = function () {
    validator = FormValidation.formValidation(form, {
      fields: {
        ca_hoc: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống.",
            },
          },
        },
        ngay_hoc: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống.",
            },
          },
        },

        hoc_ky: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống.",
            },
          },
        },
        loai_lop: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống.",
            },
          },
        },
        mon_hoc: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống.",
            },
          },
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: ".fv-row",
          eleInvalidClass: "",
          eleValidClass: "",
        }),
      },
    });

    formData.append("status", form.querySelector(`[name="status"]`).value);

    form
      .querySelector(`[name="status"]`)
      .addEventListener("change", function () {
        if (this.checked) {
          formData.append("status", this.value);
        } else {
          formData.append("status", 1);
        }
      });

    // Action buttons
    submitButton.addEventListener("click", function (e) {
      e.preventDefault();

      var formData_text = [
        "hoc_ky",
        "mon_hoc",
        "loai_lop",
        "ngay_hoc",
        "phong_hoc",
        "ca_hoc",
        "so_sv",
        "ngay_bat_dau",
        "ngay_ket_thuc",
        "ghi_chu",
      ];

      formData_text.forEach((element) => {
        formData.append(
          element,
          form.querySelector(`[name="${element}"]`).value
        );
      });

      formData.append("is_add", true);

      // Validate form before submit
      if (validator) {
        validator.validate().then(function (status) {
          if (status == "Valid") {
            submitButton.setAttribute("data-kt-indicator", "on");

            submitButton.disabled = true;

            setTimeout(function () {
              submitButton.removeAttribute("data-kt-indicator");

              // Enable button
              submitButton.disabled = false;

              axios
                .post(`${base_url + "lich-day"}`, formData)
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

    cancelButton.addEventListener("click", function (e) {
      e.preventDefault();
      modal.hide(); // Hide modal
    });
  };

  return {
    // Public functions
    init: function () {
      // Elements
      modalEl = document.querySelector("#kt_modal_new_lich");

      if (!modalEl) {
        return;
      }

      modal = new bootstrap.Modal(modalEl);

      form = document.querySelector("#kt_modal_new_lich");
      submitButton = document.getElementById("kt_modal_new_lich_submit");
      cancelButton = document.getElementById("kt_modal_new_lich_cancle");

      initForm();
      handleForm();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTModalNewLich.init();
});
