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
    <title>Login</title>
  </head>
  <body>
   
    <div class="container">
      
      <h1>Faça seu login</h1>
      <?php
         if(isset($_SESSION['nao_autenticado'])):
         ?>
          <div class="erro-vermelho">
            <p>ERRO: Usuário ou senha inválidos.</p>
          </div>
          <?php
          endif;
          unset($_SESSION['nao_autenticado']);
          ?>
      <form action="login.php" method="POST">
        <fieldset>
          <legend>Email:*</legend>
          <input type="text" name="email" id="email" minlength="3" required />
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
        <span class="hasAccount"
          >Não possui cadastro? <a href="cadastro.php">Cadastre-se</a></span>

        <button type="submit">ENTRAR</button>
      </form>

      <footer>

      </footer>
    </div>
  </body>
</html>
