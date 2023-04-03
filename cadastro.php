<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="style.css" />
    <title>Cadastre-se!</title>
  </head>
  <body>

<div class="container">
      <h1>Cadastre-se</h1>
      <?php 
    if(isset($_SESSION['status_cadastro'])):
    ?>
    <div class="sucesso-verde">
      <p>Cadastro efetuado com sucesso!</p>
    </div>
    <?php 
    
    unset($_SESSION['status_cadastro']);
    endif;
    ?>

    <?php 
    if(isset($_SESSION['usuario_existe'])):
    ?>
    <div class="notificacao-azul">
        <p>Ops... Já existe um usuário cadastrado para o e-mail informado. Por favor, altere os dados e tente novamente.</p>
    </div>
    <?php 
    endif;
    unset($_SESSION['usuario_existe']);
    ?>
      <form method="POST" action="cadastrar.php">
    
        <h2>Preencha os campos necessários para se cadastrar</h2>

        <fieldset>
          <legend>Nome completo:*</legend>
          <input type="text" name="nome" id="nameForm" minlength="3" required />
        </fieldset>

        <fieldset>
          <legend>E-mail:*</legend>
          <input
            type="email"
            name="email"
            id="emaileForm"
            minlength="3"
            required
          />
        </fieldset>

        <fieldset>
          <legend>Senha:*</legend>
          <input
            type="password"
            name="senha"
            id="passwordForm"
            minlength="3"
            required
          />
        </fieldset>

        <footer>
          <span class="hasAccount"
            >Já possui uma conta? <a href="index.php">Clique aqui</a> e faça seu
            login</span>
            <button type="submit">Cadastrar</button>
        </footer>
      </form>
    </div>
  </body>
</html>
