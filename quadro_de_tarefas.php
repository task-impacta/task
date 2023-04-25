<?php
session_start();
include('conexao.php');
include('verifica_login.php');
include('func.php');
if(!loggedin()){
    header("location:login.php");
}
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
    <div>
        <center id = "todo"></center>
    </div>
    <div class="position-btn">
        <a href="logout.php" class="btn-logout">Sair</a>
    </div>

    <div class="content">
        <header class="card-header">
            <h2>Olá, <?php echo $_SESSION['nome']; ?>! O que você quer fazer hoje? </h2>

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
<?php
    $fk_user = $_SESSION['fk_user'];
    getTodoItems($fk_user);
 ?>