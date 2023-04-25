<?php
session_start();
include('conexao.php');
include('verifica_login.php');
include('func.php');
if (!loggedin()) {
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
    <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous" rel="stylesheet">

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
            <h2 class="card-content-title">Lista de tarefas a fazer:</h2>

            <div class="card-content-task">
                <label>Ir a academia</label>
                <div class="card-content-task-icon">
                    <input type="checkbox" class="checkbox-round" />
                    <button class="btn-icon">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn-icon">
                        <i class="fas fa-pen"></i>
                    </button>
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