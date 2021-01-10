<?php

$link = mysqli_connect('127.0.0.1', 'root', '', 'id12955974_db_cogitatio');

$sqlPsicologo = "SELECT nome_psicologo, id_psicologo FROM psicologo";

$selectPsicologo = mysqli_query($link, $sqlPsicologo) or die ("Erro ao tentar gravar as informações!");

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <title>Cadastro</title>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="Estilo.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>



<!-- Barra de Navegação -->
<div id="nav-placeholder">
  <script>
    $(function() {
      $("#nav-placeholder").load("Barra_Inicial.php");
    });
  </script>
</div>

<div class="login-page"></div>
<div class="form">
  <p>Cadastro Cliente</p>
  <form method="POST" action="Cadastro_Paciente_post.php">
    <input type="text" name="email" required placeholder="E-mail" />
    <input type="password" name="senha" required placeholder="Senha" />
    <input type="password" required placeholder="Confirmar senha" />
    <input type="text"  name="cpf" required placeholder="CPF" />
    <input type="text" name="nome" required placeholder="Nome" />
    <input type="tel" name="telefone" required placeholder="Telefone" />
    <input type="text" name="endereco" required placeholder="Endereço" />
    <input id="date" name="data" required type="date" value="0000-00-00" placeholder="Data do Nascimento" />
    <input type="text" name="psicologo" required placeholder="psicologo" />
    
    <input type="submit" value="Cadastro" id="cadastro" name="cadastro">
    <p class="message">Já cadastrado? <a href="Login_Paciente.php">Faça login</a></p>
  </form>
</div>
</div>
