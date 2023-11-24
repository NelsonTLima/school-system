<?php

function connect(){
  $host = '127.0.0.1';
  $username = 'root';
  $password = 'root';
  $database = 'StudentList';
  $port = '3307';

  $conn = mysqli_connect(
    $host, $username, $password, $database, $port
  );

  return $conn;
}

function create_database($host, $db_user, $db_pwd, $port){
  $conn = mysqli_connect($host, $db_user, $db_pwd, NULL, $port);

  if (mysqli_query($conn,
    "CREATE DATABASE IF NOT EXISTS StudentList;"
  )){
    echo "Banco de dados criado";
  }
  else {
    echo "Erro ao criar o banco de dados";
  }

  mysqli_query($conn, "USE StudentList;");
  mysqli_query($conn,
    "CREATE TABLE Users (".
    "username VARCHAR(255) NOT NULL UNIQUE PRIMARY KEY,".
    "email VARCHAR(255) UNIQUE,".
    "password VARCHAR(255) UNIQUE)"
  );
  mysqli_query($conn,
    "CREATE TABLE Students (".
    "registration INT NOT NULL UNIQUE PRIMARY KEY,".
    "name VARCHAR(255),".
    "grade_1 FLOAT,".
    "grade_2 FLOAT,".
    "average FLOAT)"
  );

  mysqli_close($conn);
}

//create_database();

function check_exists($table, $column, $value){
  if ($value == NULL){
    return False;
  }

  $conn = connect();
  $query = "SELECT COUNT(*) as count FROM $table WHERE $column = '$value'";
  $result = mysqli_fetch_array(mysqli_query($conn, $query))["count"];

  mysqli_close($conn);

  if ($result > 0){
    return True;
  }
  return False;
}

function get_password($user){
  $conn = connect();
  $query = "SELECT password FROM Users WHERE username = '$user' OR email = '$user'";
  $password = mysqli_fetch_array(mysqli_query($conn, $query))["password"];
  mysqli_close($conn);
  return $password;
}

function register_user($username, $email, $raw_pwd){
  $conn = connect();

  $hash = password_hash($raw_pwd, PASSWORD_BCRYPT);

  $query = "INSERT INTO Users (username, email, password) VALUES ('$username', '$email' , '$hash')";
  if ($email == NULL){
    $query = "INSERT INTO Users (username, password) VALUES ('$username', '$hash')";
  }

  mysqli_query($conn, $query);
  mysqli_close($conn);
}

function register_student($name, $reg, $grade1, $grade2, $average){
  $conn = connect();

  $query =  "INSERT INTO Students ".
    "(name, registration, grade_1, grade_2, average) VALUES ".
    "('$name', '$reg' , '$grade1', '$grade2', '$average')";

  mysqli_query($conn, $query);
  mysqli_close($conn);
}

function alter_student($name, $reg, $grade1, $grade2, $average){
  $conn = connect();

  $query =  "UPDATE Students ".
    "SET name = '$name', grade_1 = '$grade1', grade_2 = '$grade2', average = '$average'".
    "WHERE registration = '$reg'";

  mysqli_query($conn, $query);
  mysqli_close($conn);
}

function get_student_reccords(){
  $conn = connect();

  $query =  "SELECT * FROM Students";

  $list_of_students = mysqli_query($conn, $query);
  mysqli_close($conn);
  return $list_of_students;
}

function display_student_list($data){
  echo "<tr><th>Nome".
    "</th><th>Matricula".
    "</th><th>Primeira Nota".
    "</th><th>Segunda Nota".
    "</th><th>Média</th></tr>";

  while ($table = mysqli_fetch_array($data)) {
    echo "<tr><td>".$table['name'].
      "</td><td>".$table["registration"].
      "</td><td>".$table['grade_1'].
      "</td><td>".$table['grade_2'].
      "</td><td>".$table['average'].
      "</td></tr>";
  }

}
?>
