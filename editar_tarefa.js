$(document).ready(function () {
  $("body").on("click", "#editar, .close-task", function () {
    $(".edit-task").hide();
    $(".task-added").show();
    const _this = $(this).parents(".card-content-task");
    _this.find(".edit-task, .task-added").toggle();
  });

  $("body").on("click", " .close-task", function () {
    $(".edit-task").hide();
    $(".task-added").show();
  });
});
