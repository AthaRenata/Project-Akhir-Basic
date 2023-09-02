document.addEventListener("DOMContentLoaded", function () {
  let delete_btn = document.querySelectorAll(".delete-btn");
  delete_btn.forEach(function (btn) {
    btn.addEventListener("click", function () {
      let data_id = this.getAttribute("data-id");
      let id = document.getElementById("id");
      id.value = data_id;
    });
  });
});
