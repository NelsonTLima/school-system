<?php

include 'validations.php';
require_once 'database.php';

session_start();

$username = $_POST["username"];
$email = $_POST["email"];
$raw_pwd = $_POST["password"];

$is_valid_signup = validate_signup($username, $email, $raw_pwd);

if ($is_valid_signup === true){
  register_user($username, $email, $raw_pwd);
  $_SESSION["SignupSuccess"] = "Usuário cadastrado com sucesso!";
  header("Location: ../signup");
}
else {
  $_SESSION["SignupError"] = $is_valid_signup;
  //var_dump($_SESSION);
  header("Location: ../signup");
}

?>
