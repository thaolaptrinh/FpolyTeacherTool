"use strict";

var KTUsersList = (function () {
  // Define shared variables
  var table = document.getElementById("kt_table_users");
  var datatable;
  var toolbarBase;
  var toolbarSelected;
  var selectedCount;
  var formData = new FormData();

  // Private functions
  var initUserTable = function () {
    // Set date data order

    datatable = $(table).DataTable({
      info: false,
      order: [],
      pageLength: 10,
      lengthChange: false,
      columnDefs: [
        { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
      ],
    });

    // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
    datatable.on("draw", function () {
      // initToggleToolbar();
      handleDeleteRows();
      // toggleToolbars();
    });
  };

  // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
  var handleSearchDatatable = () => {
    const filterSearch = document.querySelector(
      '[data-kt-user-table-filter="search"]'
    );
    filterSearch.addEventListener("keyup", function (e) {
      datatable.search(e.target.value).draw();
    });
  };

  // Filter Datatable

  var handleFilteCoso = () => {
    const filterCoso = document.querySelector(
      '[data-kt-list-diem-filter="co_so"]'
    );
    var length = datatable.columns().header().length;
    $(filterCoso).on("change", (e) => {
      let value = e.target.value;
      if (value === "all") {
        value = "";
      }

      datatable
        .column(length - 3)
        .search(value)
        .draw();
    });
  };

  var handleFilterStatus = () => {
    const filterStatus = document.querySelector(
      '[data-kt-list-diem-filter="status"]'
    );
    var length = datatable.columns().header().length;
    $(filterStatus).on("change", (e) => {
      let value = e.target.value;
      if (value === "all") {
        value = "";
      }

      datatable
        .column(length - 2)
        .search(value)
        .draw();
    });
  };

  var handleDeleteRows = () => {
    // Select all delete buttons
    const deleteButtons = table.querySelectorAll(
      '[data-kt-users-table-filter="delete_row"]'
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
                    datatable.row($(parent)).remove().draw();
                  })
                  .then(function () {
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

  var handleActiveRows = () => {
    // Select all delete buttons
    const toggleActive = table.querySelectorAll(
      '[data-kt-users-table-filter="active"]'
    );

    toggleActive.forEach((d) => {
      // Delete button on click
      d.addEventListener("click", function (e) {
        e.preventDefault();

        // Select parent row
        const parent = e.target.closest("tr");

        const id = parent
          .querySelectorAll("td")[0]
          .querySelector("input").value;

        formData.append("is_active", true);
        formData.append("id", id);

        Swal.fire({
          text: "Bạn có chắc chắn muốn thay đổi dữ liệu này không?",
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
                }).then(function () {
                  window.location.reload();
                });
              })
              .catch((error) => {
                console.log(error);
              });
          } else if (result.dismiss === "cancel") {
            Swal.fire({
              text: "Thay đổi không thành công.",
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
  // Delete subscirption
  var handleDeleteRows = () => {
    // Select all delete buttons
    const deleteButtons = table.querySelectorAll(
      '[data-kt-users-table-filter="delete_row"]'
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
                    datatable.row($(parent)).remove().draw();
                  })
                  .then(function () {
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
    toolbarBase = document.querySelector('[data-kt-user-table-toolbar="base"]');
    toolbarSelected = document.querySelector(
      '[data-kt-user-table-toolbar="selected"]'
    );
    selectedCount = document.querySelector(
      '[data-kt-user-table-select="selected_count"]'
    );
    const deleteSelected = document.querySelector(
      '[data-kt-user-table-select="delete_selected"]'
    );

    // Toggle delete selected toolbar
    checkboxes.forEach((c) => {
      // Checkbox on click event
      c.addEventListener("click", function () {
        setTimeout(function () {
          // toggleToolbars();
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
              // toggleToolbars(); // Detect checked checkboxes
              // initToggleToolbar(); // Re-init toolbar to recalculate checkboxes
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
  // const toggleToolbars = () => {
  //   // Select refreshed checkbox DOM elements
  //   const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

  //   // Detect checkboxes state & count
  //   let checkedState = false;
  //   let count = 0;

  //   // Count checked boxes
  //   allCheckboxes.forEach((c) => {
  //     if (c.checked) {
  //       checkedState = true;
  //       count++;
  //     }
  //   });

  //   // Toggle toolbars
  //   if (checkedState) {
  //     selectedCount.innerHTML = count;
  //     toolbarBase.classList.add("d-none");
  //     toolbarSelected.classList.remove("d-none");
  //   } else {
  //     toolbarBase.classList.remove("d-none");
  //     toolbarSelected.classList.add("d-none");
  //   }
  // };

  return {
    // Public functions
    init: function () {
      if (!table) {
        return;
      }

      initUserTable();
      // initToggleToolbar();
      handleActiveRows();
      handleSearchDatatable();
      handleDeleteRows();
      handleFilterStatus();
      handleFilteCoso();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTUsersList.init();
});
