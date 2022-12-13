"use strict";

// Class definition
var KTAppListDiem = (function () {
  // Shared variables
  var table;
  var datatable;
  var formData = new FormData();

  // Private functions
  var initDatatable = function () {
    var lop =
      document.querySelector(
        'select[name="lop"] option[selected="selected"]'
      ) &&
      document.querySelector('select[name="lop"] option[selected="selected"]')
        .value;
    var mon =
      document.querySelector(
        'select[name="lop"] option[selected="selected"]'
      ) &&
      document.querySelector('select[name="lop"] option[selected="selected"]')
        .value;

    datatable = $(table).DataTable({
      info: false,

      order: [],
      dom: '<"float-end"B>tilp',
      scrollX: true,

      buttons: [
        {
          extend: "print",
          className: "print",
          title: `Bảng điểm ${lop} - ${mon}`,
          exportOptions: {
            columns: [":not(.hide-export)"],
          },
        },

        {
          extend: "copyHtml5",
          className: "copyHtml5",
          title: `Bảng điểm ${lop} - ${mon}`,
          exportOptions: {
            columns: [":not(.hide-export)"],
          },
        },

        {
          extend: "csvHtml5",
          className: "csvHtml5",
          title: `Bảng điểm ${lop} - ${mon}`,
          exportOptions: {
            columns: [":not(.hide-export)"],
          },
        },

        {
          extend: "pdfHtml5",
          className: "pdfHtml5",
          title: `Bảng điểm ${lop} - ${mon}`,
          exportOptions: {
            columns: [":not(.hide-export)"],
          },
        },

        {
          extend: "excelHtml5",
          className: "excelButton",
          title: `Bảng điểm ${lop} - ${mon}`,
          exportOptions: {
            columns: [":not(.hide-export)"],
          },
        },
      ],

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

  var edit_diem = function (id, text, column_name, target = null) {
    formData.append("is_update", true);
    formData.append("id", id);
    formData.append("text", text);
    formData.append("column_name", column_name);
    formData.append("target", target);
    axios
      .post(window.location.href, formData)
      .then((response) => {
        var data = response.data;
        console.log(data);
        toastMixin.fire({
          title: data.message,
          icon: data.status ? "success" : "error",
        });
      })
      .catch((error) => {
        console.log(error);
      });
  };

  // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()

  var handleSearchDatatable = () => {
    const filterSearch = document.querySelector(
      '[data-kt-list-diem-filter="search"]'
    );
    filterSearch.addEventListener("keyup", function (e) {
      datatable.search(e.target.value).draw();
    });
  };

  // Handle status filter dropdown
  var handleStatusFilter = () => {
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

  // Delete cateogry
  var handleDeleteRows = () => {
    // Select all delete buttons
    const deleteButtons = table.querySelectorAll(
      '[data-kt-list-diem-filter="delete_row"]'
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

  // Public methods
  return {
    init: function () {
      table = document.querySelector("#kt_list_diem_table");

      if (!table) {
        return;
      }

      $(".diem").blur(function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        var target = $(this).data("target");
        var text = $(this).text();
        edit_diem(id, text, target, "diem");
      });

      $('select[name="phan_loai"]').change(function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        var text = $(this).val();
        edit_diem(id, text, "phan_loai");
      });

      initDatatable();
      handleSearchDatatable();
      handleStatusFilter();
      handleDeleteRows();
    },
  };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
  KTAppListDiem.init();
});
