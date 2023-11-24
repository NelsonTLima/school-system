<?php
require_once "../private/validations.php";
require_once "../private/database.php";
authenticate_access();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../public/style/style.css">
  <title>Listar</title>
</head>

<body>
  <form method="POST">

    <nav>
      <a href="../home">Home</a>
      <a href='../cadastrar-aluno'>Cadastro</a>
      <a style="background-color : #0A0F">Lista</a>
    </nav>

    <h1>Lista de Alunos</h1>

      <table>

        <?php
          $data = get_student_reccords();
          if ($data){
            display_student_list($data);
          }
        ?>

      </table>
  </form>
</body>
</html>
