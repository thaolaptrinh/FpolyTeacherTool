var formData = new FormData();
formData.append("is_alertDonate", true);

axios
  .post(window.location.href, formData)
  .then((response) => {
    if (response.data.status) {
      Swal.fire({
        text: response.data.message,
        icon: response.data.status ? "success" : "error",
        buttonsStyling: false,
        confirmButtonText: "Ok!",
        customClass: {
          confirmButton: "btn btn-primary",
        },
      }).then(function (result) {
        if (result.isConfirmed && response.data.status) {
          modal.hide();
          window.location.reload();
        }
      });
    }
  })
  .catch((error) => {
    console.log(error);
  });
