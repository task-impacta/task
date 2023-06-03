<?php

// Excluir tarefas
if (isset($_GET['excluirTarefa'])) {
    $id_tarefa = $_GET['excluirTarefa'];

    $conn = connectdatabase();
    $sql = "DELETE FROM tarefas WHERE (id_tarefa = '" . $id_tarefa . "');";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}

// Marcar tarefas como concluída
if (isset($_GET['concluirTarefa'])) {
    $id_tarefa = $_GET['concluirTarefa'];

    $conn = connectdatabase();
    $sql = "UPDATE tarefas SET finalizado = 'sim' WHERE (id_tarefa = '" . $id_tarefa  . "');";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}

// Desmarcar tarefas como concluída 
if (isset($_GET['removerConcluir'])) {
    $id_tarefa = $_GET['removerConcluir'];

    $conn = connectdatabase();
    $sql = "UPDATE tarefas SET finalizado = 'nao' WHERE (id_tarefa = '" . $id_tarefa  . "');";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}

// Editar tarefa
if (isset($_GET['nova_tarefa'])) {
    $id_tarefa = $_GET['id_tarefa'];

    $tarefa_atualizada = $_GET['nova_tarefa'];

    $conn = connectdatabase();
    $sql = "UPDATE tarefas SET tarefa = '$tarefa_atualizada' WHERE (id_tarefa = '" . $id_tarefa . "')";
    $result = mysqli_query($conn, $sql);

    header('Location: quadro_de_tarefas.php');
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

function listarTarefas($fk_user)
{

    $conn = connectdatabase();
    $sql = "SELECT * FROM tarefas WHERE fk_user = '" . $fk_user . "'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>

            <div class="form">

                <div class="card-content-task">

                    <?php
                    if ($row['finalizado'] == "sim") { ?>
                        <span class="finish"><?php echo $row['tarefa']; ?></span>
                    <?php
                    } else { ?>
                        <div class="content-task">
                            <span id="span-task" class="task-added" data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['tarefa']; ?>">
                                <?php echo $row['tarefa']; ?>
                            </span>


                            <form id="input-task" class="edit-task" action="quadro_de_tarefas.php" method="GET">
                                <input type="text" value="<?php echo $row['tarefa']; ?>" name="nova_tarefa" id='tarefa' />
                                <input type="hidden" name="id_tarefa" value="<?php echo $row['id_tarefa']; ?>" class="id" />
                                <div class="button-actions">
                                    <button type="submit" class="confirm-edit"><i class="fas fa-check check"></i></button>
                                    <i class="fas fa-times close-task"></i>
                                </div>
                            </form>
                        </div>
                    <?php } ?>

                    <div class="card-content-task-icon">
                        <?php
                        if ($row['finalizado'] == "sim") { ?>
                            <a href="quadro_de_tarefas.php?removerConcluir=<?php echo $row['id_tarefa'] ?>" class="align"><i class="fas fa-check-circle"></i></a>

                        <?php
                        } else { ?>
                            <a href="quadro_de_tarefas.php?concluirTarefa=<?php echo $row['id_tarefa'] ?>" class="align"><i class="far fa-circle"></i></a>
                        <?php
                        }
                        ?>

                        <button id="deletar" class="btn-trash" type="submit" data-value="<?php echo $row['id_tarefa']; ?>">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                        <?php
                        if ($row['finalizado'] == "sim") { ?>
                            <a class="align"><i class="fas fa-pen disabled"></i></a>
                        <?php
                        } else { ?>
                            <a id="editar" data-value="<?php echo $row['id_tarefa']; ?>" class="align"><i class="fas fa-pen"></i></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
        return $row;
    } else { ?>
        <div class="message-no">
            <i class="fas fa-exclamation-circle"></i>
            <span class="text-no-task">Opa, você não possui nenhuma tarefa criada.</br> Que tal criar uma para organizar o seu dia?</span>
        </div>

<?php
    };
    mysqli_close($conn);
}

function adicionarTarefa($fk_user, $todo_text)
{
    $conn = connectdatabase();
    $sql = "INSERT INTO tarefas (tarefa, finalizado, fk_user) VALUES ('" . $todo_text . "','nao','" . $fk_user . "');";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}
?>