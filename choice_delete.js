// $(function() {
//     const events = {
//       click: 'click'
//     };
    
//     const $button = $('#deletar');
    
//     $button.on(events.click, function(event) {
//       const config = {
//         html: true,
//         title: 'Error',
//         text: 'test',
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Check',    
//       };
      
//       // first variant
//       sweetAlert.fire(config).then(callback);
      
//       function callback(result) {
//         if (result.value) {
//           // second variant 
//           SweetAlert.fire("Yes", "Blah", "info");
//         } else {
//           // second variant 
//           SweetAlert.fire("No", "Blah", "info");
//         }
//       }
//     });
//   })


$(function() {
    const events = {
      click: 'click'
    };
        
    const $button = $('#deletar');
    
    $button.on(events.click, function(event) {
      const config = {

        title: 'Você tem certeza?',
        text: "Esta ação não poderá ser revertida",
        showCancelButton: true,
        confirmButtonText: 'Sim, delete!',
        cancelButtonText: 'Não, cancele!',
        reverseButtons: true         

      };
      
      // first variant
      sweetAlert.fire(config).then(callback);
      
      function callback(result) {
        if (result.value) {
          // second variant
          function tarefa_deletada(){
            $teste = $('#teste');

          }
          SweetAlert.fire(
            'Deletado!',
            'Esta tarefa foi deletada.',
            'success'
          );
        } else {
          // second variant 
          SweetAlert.fire(
            'Cancelado',
            'Sua tarefa não foi alterada :)',
            'error'
          );
        }
      }
    });
  })
//linha antiga que apagava a tarefa no momento do click
//
//<a href="quadro_de_tarefas.php?del_task=<?php echo $row['id_tarefa'] ?>"><i class="fas fa-trash-alt"></i></a>//