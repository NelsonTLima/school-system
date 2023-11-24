<?php
session_start();
if ($_SESSION["logged"] == true){
  header("location: ./home");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./public/style/style.css">
  <script type = "text/javascript" src="./public/script/validations.js"></script>
  <title>Login</title>
</head>

<body>
  <form class="pre-login" name="login-form" onsubmit="return validateLogin()"
  action="./private/login.php"
  method="post"
  autocomplete="on">

    <h1>LOGIN</h1>

    <img id="user-avatar" src="./public/assets/user.png"></img>

    <span id="login-warning" class="warning">
      <?php
        if (isset($_SESSION["LoginError"])){
          echo $_SESSION["LoginError"];
          unset($_SESSION["LoginError"]);
        }
      ?>
    </span>

    <input placeholder="Username" id="username" type="text" name="username" autocomplete="username" required> <br>
    <input placeholder="Password" id="password" type="password" name="password" required><br>
    <nav>
      <a href="./signup" >signup</a>
      <button type="submit">login</button>
    </nav>
  </form>

</body>
</html>
