"use strict";

var KTUList = (function () {
  // Define shared variables
  var table = document.getElementById("kt_table_list");
  var datatable;
  var toolbarBase;
  var toolbarSelected;
  var selectedCount;
  var formData = new FormData();

  // Private functions
  var initListTable = function () {
    // Set date data order
    const tableRows = table.querySelectorAll("tbody tr");

    // Init datatable --- more info on datatables: https://datatables.net/manual/
    datatable = $(table).DataTable({
      info: false,
      order: [],
      pageLength: 5,
      lengthChange: false,
      language: {
        emptyTable: "Không có sẵn dữ liệu",
        zeroRecords: "Không tìm thấy dữ liệu",
      },
      columnDefs: [
        { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
        // { orderable: false, targets: 5 }, // Disable ordering on column 5 (actions)
      ],
    });

    // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
    datatable.on("draw", function () {
      initToggleToolbar();
      handleDeleteRows();
      toggleToolbars();
    });
  };

  // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
  var handleSearchDatatable = () => {
    const filterSearch = document.querySelector(
      '[data-kt-table-filter="search"]'
    );
    filterSearch.addEventListener("keyup", function (e) {
      datatable.search(e.target.value).draw();
    });
  };

  // Reset Filter
  var handleResetForm = () => {
    // Select reset button
    const resetButton = document.querySelector(
      '[data-kt-table-filter="reset"]'
    );

    // Reset datatable
    resetButton.addEventListener("click", function () {
      // Select filter options
      const filterForm = document.querySelector(
        '[data-kt-table-filter="form"]'
      );
      const selectOptions = filterForm.querySelectorAll("select");

      // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
      selectOptions.forEach((select) => {
        $(select).val("").trigger("change");
      });

      // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
      datatable.search("").draw();
    });
  };

  // Delete subscirption
  var handleDeleteRows = () => {
    // Select all delete buttons
    const deleteButtons = table.querySelectorAll(
      '[data-kt-table-filter="delete_row"]'
    );

    deleteButtons.forEach((d) => {
      // Delete button on click
      d.addEventListener("click", function (e) {
        e.preventDefault();

        // Select parent row
        const parent = e.target.closest("tr");
        const id = parent
          .querySelectorAll("td")[0]
          .querySelector("input").value;

        const target = parent.querySelectorAll("td")[1];
        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/

        formData.append("is_delete", true);
        formData.append("id", id);

        Swal.fire({
          text: "Bạn có chắc chắn muốn xóa dữ liệu này không?",
          icon: "warning",
          showCancelButton: true,
          buttonsStyling: false,
          confirmButtonText: "Ok, tôi đồng ý!",
          cancelButtonText: "Không, hủy",
          customClass: {
            confirmButton: "btn fw-bold btn-danger",
            cancelButton: "btn fw-bold btn-active-light-primary",
          },
        }).then(function (result) {
          if (result.value) {
            axios
              .post(window.location.href, formData)
              .then((response) => {
                Swal.fire({
                  text: response.data.message,
                  icon: "success",
                  buttonsStyling: false,
                  confirmButtonText: "Hoàn tất!",
                  customClass: {
                    confirmButton: "btn fw-bold btn-primary",
                  },
                })
                  .then(function () {
                    // Remove current row
                    datatable.row($(parent)).remove().draw();
                  })
                  .then(function () {
                    // Detect checked checkboxes
                    toggleToolbars();
                  });
              })
              .catch((error) => {
                console.log(error);
              });
          } else if (result.dismiss === "cancel") {
            Swal.fire({
              text: "Xóa không thành công.",
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
    });
  };

  // Init toggle toolbar
  var initToggleToolbar = () => {
    // Toggle selected action toolbar
    // Select all checkboxes
    const checkboxes = table.querySelectorAll('[type="checkbox"]');

    // Select elements
    toolbarBase = document.querySelector('[data-kt-table-toolbar="base"]');
    toolbarSelected = document.querySelector(
      '[data-kt-table-toolbar="selected"]'
    );
    selectedCount = document.querySelector(
      '[data-kt-table-select="selected_count"]'
    );
    const deleteSelected = document.querySelector(
      '[data-kt-table-select="delete_selected"]'
    );

    // Toggle delete selected toolbar
    checkboxes.forEach((c) => {
      // Checkbox on click event
      c.addEventListener("click", function () {
        setTimeout(function () {
          toggleToolbars();
        }, 50);
      });
    });

    // Deleted selected rows
    deleteSelected.addEventListener("click", function () {
      // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
      Swal.fire({
        text: "Are you sure you want to delete selected customers?",
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Yes, delete!",
        cancelButtonText: "No, cancel",
        customClass: {
          confirmButton: "btn fw-bold btn-danger",
          cancelButton: "btn fw-bold btn-active-light-primary",
        },
      }).then(function (result) {
        if (result.value) {
          Swal.fire({
            text: "You have deleted all selected customers!.",
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
              confirmButton: "btn fw-bold btn-primary",
            },
          })
            .then(function () {
              // Remove all selected customers
              checkboxes.forEach((c) => {
                if (c.checked) {
                  datatable
                    .row($(c.closest("tbody tr")))
                    .remove()
                    .draw();
                }
              });

              // Remove header checked box
              const headerCheckbox =
                table.querySelectorAll('[type="checkbox"]')[0];
              headerCheckbox.checked = false;
            })
            .then(function () {
              toggleToolbars(); // Detect checked checkboxes
              initToggleToolbar(); // Re-init toolbar to recalculate checkboxes
            });
        } else if (result.dismiss === "cancel") {
          Swal.fire({
            text: "Selected customers was not deleted.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
              confirmButton: "btn fw-bold btn-primary",
            },
          });
        }
      });
    });
  };

  // Toggle toolbars
  const toggleToolbars = () => {
    // Select refreshed checkbox DOM elements
    const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

    // Detect checkboxes state & count
    let checkedState = false;
    let count = 0;

    // Count checked boxes
    allCheckboxes.forEach((c) => {
      if (c.checked) {
        checkedState = true;
        count++;
      }
    });

    // Toggle toolbars
    if (checkedState) {
      selectedCount.innerHTML = count;
      toolbarBase.classList.add("d-none");
      toolbarSelected.classList.remove("d-none");
    } else {
      toolbarBase.classList.remove("d-none");
      toolbarSelected.classList.add("d-none");
    }
  };

  return {
    // Public functions
    init: function () {
      if (!table) {
        return;
      }

      initListTable();
      initToggleToolbar();
      handleSearchDatatable();
      handleResetForm();
      handleDeleteRows();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTUList.init();
});
