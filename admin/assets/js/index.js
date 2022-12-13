var checkbox_status = document.querySelector('input[name="site_status"]');

var formData = new FormData();

formData.append("toggle_status", true);
checkbox_status.addEventListener("change", function () {
  axios
    .post(window.location.href, formData)
    .then((response) => {})
    .catch((error) => {
      console.log(error);
    });
});
