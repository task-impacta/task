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
  <title>Login</title>
</head>

<body>

  <div class="container">

    <h1>Faça seu login</h1>

    <?php
    if (isset($_SESSION['nao_autenticado'])) :
    ?>

      <script type="text/javascript">
        toastr.error('Usuário ou senha inválidos.', {
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
    unset($_SESSION['nao_autenticado']);
    ?>

    <form action="login.php" method="POST">
      <fieldset>
        <legend>Email:*</legend>
        <input type="text" name="email" id="email" minlength="3" required />
      </fieldset>

      <fieldset>
        <legend>Senha:*</legend>
        <input type="password" name="senha" id="passwordForm" minlength="3" required />
      </fieldset>

      <footer>
        <span class="hasAccount">Não possui cadastro? <a href="cadastro.php">Cadastre-se</a></span>
        <button type="submit">Entrar</button>
      </footer>
    </form>
  </div>
</body>

</html>