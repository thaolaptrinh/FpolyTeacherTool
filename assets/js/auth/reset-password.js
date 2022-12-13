"use strict";

// Class Definition
var KTAuthResetPassword = (function () {
  // Elements
  var form;
  var submitButton;
  var validator;
  var formData = [];

  var handleForm = function (e) {
    validator = FormValidation.formValidation(form, {
      fields: {
        email: {
          validators: {
            regexp: {
              regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
              message: "Email không hợp lệ",
            },
            notEmpty: {
              message: "Email không được bỏ trống",
            },
          },
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: ".fv-row",
          eleInvalidClass: "", // comment to enable invalid state icons
          eleValidClass: "", // comment to enable valid state icons
        }),
      },
    });

    submitButton.addEventListener("click", function (e) {
      e.preventDefault();

      formData.append("email", form.querySelector('[name="email"]').value);
      formData.append("is_resetpass", true);

      // Validate form
      validator.validate().then(function (status) {
        if (status == "Valid") {
          // Show loading indication
          submitButton.setAttribute("data-kt-indicator", "on");

          // Disable button to avoid multiple click
          submitButton.disabled = true;

          // Simulate ajax request
          setTimeout(function () {
            // Hide loading indication
            submitButton.removeAttribute("data-kt-indicator");

            // Enable button
            submitButton.disabled = false;

            axios
              .post(`${base_url + "auth/reset-password"}`, formData)
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
                    form.reset(); // reset form

                    //form.submit();

                    var redirectUrl = form.getAttribute("data-kt-redirect-url");
                    if (redirectUrl) {
                      location.href = redirectUrl;
                    }
                  }
                });
              })
              .catch((error) => {
                console.log(error);
              });
          }, 1500);
        } else {
          // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
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
    });
  };

  // Public Functions
  return {
    // public functions
    init: function () {
      form = document.querySelector("#kt_password_reset_form");
      submitButton = document.querySelector("#kt_password_reset_submit");

      formData = new FormData();

      handleForm();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTAuthResetPassword.init();
});
