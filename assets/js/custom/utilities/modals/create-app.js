"use strict";

// Class definition
var KTCreateApp = (function () {
  // Elements
  var modal;
  var modalEl;

  var stepper;
  var form;
  var formSubmitButton;
  var formContinueButton;
  var formData = [];
  // Variables
  var stepperObj;
  var validations = [];

  // Private Functions
  var initStepper = function () {
    // Initialize Stepper
    stepperObj = new KTStepper(stepper);

    // Stepper change event(handle hiding submit button for the last step)
    stepperObj.on("kt.stepper.changed", function (stepper) {
      if (stepperObj.getCurrentStepIndex() === 4) {
        formSubmitButton.classList.remove("d-none");
        formSubmitButton.classList.add("d-inline-block");
        formContinueButton.classList.add("d-none");
      } else if (stepperObj.getCurrentStepIndex() === 5) {
        formSubmitButton.classList.add("d-none");
        formContinueButton.classList.add("d-none");
      } else {
        formSubmitButton.classList.remove("d-inline-block");
        formSubmitButton.classList.remove("d-none");
        formContinueButton.classList.remove("d-none");
      }
    });

    // Validation before going to next page
    stepperObj.on("kt.stepper.next", function (stepper) {
      // console.log("stepper.next");

      // Validate form before change stepper step
      var validator = validations[stepper.getCurrentStepIndex() - 1]; // get validator for currnt step

      if (validator) {
        validator.validate().then(function (status) {
          // console.log("validated!");

          if (status == "Valid") {
            stepper.goNext();

            //KTUtil.scrollTop();
          } else {
            // Show error message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            Swal.fire({
              text: "Xin lỗi, có vẻ như đã phát hiện thấy một số lỗi, vui lòng thử lại.",
              icon: "error",
              buttonsStyling: false,
              confirmButtonText: "Ok, đã rõ!",
              customClass: {
                confirmButton: "btn btn-light",
              },
            }).then(function () {
              //KTUtil.scrollTop();
            });
          }
        });
      } else {
        stepper.goNext();

        KTUtil.scrollTop();
      }
    });

    // Prev event
    stepperObj.on("kt.stepper.previous", function (stepper) {
      // console.log("stepper.previous");

      stepper.goPrevious();
      KTUtil.scrollTop();
    });

    formSubmitButton.addEventListener("click", function (e) {
      // Validate form before change stepper step
      var validator = validations[3]; // get validator for last form

      var form_text = ["hoc-ky", "loai-lop", "mon-hoc"];
      form_text.forEach((element) => {
        formData.append(
          element,
          form.querySelector(`[name="${element}"]:checked:enabled`).value
        );
      });

      formData.append(
        "file-sv",
        form.querySelector(`[name="file-sv"]`).files[0]
      );
      formData.append("is_import", true);

      validator.validate().then(function (status) {
        // console.log("validated!");

        if (status == "Valid") {
          // Prevent default button action
          e.preventDefault();

          // Disable button to avoid multiple click
          formSubmitButton.disabled = true;

          // Show loading indication
          formSubmitButton.setAttribute("data-kt-indicator", "on");

          // Simulate form submission
          setTimeout(function () {
            // Hide loading indication
            formSubmitButton.removeAttribute("data-kt-indicator");

            // Enable button
            formSubmitButton.disabled = false;

            stepperObj.goNext();

            axios
              .post(base_url, formData)
              .then((response) => {
                console.log(response);
                var data = response.data.data;
                if (response.data.status) {
                  var href = `${base_url}bang-diem?lop=${data.lop}&mon=${data.mon}`;
                  console.log(href);
                  form
                    .querySelector("#view-bang-diem")
                    .setAttribute("href", href);
                }
              })
              .catch((error) => {
                console.log(error);
              });

            //KTUtil.scrollTop();
          }, 2000);
        } else {
          Swal.fire({
            text: "Xin lỗi, có vẻ như đã phát hiện thấy một số lỗi, vui lòng thử lại.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, đã rõ!",
            customClass: {
              confirmButton: "btn btn-light",
            },
          }).then(function () {
            KTUtil.scrollTop();
          });
        }
      });
    });
  };

  // Init form inputs
  var initForm = function () {
    // Expiry month. For more info, plase visit the official plugin site: https://select2.org/
  };

  var initValidation = function () {
    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    // Step 1
    validations.push(
      FormValidation.formValidation(form, {
        fields: {
          "hoc-ky": {
            validators: {
              notEmpty: {
                message: "Học kỳ không được bỏ trống",
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
      })
    );

    // Step 2
    validations.push(
      FormValidation.formValidation(form, {
        fields: {
          "loai-lop": {
            validators: {
              notEmpty: {
                message: "Lớp học không được bỏ trống",
              },
            },
          },
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          // Bootstrap Framework Integration
          bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: ".fv-row",
            eleInvalidClass: "",
            eleValidClass: "",
          }),
        },
      })
    );

    // Step 3
    validations.push(
      FormValidation.formValidation(form, {
        fields: {
          "mon-hoc": {
            validators: {
              notEmpty: {
                message: "Môn học không được bỏ trống",
              },
            },
          },
        },

        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          // Bootstrap Framework Integration
          bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: ".fv-row",
            eleInvalidClass: "",
            eleValidClass: "",
          }),
        },
      })
    );

    // Step 4
    validations.push(
      FormValidation.formValidation(form, {
        fields: {
          "file-sv": {
            validators: {
              notEmpty: {
                message: "Chưa có file danh sách sinh viên",
              },
            },
          },
        },

        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          // Bootstrap Framework Integration
          bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: ".fv-row",
            eleInvalidClass: "",
            eleValidClass: "",
          }),
        },
      })
    );
  };

  return {
    // Public Functions
    init: function () {
      // Elements
      modalEl = document.querySelector("#kt_modal_create_app");

      if (!modalEl) {
        return;
      }

      modal = new bootstrap.Modal(modalEl);

      formData = new FormData();

      stepper = document.querySelector("#kt_modal_create_app_stepper");
      form = document.querySelector("#kt_modal_create_app_form");
      formSubmitButton = stepper.querySelector(
        '[data-kt-stepper-action="submit"]'
      );
      formContinueButton = stepper.querySelector(
        '[data-kt-stepper-action="next"]'
      );

      initStepper();
      initForm();
      initValidation();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTCreateApp.init();
});
