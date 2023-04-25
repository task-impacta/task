<?php
if (isset($_POST['Delete'])) {
    if (!empty($_POST['check_list'])) {
        $tasks = $_POST['check_list'];
        $length = count($tasks);
        for ($i = 0; $i < $length; $i++) {
            deleteTodoItem($_SESSION['nome'], $tasks[$i]);
        }
    }
} else if (isset($_POST['Save'])) {
    $conn = connectdatabase();
    $sql = "UPDATE quadro_de_tarefas.tarefas SET finalizado = 'nao";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if (!empty($_POST['check_list'])) {
        $tasks = $_POST['check_list'];
        $length = count($tasks);
        if ($length > 0) {
            for ($i = 0; $i < $length; $i++) {
                updateDone($tasks[$i]);
            }
        }
    }
}

function connectdatabase()
{
    return mysqli_connect("database-2.cxom7witog2x.us-east-2.rds.amazonaws.com", "Admin", "1020304050", "quadro_de_tarefas");
}

function loggedin()
{
    return isset($_SESSION['nome']);
}


// function userexist($nome)
// {
//     $conn = connectdatabase();
//     $sql = "SELECT * FROM quadro_de_tarefas.usuario WHERE nome = '" . $nome . "'";
//     $result = mysqli_query($conn, $sql);
//     mysqli_close($conn);

//     if (!$result || mysqli_num_rows($result) == 0) {
//         return false;
//     }
//     return true;
// }

// function validuser($nome, $senha, $email, $fk_user)
// {
//     $conn = connectdatabase();
//     $sql = "SELECT * FROM quadro_de_tarefas.usuario WHERE nome = '" . $nome . "'AND senha = '" . $senha . "'AND email = '" . $email . "'AND fk_user = '" . $fk_user . "'";
//     $result = mysqli_query($conn, $sql);
//     mysqli_close($conn);

//     if (!$result || mysqli_num_rows($result) == 0) {
//         return false;
//     }
//     return true;
// }

function error()
{
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}

// function updatepassword($nome, $senha)
// {
//     $conn = connectdatabase();
//     $sql = "UPDATE quadro_de_tarefas.usuario SET senha = '" . $senha . "' WHERE nome = '" . $nome . "';";
//     $result = mysqli_query($conn, $sql);

//     $_SESSION['error'] = "<br> &nbsp; Sua senha foi alterada com sucesso!";
//     header('location:todo.php');
// }

// function deleteaccount($nome)
// {
//     $conn = connectdatabase();
//     $sql = "DELETE FROM quadro_de_tarefas.tarefas WHERE nome = '" . $nome . "';";
//     $result = mysqli_query($conn, $sql);

//     $sql = "DELETE FROM quadro_de_tarefas.usuario WHERE nome = '" . $nome . "';";
//     $result = mysqli_query($conn, $sql);

//     $_SESSION['error'] = "&nbsp; Conta deletada";
//     unset($_SESSION['nome']);
//     header('location:login.php');
// }

// function isValid($nome, $senha, $email, $fk_user)
// {

//     $conn = connectdatabase();
//     if (validuser($nome, $senha, $email, $fk_user)) {
//         $_SESSION["nome"] = $nome;
//         header('location:todo.php');
//     } else {
//         $_SESSION['error'] = "&nbsp; Usuário inválido ou senha inválida";
//         header('location:login.php');
//     }
//     mysqli_close($conn);
// }



function getTodoItems($fk_user)
{

    $conn = connectdatabase();
    $sql = "SELECT * FROM tarefas WHERE fk_user = '" . $fk_user . "'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<span>" . $row['tarefa'] . "</span>";

            echo "<form method='POST'>";
            if ($row['finalizado'] == "sim") {
                echo "<input type='checkbox' checked class='largerCheckbox' name='check_list[]' value='" . $row["id_tarefa"] . "'>";
            } else {
                echo "<input type='checkbox' class='largerCheckbox' name='check_list[]' value='" . $row["id_tarefa"] . "'>";
            }

            echo "<input type='submit' name='Delete' value='Deletar'/>";
            echo "<input type='submit' name='Save' value='Concluir'/>";

            echo "</form>";
        }
    };
    mysqli_close($conn);
}


function addTodoItem($fk_user, $todo_text)
{
    $conn = connectdatabase();
    $sql = "INSERT INTO tarefas (tarefa, finalizado, fk_user) VALUES ('" . $todo_text . "','nao','" . $fk_user . "');";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function deleteTodoItem($fk_user, $todo_id)
{
    $conn = connectdatabase();
    $sql = "DELETE FROM quadro_de_tarefas.tarefas WHERE id_tarefa = " . $todo_id . " and fk_user = '" . $fk_user . "';";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function updateDone($todo_id)
{
    $conn = connectdatabase();
    $sql = "UPDATE quadro_de_tarefas.tarefas SET finalizado = 'sim' WHERE (id_tarefa = '" . $todo_id . "');";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}
