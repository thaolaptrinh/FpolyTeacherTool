"use strict";

// Class definition
var KTAccountSettingsSigninMethods = (function () {
  var passwordMainEl;
  var passwordEditEl;
  var passwordChange;
  var passwordCancel;
  var formData = [];

  var toggleChangePassword = function () {
    passwordMainEl.classList.toggle("d-none");
    passwordChange.classList.toggle("d-none");
    passwordEditEl.classList.toggle("d-none");
  };

  // Private functions
  var initSettings = function () {
    passwordChange
      .querySelector("button")
      .addEventListener("click", function () {
        toggleChangePassword();
      });

    passwordCancel.addEventListener("click", function () {
      toggleChangePassword();
    });
  };

  var handleChangePassword = function (e) {
    var validation;

    // form elements
    var passwordForm = document.getElementById("kt_signin_change_password");

    if (!passwordForm) {
      return;
    }

    validation = FormValidation.formValidation(passwordForm, {
      fields: {
        currentpassword: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
          },
        },

        newpassword: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
          },
        },

        confirmpassword: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
            identical: {
              compare: function () {
                return passwordForm.querySelector('[name="newpassword"]').value;
              },
              message: "Mật khẩu mới phải giống nhau",
            },
          },
        },
      },

      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: ".fv-row",
        }),
      },
    });

    var formData_text = ["currentpassword", "newpassword", "confirmpassword"];
    passwordForm
      .querySelector("#kt_password_submit")
      .addEventListener("click", function (e) {
        e.preventDefault();

        formData.append("is_changepass", true);
        formData_text.forEach((element) => {
          formData.append(
            element,
            passwordForm.querySelector(`[name="${element}"]`).value
          );
        });

        validation.validate().then(function (status) {
          if (status == "Valid") {
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
                  allowOutsideClick: !response.data.status,
                }).then(function (result) {
                  if (result.isConfirmed && response.data.status) {
                    window.location.reload();
                  }
                });
              })
              .catch((error) => {
                console.log(error);
              });
          }
        });
      });
  };

  // Public methods
  return {
    init: function () {
      passwordMainEl = document.getElementById("kt_signin_password");
      passwordEditEl = document.getElementById("kt_signin_password_edit");
      passwordChange = document.getElementById("kt_signin_password_button");
      passwordCancel = document.getElementById("kt_password_cancel");
      formData = new FormData();

      initSettings();
      handleChangePassword();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTAccountSettingsSigninMethods.init();
});
