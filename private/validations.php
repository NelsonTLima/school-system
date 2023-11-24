<?php

require_once "database.php";

function validate_email($email){
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_username($username){
  $pattern = '/^[a-zA-Z0-9_-]{4,}$/';
  return preg_match($pattern, $username) === 1;
}

function validate_password($password){
  $pattern = '/^[^\s$\\&<>]{4,}$/';
  return preg_match($pattern, $password) === 1;
}

function validate_name($name){
  $pattern = '/^[A-ZÁÉÍÓÚÀÈÌÒÙÂÊÎÔÛÃÕÇa-záéíóúàèìòùâêîôûãõç\']+$/u';
  return preg_match($pattern, $name) === 1;
}

function validate_student_registration_number($reg){
  $pattern = '/^[0-9]+$/';
  return preg_match($pattern, $reg) === 1;
}

function validate_grade($grade){
  if (!is_numeric($grade)){
    return false;
  }
  $grade = (float) $grade;
  if ($grade >= 0 && $grade <= 10){
    return $grade;
  }
  return false;
}

function validate_login($username, $raw_pwd){
  $user_in_emails = check_exists("Users", "username", $username);
  $user_in_usernames = check_exists("Users", "email", $username);
  $valid_user = $user_in_emails || $user_in_usernames;
  $valid_password = password_verify($raw_pwd, get_password($username));

  if ($valid_user && $valid_password) {
    return true;
  }
  return false;
}

function validate_signup($username, $email, $password){
  $user_is_valid = validate_username($username);
  $user_is_avaliable = check_exists("Users", "username", $username) == false;
  $email_is_valid = validate_email($email) || ($email == NULL);
  $email_is_avaliable = check_exists("Users", "email", $email) == false;
  $password_is_valid = validate_password($password);

  if ($user_is_valid && $user_is_avaliable && $email_is_valid && $email_is_avaliable && $password_is_valid){
    return true;
  }

  $signup_errors = [
    "InvalidUser" => $user_is_valid == false,
    "NotAvaliableUser" => $user_is_avaliable == false,
    "InvalidEmail" => $email_is_valid == false,
    "EmailNotAvaliable" => $email_is_avaliable == false,
    "InvalidPassword" => $password_is_valid == false
  ];

  return $signup_errors;
}

function validate_student($name, $reg, $grade1, $grade2){
  $is_valid_name = validate_name($name);
  $is_valid_reg = validate_student_registration_number($reg);
  $is_valid_grade1 = validate_grade($grade1);
  $is_valid_grade2 = validate_grade($grade2);

  if ($is_valid_name && $is_valid_reg && $is_valid_grade1 && $is_valid_grade2){
    return true;
  }

  $student_error = [
    "InvalidName" => $is_valid_name == false,
    "InvalidRegistration" => $is_valid_reg == false,
    "InvalidGrade" => ($is_valid_grade1 == false || $is_valid_grade2 == false),
  ];

  return $student_error;
}

function authenticate_access(){
  session_start();

  if (!$_SESSION["logged"]){
    $_SESSION["LoginError"] = "É preciso estar logado para acessar.";
    header("Location: ../");
  }
}

?>
