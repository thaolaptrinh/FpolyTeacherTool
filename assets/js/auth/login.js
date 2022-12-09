// Class definition

var KTSigninGeneral = (function () {
  // Elements
  var form;
  var submitButton;
  var validator;
  var formData;

  // Handle form
  var handleForm = function (e) {
    validator = FormValidation.formValidation(form, {
      fields: {
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
            stringLength: {
              min: 8,
              message: "Mật khẩu từ 8 ký tự trở lên",
            },
            notEmpty: {
              message: "Mật khẩu không được để trống",
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
    let checkbox_remember = document.querySelector('[name="remember"]');
    checkbox_remember.addEventListener("change", function () {
      if (this.checked) {
        localStorage.setItem("is_remember", true);
      } else {
        localStorage.removeItem("is_remember");
      }
    });

    if (localStorage.getItem("is_remember")) {
      form
        .querySelector('[name="remember"]')
        .setAttribute("checked", "checked");

      form.querySelector('[name="email"]').value =
        localStorage.getItem("user_email");
      form.querySelector('[name="password"]').value =
        localStorage.getItem("user_pass");
    } else {
      form.querySelector('[name="email"]').value = "";
      form.querySelector('[name="password"]').value = "";
    }

    // Handle form submit
    submitButton.addEventListener("click", function (e) {
      // Prevent button default action
      e.preventDefault();

      formData.append("email", form.querySelector('[name="email"]').value);
      formData.append(
        "password",
        form.querySelector('[name="password"]').value
      );

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
              .post(`${base_url + "auth/login"}`, formData)
              .then((response) => {
                if (response.data.status) {
                  if (localStorage.getItem("is_remember")) {
                    localStorage.setItem("user_email", formData.get("email"));
                    localStorage.setItem("user_pass", formData.get("password"));
                  } else {
                    localStorage.removeItem("user_email");
                    localStorage.removeItem("user_pass");
                  }
                }
                Swal.fire({
                  text: response.data.message,
                  icon: response.data.status ? "success" : "error",
                  buttonsStyling: false,
                  confirmButtonText: "Ok!",
                  customClass: {
                    confirmButton: "btn btn-primary",
                  },
                  allowOutsideClick: !response.data.status,
                }).then(function (result) {
                  if (result.isConfirmed && response.data.status) {
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
    });
  };

  // Public functions
  return {
    // Initialization
    init: function () {
      form = document.querySelector("#kt_sign_in_form");
      submitButton = document.querySelector("#kt_sign_in_submit");
      formData = new FormData();
      handleForm();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTSigninGeneral.init();
});
