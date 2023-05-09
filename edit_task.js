$(document).ready(function () {
  $("body").on("click", "#editar, .close-task", function () {
    const _this = $(this).parents(".card-content-task");
    _this.find(".edit-task, .task-added").toggle();
  });
});
