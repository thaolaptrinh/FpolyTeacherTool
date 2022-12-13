"use strict";

// Class definition
var KTSettings = (function () {
  var formData = [];

  // Private functions

  var handleChange = function (e) {
    var validation;

    // form elements
    var Form = document.getElementById("kt_change_site");

    validation = FormValidation.formValidation(Form, {
      fields: {
        site_title: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
          },
        },

        site_name: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
          },
        },

        site_keywords: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
          },
        },

        site_description: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
          },
        },

        smtp_user: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
          },
        },

        smtp_pass: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
          },
        },

        smtp_server: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
          },
        },

        smtp_port: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
            },
          },
        },

        smtp_protocol: {
          validators: {
            notEmpty: {
              message: "Không được bỏ trống",
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

    var formData_text = [
      "site_title",
      "site_description",
      "site_keywords",
      "site_name",
      "smtp_user",
      "smtp_pass",
      "smtp_port",
      "smtp_protocol",
      "smtp_server",
    ];

    Form.querySelector("#kt_submit").addEventListener("click", function (e) {
      e.preventDefault();

      formData.append("is_change", true);
      formData_text.forEach((element) => {
        formData.append(
          element,
          Form.querySelector(`[name="${element}"]`).value
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
              }).then(function (result) {});
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
      formData = new FormData();
      handleChange();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTSettings.init();
});
