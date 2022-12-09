"use strict";

// Class definition

var KTDonate = (function () {
  // will only come inside after the modal is shown

  // Private functions
  var initCodeCopy = function () {
    KTUtil.each(
      document.querySelectorAll('#kt_donate_table [data-action="copy"]'),
      function (button) {
        var tr = button.closest("tr");
        var code = KTUtil.find(tr, '[data-bs-target="code"]');

        var clipboard = new ClipboardJS(button, {
          container: document.getElementById("kt_modal_donate"),
          target: code,
          text: function () {
            return code.innerHTML;
          },
        });

        clipboard.on("success", function (e) {
          // Icons
          var svgIcon = button.querySelector(".svg-icon");
          var checkIcon = button.querySelector(".bi.bi-check");

          // exit if check icon is already shown
          if (checkIcon) {
            return;
          }

          // Create check icon
          checkIcon = document.createElement("i");
          checkIcon.classList.add("bi");
          checkIcon.classList.add("bi-check");
          checkIcon.classList.add("fs-2x");

          // Append check icon
          button.appendChild(checkIcon);

          // Highlight target
          code.classList.add("text-success");

          // Hide copy icon
          svgIcon.classList.add("d-none");

          // Set 3 seconds timeout to hide the check icon and show copy icon back
          setTimeout(function () {
            // Remove check icon
            svgIcon.classList.remove("d-none");
            // Show check icon back
            button.removeChild(checkIcon);

            // Remove highlight
            code.classList.remove("text-success");
          }, 3000);
        });
      }
    );
  };

  // Public methods
  return {
    init: function () {
      initCodeCopy();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTDonate.init();
});
