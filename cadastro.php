<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

  <link rel="stylesheet" href="style.css" />
  <title>Cadastre-se</title>
</head>

<body>

  <div class="container">
    <h1>Cadastre-se</h1>
    <?php
    if (isset($_SESSION['status_cadastro'])) :
    ?>
      <script type="text/javascript">
        toastr.success('Cadastro efetuado com sucesso!', {
          autoClose: 5000,
          hideProgressBar: false,
          closeOnClick: true,
          pauseOnHover: true,
          draggable: true,
          progress: undefined,
          theme: "colored",
        });
      </script>
      <?php
      header("refresh:3;URL=fazer_login.php");
      ?>
    <?php
      unset($_SESSION['status_cadastro']);
    endif;
    ?>

    <?php
    if (isset($_SESSION['usuario_existe'])) :
    ?>
      <script type="text/javascript">
        toastr.info('Ops... Já existe um usuário cadastrado para o e-mail informado. Por favor, altere os dados e tente novamente.', {
          autoClose: 5000,
          hideProgressBar: false,
          closeOnClick: true,
          pauseOnHover: true,
          draggable: true,
          progress: undefined,
          theme: "colored",
        });
      </script>
    <?php
    endif;
    unset($_SESSION['usuario_existe']);
    ?>

    <form method="POST" action="cadastrar_usuario.php">

      <h2>Preencha os campos necessários para se cadastrar</h2>

      <fieldset>
        <legend>Primeiro nome: *</legend>
        <input type="text" name="nome" id="nameForm" minlength="3" required />
      </fieldset>

      <fieldset>
        <legend>E-mail:*</legend>
        <input type="email" name="email" id="emaileForm" minlength="3" required />
      </fieldset>

      <fieldset>
        <legend>Senha:*</legend>
        <input type="password" name="senha" id="passwordForm" minlength="3" required />
      </fieldset>

      <footer>
        <span class="hasAccount">Já possui uma conta? <a href="index.php">Clique aqui</a> e faça seu
          login</span>
        <button type="submit">Cadastrar</button>
      </footer>
    </form>
  </div>
</body>

</html>