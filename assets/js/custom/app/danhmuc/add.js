"use strict";

// Class definition
var KTLAdd = (function () {
  // Shared variables

  let seq = 0,
    $ch = $('input[name="diem"]').on("click", function () {
      $(this).data("seq", seq++);
    });

  var initAdd = (element_text, form_text, fields, formData_text) => {
    const element = document.getElementById(element_text);
    if (!element) {
      return;
    }

    const form = element.querySelector(form_text);
    const modal = new bootstrap.Modal(element);
    var formData = new FormData();

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

    const submitButton = element.querySelector(
      '[data-kt-modal-action="submit"]'
    );

    if (page_target == "mon-hoc") {
      $('input[name="all"]').change(function (e) {
        e.preventDefault();
        if (this.checked) {
          $('input[name="diem"]').each(function (index, element) {
            $(this).removeAttr("checked");
          });
          $('input[name="diem"]').each(function (index, element) {
            $(this).attr("checked", "checked");
          });
        } else {
          $('input[name="diem"]').each(function (index, element) {
            $(this).removeAttr("checked");
          });
        }
      });

      $('input[name="4_lab_dau"]').change(function (e) {
        e.preventDefault();
        if (this.checked) {
          for (let index = 1; index <= 4; index++) {
            $(`input[value="Lab${index}"]`).attr("checked", "checked");
          }
        } else {
          for (let index = 1; index <= 4; index++) {
            $(`input[value="LAB${index}"]`).removeAttr("checked");
          }
        }
      });

      $('input[name="asm"]').change(function (e) {
        e.preventDefault();
        if (this.checked) {
          for (let index = 1; index <= 4; index++) {
            $(`input[value="GĐ${index}"]`).attr("checked", "checked");
            $(`input[value="GD${index}"]`).attr("checked", "checked");
          }
        } else {
          for (let index = 1; index <= 4; index++) {
            $(`input[value="GĐ${index}"]`).removeAttr("checked");
            $(`input[value="GD${index}"]`).removeAttr("checked");
          }
        }
      });

      $('input[name="8_quiz"]').change(function (e) {
        e.preventDefault();
        if (this.checked) {
          for (let index = 1; index <= 8; index++) {
            $(`input[value="QUIZ ${index}"]`).attr("checked", "checked");
            $(`input[value="QUIZ${index}"]`).attr("checked", "checked");
            $(`input[value="Q ${index}"]`).attr("checked", "checked");
            $(`input[value="Q${index}"]`).attr("checked", "checked");
          }
        } else {
          for (let index = 1; index <= 8; index++) {
            $(`input[value="QUIZ${index}"]`).removeAttr("checked");
            $(`input[value="QUIZ ${index}"]`).removeAttr("checked");
            $(`input[value="Q ${index}"]`).removeAttr("checked");
            $(`input[value="Q${index}"]`).removeAttr("checked");
          }
        }
      });
    }

    submitButton.addEventListener("click", (e) => {
      e.preventDefault();

      formData_text.forEach((element) => {
        formData.append(
          element,
          form.querySelector(`[name="${element}"]`).value
        );
      });

      // chọn từng loại điểm
      if (page_target == "mon-hoc") {
        var diem = Array.prototype.sort
          .call($ch.filter(":checked"), function (a, b) {
            return $(a).data("seq") - $(b).data("seq");
          })
          .map(function (i, el) {
            return el.value;
          })
          .get()
          .join(",");
        formData.append("diem", diem);
      }

      formData.append("is_add", true);

      if (validator) {
        validator.validate().then(function (status) {
          if (status == "Valid") {
            submitButton.setAttribute("data-kt-indicator", "on");

            submitButton.disabled = true;

            setTimeout(function () {
              submitButton.removeAttribute("data-kt-indicator");

              submitButton.disabled = false;

              axios
                .post(window.location.href, formData)
                .then((response) => {
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
              confirmButtonText: "OK!",
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
      // loại điểm
      var element = "kt_modal_add";
      var form = "#kt_modal_add_form";
      var fields = [],
        formData = [];

      switch (page_target) {
        case "loai-diem": {
          fields = {
            ten_diem: {
              validators: {
                notEmpty: {
                  message: "Tên điểm không được để trống",
                },
              },
            },
          };
          formData = ["ten_diem"];
          break;
        }
        case "loai-lop": {
          fields = {
            id_khoa: {
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

          formData = ["ten_lop", "id_khoa", "mo_ta"];

          break;
        }
        case "khoa-hoc": {
          fields = {
            ten_khoa: {
              validators: {
                notEmpty: {
                  message: "Tên khóa không được để trống",
                },
              },
            },
          };

          formData = ["ten_khoa"];
          break;
        }

        case "hoc-ky": {
          fields = {
            ten_hocky: {
              validators: {
                notEmpty: {
                  message: "Tên học kỳ không được để trống",
                },
              },
            },
          };

          formData = ["ten_hocky"];
          break;
        }

        case "mon-hoc": {
          fields = {
            ma_mon: {
              validators: {
                notEmpty: {
                  message: "Mã môn không được để trống",
                },
              },
            },
            ten_mon: {
              validators: {
                notEmpty: {
                  message: "Tên môn không được để trống",
                },
              },
            },
            diem: {
              validators: {
                notEmpty: {
                  message: "Điểm không được để trống",
                },
              },
            },
          };

          formData = ["ma_mon", "ten_mon", "ghi_chu", "diem"];
          break;
        }

        default: {
          return;
        }
      }

      initAdd(element, form, fields, formData);
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTLAdd.init();
});
