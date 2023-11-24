<?php
require_once '../private/validations.php';
authenticate_access();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/style/style.css">
  <title>Home</title>
</head>

<body>

  <form method="POST">

    <nav>
      <a style="background-color : #0A0F">Home</a>
      <a href='../cadastrar-aluno'>Cadastro</a>
      <a href="../listar-alunos">Lista</a>
    </nav>

    <h1>Trabalho de Programação Web</h1>

    <h3 style="margin-bottom : 8rem;">
      Ernando Tales de Menezes lima<br>
      Nelson Túlio de Menezes Lima</h3>
    <button formaction="../private/logout.php"
    style="align-self : flex-end;">Logout</button>

  </form>
</body>
</html>
