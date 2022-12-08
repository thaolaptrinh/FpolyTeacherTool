// Class definition
var KTSignupGeneral = (function () {
  // Elements
  var form;
  var submitButton;
  var validator;
  var passwordMeter;
  var formData = new FormData();

  // Handle form
  var handleForm = function (e) {
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    validator = FormValidation.formValidation(form, {
      fields: {
        coso: {
          validators: {
            notEmpty: {
              message: "Vui lòng chọn cơ sở.",
            },
          },
        },

        email: {
          validators: {
            regexp: {
              regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
              message: "Địa chỉ emal không hợp lệ",
            },
            notEmpty: {
              message: "Email không được để trống",
            },
          },
        },
        password: {
          validators: {
            notEmpty: {
              message: "Mật khẩu không được để trống",
            },
            callback: {
              message: "Vui lòng nhập mật khẩu hợp lệ.",
              callback: function (input) {
                if (input.value.length > 0) {
                  return validatePassword();
                }
              },
            },
          },
        },
        "confirm-password": {
          validators: {
            notEmpty: {
              message: "Vui lòng xác nhận mật khẩu.",
            },
            identical: {
              compare: function () {
                return form.querySelector('[name="password"]').value;
              },
              message: "Mật khẩu không trùng khớp.",
            },
          },
        },
        // toc: {
        //   validators: {
        //     notEmpty: {
        //       message: "You must accept the terms and conditions",
        //     },
        //   },
        // },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger({
          event: {
            password: false,
          },
        }),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: ".fv-row",
          eleInvalidClass: "", // comment to enable invalid state icons
          eleValidClass: "", // comment to enable valid state icons
        }),
      },
    });

    // Handle form submit
    submitButton.addEventListener("click", function (e) {
      e.preventDefault();

      validator.revalidateField("password");

      formData.append("coso", form.querySelector('[name="coso"]').value);
      formData.append("email", form.querySelector('[name="email"]').value);

      formData.append(
        "password",
        form.querySelector('[name="password"]').value
      );

      formData.append(
        "confirm-password",
        form.querySelector('[name="confirm-password"]').value
      );

      let email = formData.get("email");
      let password = formData.get("password");
      let coso = formData.get("coso");
      let confirm_password = formData.get("confirm-password");

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
              .post(`${base_url + "auth/register"}`, formData)
              .then((response) => {
                console.log(response);
                Swal.fire({
                  text: response.data.message,
                  icon: response.data.status ? "success" : "error",
                  buttonsStyling: false,
                  confirmButtonText: "Ok!",
                  customClass: {
                    confirmButton: "btn btn-primary",
                  },
                }).then(function (result) {
                  if (result.isConfirmed && response.data.status) {
                    form.reset(); // reset form
                    passwordMeter.reset(); // reset password meter
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

            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
          }, 1500);
          // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
        } else {
          // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
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
    });

    // Handle password input
    form
      .querySelector('input[name="password"]')
      .addEventListener("input", function () {
        if (this.value.length > 0) {
          validator.updateFieldStatus("password", "NotValidated");
        }
      });
  };

  // Password input validation
  var validatePassword = function () {
    return passwordMeter.getScore() === 100;
  };

  // Public functions
  return {
    // Initialization
    init: function () {
      // Elements
      form = document.querySelector("#kt_sign_up_form");
      submitButton = document.querySelector("#kt_sign_up_submit");
      passwordMeter = KTPasswordMeter.getInstance(
        form.querySelector('[data-kt-password-meter="true"]')
      );

      handleForm();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTSignupGeneral.init();
});
