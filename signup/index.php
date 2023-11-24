<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/style/style.css">
  <script type = "text/javascript" src="../public/script/validations.js"></script>
  <title>Signup</title>
</head>

<body>
  <form class="pre-login" name="signup-form" onsubmit="return validateSignupForm()" method="POST" action="../private/signup.php">

    <h1>CADASTRO</h1>

    <span id="user-warning" class="warning">
      <?php
        if ($_SESSION["SignupError"]["NotAvaliableUser"]){
          echo "Nome de usuário não disponível.";
        } else if ($_SESSION["SignupError"]["InvalidUser"]) {
          echo "Nome de usuário inválido.";
        }
      ?>
    </span>

    <input id="username" name="username" autocomplete="username" placeholder="Digite seu nome de usuário." required>

      <span id="email-warning" class="warning">
        <?php
          if ($_SESSION["SignupError"]["EmailNotAvaliable"]){
            echo "Endereço de email não disponível.";
          } else if ($_SESSION["SignupError"]["InvalidEmail"]) {
            echo "Endereço de email inválido.";
          }
        ?>
      </span>

    <input id="email" name="email" autocomplete="email" placeholder="Digite seu email (opcional).">
      <span id="password-warning" class="warning">
        <?php
          if ($_SESSION["SignupError"]["InvalidPassword"]){
            echo "Senha inválida.";
          }
          unset($_SESSION["SignupError"])
        ?>
      </span>

    <input id="password" name="password" type="password" placeholder="Digite sua senha." required>
    <span class="success">
      <?php
        if (isset($_SESSION["SignupSuccess"])){
          echo $_SESSION["SignupSuccess"];
          unset($_SESSION["SignupSuccess"]);
        }
      ?>
    </span>

    <nav>
      <a href="../">voltar</a>
      <button type="submit">cadastrar</button>
    </nav>

  </form>
</body>
</html>
