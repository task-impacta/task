
<?php
define('HOST', 'database-2.cxom7witog2x.us-east-2.rds.amazonaws.com');
define('USUARIO','Admin');
define('SENHA', '1020304050');
define('BD', 'quadro_de_tarefas');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die ('Não foi possível conectar');