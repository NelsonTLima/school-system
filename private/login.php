<?php

include "validations.php";

$username = $_POST["username"];
$raw_pwd = $_POST["password"];

session_start();

$is_valid_login = validate_login($username, $raw_pwd);

if ($is_valid_login) {
  unset($_SESSION["Error"]);
  $_SESSION["logged"] = true;
  header("Location: ../home");
}
else {
  $_SESSION["LoginError"] = "Usuário ou senha inválidos.";
  header("Location: ../");
}

?>
