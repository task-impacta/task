<?php

// Excluir tarefas
if (isset($_GET['del_task'])) {
    $id_tarefa = $_GET['del_task'];

    $conn = connectdatabase();
    $sql = "DELETE FROM tarefas WHERE (id_tarefa = '" . $id_tarefa . "');";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}

// Marcar tarefas como concluída
if (isset($_GET['finish'])) {
    $id_tarefa = $_GET['finish'];

    $conn = connectdatabase();
    $sql = "UPDATE tarefas SET finalizado = 'sim' WHERE (id_tarefa = '" . $id_tarefa  . "');";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}

// Desmarcar tarefas como concluída 
if (isset($_GET['unfineshed'])) {
    $id_tarefa = $_GET['unfineshed'];

    $conn = connectdatabase();
    $sql = "UPDATE tarefas SET finalizado = 'nao' WHERE (id_tarefa = '" . $id_tarefa  . "');";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function connectdatabase()
{
    return mysqli_connect("database-2.cxom7witog2x.us-east-2.rds.amazonaws.com", "Admin", "1020304050", "quadro_de_tarefas");
}

function loggedin()
{
    return isset($_SESSION['nome']);
}

function error()
{
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}

function getTodoItems($fk_user)
{

    $conn = connectdatabase();
    $sql = "SELECT * FROM tarefas WHERE fk_user = '" . $fk_user . "'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>

            <form method='POST'>
                <div class="card-content-task">
                    <?php
                    if ($row['finalizado'] == "sim") { ?>
                        <label class="finish"><?php echo $row['tarefa']; ?></label>
                    <?php
                    } else { ?>
                        <label><?php echo $row['tarefa']; ?></label>
                    <?php } ?>

                    <div class="card-content-task-icon">
                        <?php
                        if ($row['finalizado'] == "sim") { ?>
                            <a href="quadro_de_tarefas.php?unfineshed=<?php echo $row['id_tarefa'] ?>"><i class="fas fa-check-circle"></i></a>
                        <?php
                        } else { ?>
                            <a href="quadro_de_tarefas.php?finish=<?php echo $row['id_tarefa'] ?>"><i class="far fa-circle"></i></a>
                        <?php
                        }
                        ?>
                        <a href="quadro_de_tarefas.php?del_task=<?php echo $row['id_tarefa'] ?>"><i class="fas fa-trash-alt"></i></a>
                        <a href="quadro_de_tarefas.php?edit=<?php echo $row['id_tarefa'] ?>"><i class="fas fa-pen"></i></a>
                    </div>
                </div>
            </form>
<?php
        }
        return $row;
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
?>