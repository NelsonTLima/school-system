<?php

include 'validations.php';
require_once 'database.php';

session_start();

$name = $_POST["name"];
$reg = $_POST["reg"];
$grade1 = $_POST["grade1"];
$grade2 = $_POST["grade2"];

$is_valid_student = validate_student($name, $reg, $grade1, $grade2);
$already_registered = check_exists("Students", "registration", $reg);

if ($is_valid_student === true){
  $grade1 = (float) $grade1;
  $grade2 = (float) $grade2;

  $average = ($grade1 + $grade2) / 2;

  if ($already_registered){
    alter_student($name, $reg, $grade1, $grade2, $average);
    $_SESSION["StudentSuccess"] = "Cadastro atualizado!";
  }
  else{
    register_student($name, $reg, $grade1, $grade2, $average);
    $_SESSION["StudentSuccess"] = "Aluno cadastrado com sucesso!";
  }
  header("Location: ../cadastrar-aluno");
}
else {
  $_SESSION["StudentError"] = $is_valid_student;
  //var_dump($_SESSION);
  header("Location: ../cadastrar-aluno");
}

?>
