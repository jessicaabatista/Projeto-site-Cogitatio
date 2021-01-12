<?php
include_once("Barra_Inicial.php");
session_start();
session_destroy();
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <title>Cadastro Funcionário</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
</head>

<div class="login-page"></div>
<div class="form">
  <p>Cadastro de Funcionarios</p>
  <form method="POST" action="Cadastro_Funcionario_Post.php">
    
  <input type="email" name="email" required placeholder="E-mail" />

  <input type="password" minlength="8" name="senha" required placeholder="Senha" />
    <input type="password" minlength="8" required placeholder="Confirmar senha" />

    <input type="text" name="cpf" minlength="11" maxlength="11" required placeholder="CPF" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">

    <input type="text" name="nome" required placeholder="Nome" minlength="12" maxlength="100"  pattern="^[^-\s][a-zA-ZÀ-ú ]*"/>

    <input type="tel" name="telefone" minlength="11" maxlength="11" required placeholder="Telefone" required placeholder="CPF" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">

    <input type="text" name="endereco" required placeholder="Endereço" pattern="^[^-\s][a-zA-ZÀ-ú ]*"/>

    </select><br><br>
    <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
  </form>
</div>
</div>

