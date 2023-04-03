<?php
session_start();
include('verifica_login.php');
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
    <h2>Olá, <?php echo $_SESSION['nome'];?></h2>
    <button><a href="logout.php" class="btn-logout" >Sair</a></button>
</body>
</html>
