$(document).ready(function () {
  $("body").on("click", "#deletar", function (event) {
    event.preventDefault();

    var id_tarefa = $(this).data("value");

    Swal.fire({
      title: "Você tem certeza que deseja deletar essa tarefa?",
      text: "Esta ação não poderá ser revertida!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sim, delete!",
      cancelButtonText: "Não!",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          method: "GET",
          url: "quadro_de_tarefas.php?del_task=" + id_tarefa,
        });
        Swal.fire(
          "Tarefa deletada!",
          "Sua tarefa foi deletada com sucesso.",
          "success"
        );
        window.location = "quadro_de_tarefas.php";
      } else {
        Swal.fire("Cancelado", "Sua tarefa não foi alterada :)", "error");
      }
    });
  });
});
