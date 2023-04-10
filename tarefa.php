
<?php 
    $con = new PDO ("mysql:host=localhost;dbname=tarefas","root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(isset($_POST['tarefa'])){
        $tarefa = filter_input(INPUT_POST, "tarefa", FILTER_SANITIZE_STRING);
        $query = "INSERT INTO tarefas (descricao,concluida) VALUES (:descricao, 0)";
        $stm = $con->prepare($query);
        $stm->bindParam('descricao',$tarefa);
        $stm->execute();     
        header ('Location: http://localhost/projetos/Tarefa-todo-list/tarefa.php');

    }
    
    if (isset($_GET['excluir'])){
        $id = filter_input(INPUT_GET,"excluir", FILTER_SANITIZE_NUMBER_INT);
        $query ="DELETE FROM tarefas WHERE id=:id";
        $stm = $con->prepare($query);
        $stm->bindParam ('id',$id);
        $stm->execute();
        header ('Location: http://localhost/projetos/Tarefa-todo-list/tarefa.php');


    }

    if (isset($_GET['concluir'])){
        $id = filter_input(INPUT_GET,"concluir", FILTER_SANITIZE_NUMBER_INT);
        $query ="UPDATE tarefas SET concluida=1 WHERE id=:id";
        $stm = $con->prepare($query);
        $stm->bindParam ('id',$id);
        $stm->execute();
        header ('Location: http://localhost/projetos/Tarefa-todo-list/tarefa.php');

    }
    

    $query = "SELECT id,descricao,concluida FROM tarefas";
    $lista = $con->query($query)->fetchAll();
    

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tarefa.css" />
    <title>Lista de Tarefas</title>

</head>
<body>
    <form method="post">
        Nova Tarefa: <input type="text" name="tarefa" />
        <input type="submit" value ="Incluir" />
    </form>
    <div class="lista">
        <ul>
            <?php foreach($lista as $item): ?>
                <li <?= $item['concluida']?'class="concluida"':''?>> 
                <?=$item['descricao']?>
                    <?php if(!$item['concluida']):?>
                        <a href ="?concluir=<?=$item ['id']?>">Concluir]</a>
                    <?php endif;?>
                        <a href ="?excluir=<?=$item ['id']?>">[Excluir]</a>
            </li>
            <?php endforeach; ?>



        
        </ul>
    </div>
    
</body>
</html>