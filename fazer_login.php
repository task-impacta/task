<?php
session_start();
include('conexao.php');

if (empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select nome, fk_user from usuario where email = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['fk_user'] = $usuario_bd['fk_user'];
	$_SESSION['nome'] = $usuario_bd['nome'];
	header('Location: quadro_de_tarefas.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
