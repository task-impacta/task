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
        <?php
        echo "<center id='usuario'></center>";
            if(isset($_POST['add_task']))
	    {
	    if(!empty($_POST['new-task']))
	    {
	        addTodoItem($_SESSION['nome'], $_POST['new-task']);
	        header("Refresh:0");   
	    }
	    }
        ?>
            <form action="quadro_de_tarefas.php" method="POST">
                <input type="text" name="tarefa" class="new-task" placeholder="Escreva o que você quer fazer..." />
                <button type="submit" value="incluir" class="add-task">Criar tarefa</button>
            </form>
        </header>
    </div>

</body>
</html>
<?php
    $fk_user = $_SESSION['fk_user'];
    getTodoItems($fk_user);
 ?>