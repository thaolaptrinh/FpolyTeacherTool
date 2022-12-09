setInterval(alertDonate, 50000);

var formData = new FormData();
formData.append("is_donate", true);
function alertDonate() {
  axios
    .post(`${base_url}` + "cron/historyDonate.php", formData)
    .then((response) => {
      if (response.data.status) {
        Swal.fire({
          text: response.data.message,
          icon: response.data.status ? "success" : "error",
          buttonsStyling: false,
          confirmButtonText: "Đóng thông báo",
          customClass: {
            confirmButton: "btn btn-primary",
          },
        }).then(function (result) {});
      }
    })
    .catch((error) => {
      console.log(error);
    });
}
