"use strict";

// Class definition
var KTAppListLich = (function () {
  // Shared variables
  var table;
  var datatable;
  var formData = new FormData();

  // Private functions
  var initDatatable = function () {
    // Init datatable --- more info on datatables: https://datatables.net/manual/
    datatable = $(table).DataTable({
      info: false,
      order: [],
      pageLength: 10,
      language: {
        emptyTable: "Không có sẵn dữ liệu",
        zeroRecords: "Không tìm thấy dữ liệu",
      },
      columnDefs: [
        // { render: DataTable.render.number(",", ".", 2), targets: 4 },
        { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
        // { orderable: false, targets: 7 }, // Disable ordering on column 7 (actions)
      ],
    });

    // Re-init functions on datatable re-draws
    datatable.on("draw", function () {
      handleDeleteRows();
    });
  };

  // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
  var handleSearchDatatable = () => {
    const filterSearch = document.querySelector(
      '[data-kt-list-lich-filter="search"]'
    );
    filterSearch.addEventListener("keyup", function (e) {
      datatable.search(e.target.value).draw();
    });
  };

  // Delete cateogry
  var handleDeleteRows = () => {
    // Select all delete buttons
    const deleteButtons = table.querySelectorAll(
      '[data-kt-list-lich-filter="delete_row"]'
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

  // Public methods
  return {
    init: function () {
      table = document.querySelector("#kt_list_lich_table");

      if (!table) {
        return;
      }

      initDatatable();
      handleSearchDatatable();
      handleDeleteRows();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTAppListLich.init();
});
