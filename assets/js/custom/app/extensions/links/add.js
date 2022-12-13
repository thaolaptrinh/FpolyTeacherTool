"use strict";

// Class definition
var KTLinksAddLink = (function () {
  // Shared variables
  const element = document.getElementById("kt_modal_add_link");
  const form = element.querySelector("#kt_modal_add_link_form");
  const modal = new bootstrap.Modal(element);
  var formData = new FormData();

  // Init add schedule modal
  var initAddLink = () => {
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    var validator = FormValidation.formValidation(form, {
      fields: {
        link_name: {
          validators: {
            notEmpty: {
              message: "Tên liên kết không được để trống",
            },
          },
        },
        link_url: {
          validators: {
            notEmpty: {
              message: "URL liên kết không được để trống",
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

    // Submit button handler
    const submitButton = element.querySelector(
      '[data-kt-links-modal-action="submit"]'
    );
    submitButton.addEventListener("click", (e) => {
      e.preventDefault();

      formData.append(
        "link_name",
        form.querySelector('[name="link_name"]').value
      );
      formData.append(
        "link_url",
        form.querySelector('[name="link_url"]').value
      );
      formData.append(
        "link_mota",
        form.querySelector('[name="link_mota"]').value
      );
      formData.append("is_add", true);

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
                .post(window.location.href, formData)
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
      '[data-kt-links-modal-action="cancel"]'
    );
    cancelButton.addEventListener("click", (e) => {
      e.preventDefault();
      modal.hide();

      // Swal.fire({
      //   text: "Bạn có chắc chắn muốn hủy bỏ?",
      //   icon: "warning",
      //   showCancelButton: true,
      //   buttonsStyling: false,
      //   confirmButtonText: "OK",
      //   cancelButtonText: "Quay lại",
      //   customClass: {
      //     confirmButton: "btn btn-primary",
      //     cancelButton: "btn btn-active-light",
      //   },
      // }).then(function (result) {
      //   if (result.value) {
      //     form.reset(); // Reset form
      //     modal.hide();
      //   } else if (result.dismiss === "cancel") {
      //     Swal.fire({
      //       text: "Biểu mẫu của bạn chưa bị hủy!.",
      //       icon: "error",
      //       buttonsStyling: false,
      //       confirmButtonText: "OK",
      //       customClass: {
      //         confirmButton: "btn btn-primary",
      //       },
      //     });
      //   }
      // });
    });

    // Close button handler
    const closeButton = element.querySelector(
      '[data-kt-links-modal-action="close"]'
    );

    closeButton.addEventListener("click", (e) => {
      e.preventDefault();
      modal.hide();

      // Swal.fire({
      //   text: "Bạn có chắc chắn muốn hủy bỏ?",
      //   icon: "warning",
      //   showCancelButton: true,
      //   buttonsStyling: false,
      //   confirmButtonText: "OK",
      //   cancelButtonText: "Quay lại",
      //   customClass: {
      //     confirmButton: "btn btn-primary",
      //     cancelButton: "btn btn-active-light",
      //   },
      // }).then(function (result) {
      //   if (result.value) {
      //     form.reset(); // Reset form
      //     modal.hide();
      //   } else if (result.dismiss === "cancel") {
      //     Swal.fire({
      //       text: "Biểu mẫu của bạn chưa bị hủy!.",
      //       icon: "error",
      //       buttonsStyling: false,
      //       confirmButtonText: "OK",
      //       customClass: {
      //         confirmButton: "btn btn-primary",
      //       },
      //     });
      //   }
      // });
    });
  };

  return {
    // Public functions
    init: function () {
      initAddLink();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTLinksAddLink.init();
});
