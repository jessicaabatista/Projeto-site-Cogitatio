<?php
include_once("Barra_Inicial.php");
session_start();
session_destroy();
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Login Funcionário</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<div class="login-page"></div>
<div class="form">
  <p>Login Funcionário</p>
  <form method="POST" action="Login_Funcionario_Post.php">
    <input type="email" name="email" required placeholder="E-mail" />
    <input type="password" minlength="8" name="senha" required placeholder="Senha" />
    <input type="submit" value="Login" id="Login" name="Login">
  </form>
</div>
</div>

