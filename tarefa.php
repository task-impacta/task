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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="to-do.css">

    <title>Quadro de tarefas</title>
</head>

<body>
    <div class="position-btn">
        <a href="logout.php" class="btn-logout">Sair</a>
    </div>

    <div class="content">
        <header class="card-header">
            <h2 class="card-header-title">Olá, <?php echo $_SESSION['nome']; ?>! O que você quer fazer hoje? </h2>

            <form method="POST">
                <input type="text" name="tarefa" class="new-task" placeholder="Escreva o que você quer fazer..." />
                <button type="submit" value="incluir" class="add-task">Criar tarefa</button>
            </form>
        </header>
        <article class="card-content">
            <div>
                <h2 class="card-content-title">LISTA DE TAREFAS A FAZER:</h2>
            </div>
            <div>
                <div class="card-content-task">
                    <div class="card-content-task-message">
                        <label>Ir a academia</label>
                    </div>
                    <div class="card-content-task-icon">
                        <input type="checkbox" class="checkbox-round" />
                        <img class="img-trash" src="C:\Users\jrica\Downloads\HTML_Ricardo\trash_icon.svg">
                        <img class="img-pencil" src="C:\Users\jrica\Downloads\HTML_Ricardo\pencil_write_icon.svg">
                    </div>
                </div>

                <div class="card-content-task">
                    <div class="card-content-task-message">
                        <label>Estudar</label>
                    </div>
                    <div class="card-content-task-icon">
                        <input type="checkbox" class="checkbox-round" />
                        <img class="img-trash" src="C:\Users\jrica\Downloads\HTML_Ricardo\trash_icon.svg">
                        <img class="img-pencil" src="C:\Users\jrica\Downloads\HTML_Ricardo\pencil_write_icon.svg">
                    </div>
                </div>

                <div class="card-content-task">
                    <div class="card-content-task-message">
                        <label>Ler um livro</label>
                    </div>
                    <div class="card-content-task-icon">
                        <input type="checkbox" class="checkbox-round" />
                        <img class="img-trash" src="C:\Users\jrica\Downloads\HTML_Ricardo\trash_icon.svg">
                        <img class="img-pencil" src="C:\Users\jrica\Downloads\HTML_Ricardo\pencil_write_icon.svg">
                    </div>
                </div>

                <div class="card-content-task">
                    <div class="card-content-task-message">
                        <label>Escutar podcast</label>
                    </div>
                    <div class="card-content-task-icon">
                        <input type="checkbox" class="checkbox-round" />
                        <img class="img-trash" src="C:\Users\jrica\Downloads\HTML_Ricardo\trash_icon.svg">
                        <img class="img-pencil" src="C:\Users\jrica\Downloads\HTML_Ricardo\pencil_write_icon.svg">
                    </div>
                </div>



            </div>
        </article>

    </div>

</body>

</html>