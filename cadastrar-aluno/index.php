<?php
require_once "../private/validations.php";
authenticate_access();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/style/style.css">
  <script type = "text/javascript" src="../public/script/validations.js"></script>
  <title>Cadastro</title>
</head>

<body>

  <form method="POST" onsubmit="return validateStudent()" action="../private/reccordStudent.php" id="student-form" name="student-form">

    <nav>
      <a href="../home">Home</a>
      <a style="background-color : #0A0F">Cadastro</a>
      <a href='../listar-alunos'>Lista</a>
    </nav>

    <h1>Cadastro de Alunos</h1>

    <span id="name-warning" class="warning">
      <?php
        if ($_SESSION["StudentError"]["InvalidName"]){
          echo "Nome inválido.";
        }
      ?>
    </span>

  <input id="name" name="name" placeholder="Digite o nome do aluno.">
    <span id="reg-warning" class="warning">
      <?php
        if ($_SESSION["StudentError"]["InvalidRegistration"]){
          echo "Matricula inválida.";
        }
      ?>
    </span>
  <input id="reg" name="reg" placeholder="Digite o número da matrícula.">

    <span id="grade-warning" class="warning">
      <?php
        if ($_SESSION["StudentError"]["InvalidGrade"]){
          echo "Notas inválidas.";
        }
        unset($_SESSION["StudentError"]);
      ?>
    </span>

    <div id="grades-container">
      Nota 1:<input id="grade1" class="grades"name="grade1" placeholder="nota">
      Nota 2:<input id="grade2" class="grades" name="grade2" placeholder="nota">
    </div>

    <span class="success">
      <?php
        if (isset($_SESSION["StudentSuccess"])){
          echo $_SESSION["StudentSuccess"];
          unset($_SESSION["StudentSuccess"]);
        }
      ?>
    </span>

    <button type="submit">Enviar</button>
  </form>
</body>
</html>
